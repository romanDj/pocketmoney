<template>
    <div class="row justify-content-center">

        <div class="col-md-11 col-sm-12">
            <h4 class="text-purple none-print">Расчёт кредита</h4>
            <div class="hr_gradient mb-4 none-print"></div>

            <transition name="fade" appear mode="out-in">
                <div v-if="!compare" class="row position-relative" key="calc">
                    <form class="col-md-7">
                        <div class="form-group">
                            <label for="">Сумма</label>
                            <div class="input-group">
                                <input type="number" v-model="summ" class="form-control number-input"
                                       @blur="validateRange('summ', 1000, 5000000)"  required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Руб.</span>
                                </div>
                            </div>
                            <input type="range" v-model="summ" class="w-100 mt-1" min="1000" max="5000000">
                            <div class="d-flex justify-content-between" style="position: relative; top: -10px">
                                <p class="m-0 p-0">1 тыс.</p>
                                <p class="m-0 p-0">5 млн</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Срок</label>
                            <div class="input-group">
                                <input type="number" v-model="time" class="form-control number-input"
                                       @blur="validateRange('time', this_credit.min_term, 120)"  required>
                                <div class="input-group-append">
                                    <span class="input-group-text">мес.</span>
                                </div>
                            </div>
                            <input type="range" v-model="time" class="w-100 mt-1" :min="this_credit.min_term" max="120">
                            <div class="d-flex justify-content-between" style="position: relative; top: -10px">
                                <p class="m-0 p-0">{{this_credit.min_term}} мес.</p>
                                <p class="m-0 p-0">10 лет</p>
                            </div>
                        </div>

                    </form>
                    <div class="col-md-5">
                        <div class="card border-secondary mb-3">
                            <div class="card-body">
                                <div class="mb-4" >
                                    <h4 >{{this_credit.name}}</h4>
                                    <h5 class="text-purple mb-3">Процентная ставка {{this_credit.percent}}%</h5>
                                    <label for="">Ежемесячный платеж:</label>
                                    <p class="border-bottom" >{{this_credit.payment}} Руб.</p>
                                </div>
                                <div class="mb-4" >
                                    <label for="">Ориентировочная переплата по кредиту:</label>
                                    <p class="border-bottom">{{this_credit.overpayment}} Руб.</p>
                                </div>
                            </div>

                            <a href="#" @click.prevent="compareWin" class="btn btn-outline-success m-2">График платежей</a>

                        </div>
                    </div>
                </div>

                <div v-else class="row position-relative justify-content-center" key="compare">

                    <div class="col-md-10 ">
                        <div class="mb-3 none-print d-flex justify-content-between">
                            <a href="#" @click.prevent="compareWin"><i class="fas fa-arrow-left"></i> вернуться к калькулятору</a>
                            <a href="#" @click.prevent="printDoc"><i class="fas fa-print"></i> сформировать выписку</a>
                        </div>
                        <form :action="url_score" method="post">
                            <input type="hidden" name="_token" :value="csrf">
                            <input type="hidden" name="balance" :value="summ">
                            <input type="hidden" name="period" :value="time">
                            <input type="hidden" name="percent" :value="this_credit.percent">
                            <input type="hidden" name="id" :value="this_credit.id">
                            <input type="hidden" name="monthly_payment" :value="this_credit.payment">
                            <input type="submit" class="btn btn-outline-success mb-3 d-block w-100" value="Открыть кредит">

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
                                        <td>{{ this_credit.full_summ }}</td>
                                        <td>{{summ}}</td>
                                        <td>{{ this_credit.overpayment }}</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </form>

                    </div>

                </div>
            </transition>


        </div>

    </div>
</template>

<script>
    export default {
        props:['contributions',  'url_score', 'credit'],
        data(){
            return {
                contribution_list : [],
                this_credit: {},
                summ: 1000,
                time: 90,
                compare: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                schedule: [],
                months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
            }
        },
        mounted() {
            this.this_credit = Object.assign({payment: 0, overpayment: 0, full_summ: 0}, this.credit);
            this.time = this.this_credit.min_term;
            this.calculate();
        },
        methods:{
            validateRange(el, min, max) {
                if (this[el] < min) {
                    this[el] = min;
                } else if (this[el] > max) {
                    this[el] = max;
                }
            },
            selectContribution(name){
                return true;
            },
            compareWin(){
                this.compare = !this.compare;
            },
            printDoc() {
                window.print();
            },
            calculate(){
                //отчищаем поля для переращета
                this.schedule = [];
                this.this_credit.overpayment = 0;
                this.this_credit.full_summ = 0;

                let d_percent = this.this_credit.percent/100;
                this.this_credit.payment =Math.round(
                    Number(this.summ)*100*(
                        d_percent/12+d_percent/12/(Math.pow((1+d_percent/12),Number(this.time))-1)
                    )
                )/100;

                let this_year = new Date().getFullYear();
                let this_month = new Date().getMonth();

                for (let i = 0; i < this.time; i++) {
                    if (i == 0) {

                        let percent = Math.round(d_percent/ 12 * Number(this.summ) * 100) / 100;
                        let dolg = Math.round((this.this_credit.payment - percent) * 100) / 100;

                        this.schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: this.this_credit.payment,
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
                        let dolg = Math.round((this.this_credit.payment - percent) * 100) / 100;
                        let remainder = Math.round((this.schedule[i - 1].remainder - dolg) * 100) / 100;
                        this.schedule.push({
                            month: this.months[this_month] + ", " + this_year,
                            percent: percent,
                            payment: this.this_credit.payment,
                            dolg: dolg,
                            remainder: remainder
                        });
                    }
                }

                for(let i = 0; i < this.schedule.length; i++ ){
                    this.this_credit.overpayment += this.schedule[i].percent;
                    this.this_credit.full_summ += this.schedule[i].payment;
                }
                this.this_credit.overpayment = Math.round(this.this_credit.overpayment * 100)/100;
                this.this_credit.full_summ = Math.round(this.this_credit.full_summ * 100)/100;
            }
        },
        watch:{
            summ: function () {
                this.calculate();
            },
            time: function () {
                this.calculate();
            }
        }
    }
</script>
