import Vue from 'vue'
import Snotify from 'vue-snotify'
import { router } from './routes'
import store from './store'
import VueCurrencyInput from 'vue-currency-input'


require('./bootstrap');

window.Vue = require('vue');
Vue.use(Snotify);
Vue.use(VueCurrencyInput)

import 'vue-snotify/styles/material.css';

Vue.component('layout', require('./layout/Layout.vue').default);

const app = new Vue({
    store,
    router,
    el: '#app',
});
