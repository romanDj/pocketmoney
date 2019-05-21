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

            <div class="card-body" v-show="index == current_tab" v-for="(item, key, index) in accounts">

                <div class="card-columns mb-4" v-show="index == current_tab" v-for="(item, key, index) in accounts">
                    <div class="card" v-for="account in item">
                        <div class="card-body">
                            <h5 class="mb-1 text-left d-block">Счет #{{account.id}}</h5>
                            <hr>
                            <p class="mb-2 text-left">{{account.offerable.name}}</p>
                            <p class="mb-2 text-left">{{account.offerable.percent}}% годовых</p>
                            <p class="mb-2 text-left text-success">Баланс: {{account.balance}} Руб.</p>
                            <a class="mb-2 text-left d-block" :href="'/profile/contract/'+account.contract.id">Договор <i class="fas fa-arrow-right"></i></a>
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
                current_tab: 0
            }
        },
        mounted() {
            console.log(this.accounts);
        }
    }
</script>
