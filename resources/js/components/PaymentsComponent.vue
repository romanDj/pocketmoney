<template>
    <div class="row justify-content-center">

        <div class="col-md-11 col-sm-12">

            <transition name="fade" appear>
                <div class="row position-relative justify-content-center" key="compare">

                    <div class="col-md-12 overflow-auto">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>№ платежа</td>
                                        <td>Дата платежа</td>
                                        <td>Сумма платежа</td>
                                        <td>Основной долг</td>
                                        <td>Начисленные проценты</td>
                                        <td>Остаток задолженности</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, key) in schedule">
                                        <td>{{ key + 1 }}</td>
                                        <td>{{ item.month }}</td>
                                        <td>{{ item.payment}}</td>
                                        <td>{{ item.dolg }}</td>
                                        <td>{{ item.percent }}</td>
                                        <td>{{ item.remainder }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Итого по кредиту:</td>
                                        <td>{{ full_summ }}</td>
                                        <td>{{summ}}</td>
                                        <td>{{ overpayment }}</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>

                </div>
            </transition>


        </div>

    </div>
</template>

<script>
    export default {
        props:[ 'summ', 'percent', 'time', 'created_at'],
        data(){
            return {
                contribution_list : [],
                overpayment: 0,
                payment: 0,
                full_summ: 0,
                schedule: [],
                months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
            }
        },
        mounted() {
            this.calculate();
        },
        methods:{
            getDateObj(val){
                let str_to_arr = val.split('.');
                let year = Number(str_to_arr[2]);
                let month = Number(str_to_arr[1]) - 1;
                let day = Number(str_to_arr[0]);
                return new Date(year, month, day);
            },
            calculate(){
                //отчищаем поля для переращета
                this.schedule = [];
                this.overpayment = 0;
                this.full_summ = 0;

                let d_percent = this.percent/100;
                this.payment =Math.round(
                    Number(this.summ)*100*(
                        d_percent/12+d_percent/12/(Math.pow((1+d_percent/12),Number(this.time))-1)
                    )
                )/100;

                let this_year = this.getDateObj(this.created_at).getFullYear();
                let this_month = this.getDateObj(this.created_at).getMonth();

                for (let i = 0; i < this.time; i++) {
                    if (i == 0) {

                        let percent = Math.round(d_percent/ 12 * Number(this.summ) * 100) / 100;
                        let dolg = Math.round((this.payment - percent) * 100) / 100;

                        this.schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: this.payment,
                            dolg: dolg,
                            remainder: Math.round((Number(this.summ) - dolg) * 100) / 100
                        });

                    }else if( i+1 == this.time){
                        this_month++;
                        if (this_month > 11) {
                            this_year++;
                            this_month = 0;
                        }
                        let percent = Math.round((d_percent / 12) * this.schedule[i - 1].remainder * 100) / 100;
                        this.schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: percent + this.schedule[i - 1].remainder,
                            dolg: this.schedule[i - 1].remainder,
                            remainder: 0
                        });
                    } else {
                        this_month++;
                        if (this_month > 11) {
                            this_year++;
                            this_month = 0;
                        }

                        let percent = Math.round((d_percent / 12) * this.schedule[i - 1].remainder * 100) / 100;
                        let dolg = Math.round((this.payment - percent) * 100) / 100;
                        let remainder = Math.round((this.schedule[i - 1].remainder - dolg) * 100) / 100;
                        this.schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: this.payment,
                            dolg: dolg,
                            remainder: remainder
                        });
                    }
                }

                for(let i = 0; i < this.schedule.length; i++ ){
                    this.overpayment += this.schedule[i].percent;
                    this.full_summ += this.schedule[i].payment;
                }
                this.overpayment = Math.round(this.overpayment * 100)/100;
                this.full_summ = Math.round(this.full_summ * 100)/100;
            }
        }
    }
</script>
