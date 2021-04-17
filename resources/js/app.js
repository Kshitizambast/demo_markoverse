/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Echo } = require('laravel-echo');


import Vue from 'vue';
window.Vue = require('vue');

require('./bootstrap');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('my-search', require('./components/search/MySearch.vue').default);
Vue.component('show-gift', require('./components/customers/ShowGift.vue').default);
Vue.component('deal-done', require('./components/customers/DealDone.vue').default)
Vue.component('order-status', require('./components/customers/OrderStatus.vue').default)
Vue.component('order-placed', require('./components/shops/OrderPlaced.vue').default)
Vue.component('overview-graph', require('./components/investments/OverviewGraph.vue').default)
Vue.component('pay-bill', require('./components/payments/PayBillComponent.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mounted (){
        Echo.channel('order-tracker')
            .listen('OrderStatusChanged', (e) => {
                console.log('omggg real time bro');
        });
    }
});
