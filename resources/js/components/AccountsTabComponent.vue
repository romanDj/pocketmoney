<template>
    <div>
        <h5 class="text-center text-secondary mb-3" v-if="accounts.length == 0 ">Нет открытых счетов</h5>
        <div class="card text-center" v-else>

            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item" v-for="(item, key, index) in accounts" @click.prevent="current_tab=index">
                        <a :class="['nav-link', index == current_tab ? 'active' : '' ]"   href="#">
                            {{ key == 'App\\Contribution' ? 'Вклады' : 'Кредиты' }}</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="card-columns mb-4" v-show="index == current_tab" v-for="(item, key, index) in accounts_in">
                    <div class="card" v-for="account in item">
                        <div class="card-body">
                            <h5 class="mb-1 text-left d-block">Счет #{{account.id}}</h5>
                            <hr>
                            <p class="mb-2 text-left">{{account.offerable.name}}</p>
                            <p class="mb-2 text-left">{{account.offerable.percent}}% годовых</p>
                            <p class="mb-2 text-left text-success" v-if="key != 'App\\Credit'">Баланс: {{account.balance}} Руб.</p>
                            <p class="mb-2 text-left text-success" v-if="key == 'App\\Credit'">Оплачено: {{ Math.round((account.count_history * account.contract.monthly_payment) * 100) / 100  }} Руб.</p>
                            <p class="mb-2 text-left text-danger" v-if="key == 'App\\Credit'">Остаток: {{account.remainder}} Руб.</p>
                            <a class="mb-2 text-left d-block" :href="'/profile/contract/'+account.contract.id">Договор <i class="fas fa-arrow-right"></i></a>
                            <a class="mb-2 text-left d-block" v-if="key == 'App\\Credit'" :href="'/profile/payments/'+account.id">График платежей <i class="fas fa-arrow-right"></i></a>
                            <a class="mb-2 text-left d-block" v-if="key == 'App\\Credit'" :href="'/profile/receipts/'+account.id">Ежемесячный платёж <i class="fas fa-arrow-right"></i></a>
                            <small class="text-left d-block text-secondary">Дата открытия: {{account.created_at}}</small>
                            <small class="text-left d-block text-secondary">Дата закрытия: {{account.contract.expirationDate}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['accounts'],
        data(){
            return {
                current_tab: 0,
                accounts_in : {},
                months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
            }
        },
        methods:{
            getDateObj(val){
                let str_to_arr = val.split('.');
                let year = Number(str_to_arr[2]);
                let month = Number(str_to_arr[1]) - 1;
                let day = Number(str_to_arr[0]);
                return new Date(year, month, day);
            }
        },
        mounted() {
            this.accounts_in = this.accounts;
            this.accounts_in['App\\Credit'] = this.accounts['App\\Credit'].map(item => {
                let schedule = [];
                let overpayment = 0;
                let full_summ = 0;

                let d_percent = item.contract.percent/100;
                let payment =Math.round(
                    Number(item.contract.amount)*100*(
                        d_percent/12+d_percent/12/(Math.pow((1+d_percent/12),Number(item.contract.period))-1)
                    )
                )/100;

                let this_year = this.getDateObj(item.created_at).getFullYear();
                let this_month = this.getDateObj(item.created_at).getMonth();

                for (let i = 0; i < item.contract.period; i++) {
                    if (i == 0) {

                        let percent = Math.round(d_percent/ 12 * Number(item.contract.amount) * 100) / 100;
                        let dolg = Math.round((payment - percent) * 100) / 100;

                        schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: payment,
                            dolg: dolg,
                            remainder: Math.round((Number(item.contract.amount) - dolg) * 100) / 100
                        });

                    }else if( i+1 == item.contract.period){
                        this_month++;
                        if (this_month > 11) {
                            this_year++;
                            this_month = 0;
                        }
                        let percent = Math.round((d_percent / 12) * schedule[i - 1].remainder * 100) / 100;
                        schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: percent + schedule[i - 1].remainder,
                            dolg: schedule[i - 1].remainder,
                            remainder: 0
                        });
                    } else {
                        this_month++;
                        if (this_month > 11) {
                            this_year++;
                            this_month = 0;
                        }

                        let percent = Math.round((d_percent / 12) * schedule[i - 1].remainder * 100) / 100;
                        let dolg = Math.round(( payment - percent) * 100) / 100;
                        let remainder = Math.round(( schedule[i - 1].remainder - dolg) * 100) / 100;
                        schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: payment,
                            dolg: dolg,
                            remainder: remainder
                        });
                    }
                }

                for(let i = 0; i < schedule.length; i++ ){
                    overpayment += schedule[i].percent;
                    full_summ += schedule[i].payment;
                }
                overpayment = Math.round(overpayment * 100)/100;
                full_summ = Math.round(full_summ * 100)/100;
                return Object.assign({ remainder: item.count_history > 0 ?  schedule[item.count_history - 1 ].remainder : item.contract.amount }, item);
            });
            //console.log(this.accounts_in);
        }
    }
</script>
