<template>
    <div class="row justify-content-center">

        <div class="col-md-11 col-sm-12">
            <h4 class="text-purple none-print">Рассчитать доход по вкладам</h4>
            <div class="hr_gradient mb-4 none-print"></div>

            <transition name="fade" appear mode="out-in">
                <div v-if="!compare" class="row position-relative" key="calc">
                    <form class="col-md-7">
                        <div class="form-group">
                            <label for="">Сумма</label>
                            <div class="input-group">
                                <input type="number" v-model="summ" class="form-control number-input"
                                       @blur="validateRange('summ', 1000, 10000000)"  required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Руб.</span>
                                </div>
                            </div>
                            <input type="range" v-model="summ" class="w-100 mt-1" min="1000" max="10000000">
                            <div class="d-flex justify-content-between" style="position: relative; top: -10px">
                                <p class="m-0 p-0">1 тыс.</p>
                                <p class="m-0 p-0">10 млн</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Срок</label>
                            <div class="input-group">
                                <input type="number" v-model="time" class="form-control number-input"
                                       @blur="validateRange('time', 90, 1825)"  required>
                                <div class="input-group-append">
                                    <span class="input-group-text">дней</span>
                                </div>
                            </div>
                            <input type="range" v-model="time" class="w-100 mt-1" min="90" max="1825">
                            <div class="d-flex justify-content-between" style="position: relative; top: -10px">
                                <p class="m-0 p-0">3 мес.</p>
                                <p class="m-0 p-0">5 лет</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ежемесячное пополнение</label>
                            <div class="input-group">
                                <input type="number" v-model="every" @blur="validateRange('every', 0, 5000000)"
                                       class="form-control number-input" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">Руб.</span>
                                </div>
                            </div>
                            <input type="range" v-model="every" class="w-100 mt-1" min="0" max="5000000">
                            <div class="d-flex justify-content-between" style="position: relative; top: -10px">
                                <p class="m-0 p-0">0 тыс.</p>
                                <p class="m-0 p-0">5 млн</p>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-5">
                        <div class="card border-secondary mb-3">
                            <div class="card-body">
                                <div class="mb-4" v-for="item in contribution_list">
                                    <h4>{{item.name}}</h4>
                                    <label for="">Доход по вкладу:</label>
                                    <p class="border-bottom" v-if="item.error == ''">{{item.income}} Руб.</p>
                                    <p class="border-bottom text-danger" v-else>{{item.error}}</p>
                                </div>
                            </div>

                            <a href="#" @click.prevent="compareWin" class="btn btn-outline-success m-2">Сравнить параметры</a>

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
                            <input type="hidden" name="percent" :value="select_percent">
                            <input type="hidden" name="id" :value="select_id">
                            <div class="overflow-auto w-100">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Название</th>
                                    <th scope="col">Доход</th>
                                    <th scope="col">Сумма к концу срока</th>
                                    <th scope="col">Ставка</th>
                                    <th scope="col" class="none-print"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in contribution_list" v-if="item.error == ''">
                                    <th scope="row">{{item.name}}</th>
                                    <td>{{item.income}} Руб.</td>
                                    <td>{{item.full_summ}} Руб.</td>
                                    <td>{{item.rate}}%</td>
                                    <td class="none-print"><input class="btn btn-outline-success"
                                                                  @click="selectContribution(item)"
                                                                  type="submit" value="Открыть вклад" ></td>
                                </tr>

                                </tbody>
                            </table>
                            </div>
                        </form>

                    </div>

                </div>
            </transition>


        </div>

    </div>
</template>

<script>
    export default {
        props:['contributions',  'url_score'],
        data(){
            return {
                contribution_list : [],
                summ: 1000,
                time: 90,
                every: 0,
                compare: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                select_id: '',
                select_percent: ''
            }
        },
        mounted() {
            this.contribution_list = this.contributions.map(contribution => {
                return Object.assign({ income: 0, error: '', full_summ: 0, rate: 0 }, contribution);
            });
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
            selectContribution(val){
                this.select_id = val.id;
                this.select_percent = val.percent;
            },
            compareWin(){
                this.compare = !this.compare;
            },
            printDoc() {
                window.print();
            },
            calculate(){
                for(let i = 0; i < this.contribution_list.length; i++){

                    if(this.time >= this.contribution_list[i].min_term * 30){
                        this.contribution_list[i].error = '';

                        let whole_months = Math.floor(Number(this.time) / 30);
                        let whole_days = Number(this.time) - whole_months * 30;

                        let every_month_income = [];
                        let this_income = 0;

                        if( this.contribution_list[i].isReplenishment == 1
                            &&  this.contribution_list[i].isCapitalization == 1){
                            //с пополнением и с капитализацией
                            let last_month_income = 0;
                            for(let m = 0; m < whole_months; m++){
                                let inc = 0;
                                if(m == 0){
                                    inc = Number(this.summ) * this.contribution_list[i].percent/100/12;
                                }else{
                                    inc = Number(last_month_income) * this.contribution_list[i].percent/100/12;
                                }
                                last_month_income = Number(this.summ) + inc + (m+1) * Number(this.every);
                                this_income += inc;
                                every_month_income.push(inc);
                            }
                            if(whole_days > 0){
                                let inc = last_month_income * whole_days * this.contribution_list[i].percent/100/12/30;
                                this_income += inc;
                                every_month_income.push(inc);
                            }
                            this.contribution_list[i].full_summ = Math.round( (this_income + last_month_income) *100) /100

                        }else if( this.contribution_list[i].isReplenishment == 1
                            &&  this.contribution_list[i].isCapitalization == 0){
                            //с пополнением и без капитализации
                            let last_month_income = 0;
                            for(let m = 0; m < whole_months; m++){
                                let inc = 0;
                                if(m == 0){
                                    inc = Number(this.summ) * this.contribution_list[i].percent/100/12;
                                }else{
                                    inc = Number(last_month_income) * this.contribution_list[i].percent/100/12;
                                }
                                last_month_income = Number(this.summ) + (m+1) * Number(this.every);
                                this_income += inc;
                                every_month_income.push(inc);
                            }
                            if(whole_days > 0){
                                let inc = last_month_income * whole_days * this.contribution_list[i].percent/100/12/30;
                                this_income += inc;
                                every_month_income.push(inc);
                            }
                            this.contribution_list[i].full_summ =  Math.round( (this_income + last_month_income) *100) /100;

                        }else{
                            //без пополнения и без капитализации
                            for(let m = 0; m < whole_months; m++){
                                let inc = Number(this.summ) * this.contribution_list[i].percent/100/12;
                                this_income += inc;
                                every_month_income.push(inc);
                            }
                            if(whole_days > 0){
                                let inc = Number(this.summ) * whole_days * this.contribution_list[i].percent/100/12/30;
                                this_income += inc;
                                every_month_income.push(inc);
                            }
                            this.contribution_list[i].full_summ = Math.round( (this_income + Number(this.summ)) *100) /100;
                        }

                        this.contribution_list[i].income = Math.round(this_income * 100) / 100;
                        this.contribution_list[i].rate = Math.round(this_income /Number(this.summ)/Number(this.time) * 360 * 100 * 100) / 100;

                    }else{
                        this.contribution_list[i].error = `Минимальный срок ${ this.contribution_list[i].min_term} мес.`;
                    }


                }
            }
        },
        watch:{
            summ: function () {
                this.calculate();
            },
            time: function () {
                this.calculate();
            },
            every: function () {
                this.calculate();
            }
        }
    }
</script>
