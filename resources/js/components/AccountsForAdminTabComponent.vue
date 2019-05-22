<template>
    <div>
        <h5 class="text-center text-secondary mb-3" v-if="accounts.length == 0 ">Нет открытых счетов</h5>
        <div class="card" v-else>

            <div class="d-flex flex-wrap bg-white">
                <div class="form-group m-2">
                    <label for="">Тариф:</label>
                    <input type="text" v-model="rate" class="form-control">
                </div>
                <div class="form-group m-2">
                    <label for="">Процент:</label>
                    <input type="text" v-model="percent" class="form-control">
                </div>
                <div class="form-group m-2">
                    <label for="">Клиент:</label>
                    <input type="text" v-model="fio" class="form-control">
                </div>
            </div>

            <hr>

            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item" v-for="(item, key, index) in accounts" @click.prevent="current_tab=index">
                        <a :class="['nav-link', index == current_tab ? 'active' : '' ]"   href="#">
                            {{ key == 'App\\Contribution' ? 'Вклады' : 'Кредиты' }}</a>
                    </li>
                </ul>
            </div>

            <div class="card-body p-0"  v-show="index == current_tab" v-for="(item, key, index) in filter_accounts">

                <table class="table table-bordered mb-0 table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Тариф</th>
                        <th scope="col">Процент</th>
                        <th scope="col">Баланс</th>
                        <th scope="col">Клиент</th>
                        <th scope="col">Сроки</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="account in item">
                            <td>{{account.id}}</td>
                            <td>{{account.offerable.name}}</td>
                            <td>{{account.offerable.percent}}% годовых</td>
                            <td>{{account.balance}} Руб.</td>
                            <td>{{account.client.surname}} {{account.client.name }} {{account.client.patronymic }}</td>
                            <td>
                                <small class="text-left d-block text-secondary">Открытие: {{account.created_at}}</small>
                                <small class="text-left d-block text-secondary">Закрытие: {{account.contract.expirationDate}}</small>
                            </td>
                            <td> <a class="mb-2 text-left d-block" :href="'/admin/contract/'+account.contract.id">Договор <i class="fas fa-arrow-right"></i></a></td>
                        </tr>
                    </tbody>
                </table>

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
                rate: '',
                percent: '',
                fio: '',
                filter_accounts: []
            }
        },
        mounted() {
            console.log(this.accounts);
            this.filter_accounts = this.accounts;
        },
        watch:{
            rate: function(){
                this.search();
            },
            percent: function () {
                this.search();
            },
            fio: function () {
                this.search();
            }
        },
        methods:{
            search(){
                if(this.rate.trim() == '' && this.percent.trim() == '' && this.fio.trim() == '' ){
                    this.filter_accounts = this.accounts;
                }else{
                    this.filter_accounts = {};
                    for(let offer in this.accounts){
                        this.filter_accounts[offer] = this.accounts[offer].filter( item => {
                            let initial_fio = item.client.surname + ' ' + item.client.name +' ' + item.client.patronymic;

                            let initial = {
                                rate: item.offerable.name.toLowerCase(),
                                percent: item.offerable.percent,
                                fio: initial_fio.toLowerCase()
                            };

                            let input_fio = this.fio.toLowerCase().split(' ');
                            let input_fio_clear = [];

                            for(let i = 0; i < input_fio.length; i++){
                                input_fio_clear.push(input_fio[i].trim());
                            }

                            let search_fio = true;

                            for(let i = 0; i < input_fio_clear.length; i++){
                                if(initial.fio.indexOf(input_fio_clear[i]) < 0){
                                    search_fio = false;
                                    break;
                                }
                            }

                            return initial.rate.indexOf(this.rate.toLowerCase().trim()) >= 0
                                && String(initial.percent).indexOf(this.percent.trim()) >= 0
                                && search_fio == true;
                        });
                    }
                }

            }
        }
    }
</script>
