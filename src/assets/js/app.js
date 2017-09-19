
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.breakpoints = {
    'sm' : 576,
    'md' : 768,
    'lg' : 992,
    'xl' : 1200
};

import Vue from 'vue';
import VueMoment from 'vue-moment'
import VueRouter from 'vue-router'
import * as VueDeepSet from 'vue-deepset'
import store from './vuex/store'
import { routes } from './routes'
import { sync } from 'vuex-router-sync'
//import { VuexValidator } from "vuex-validator";
//import validators from "./vuex/validators";

Vue.prototype.lang= function (key) {
    return _.get(window.translations, key, key);
};

Vue.component('inspirium-tablesearch', require('./components/TableSearch.vue').default);
Vue.component('inspirium-notifications', require('./components/Notifications.vue').default);
Vue.component('inspirium-menu', require('./components/Menu.vue').default);

Vue.use(VueMoment);
Vue.use(VueRouter);
Vue.use(VueDeepSet);

/*
Vue.use(VuexValidator, {
    validators
})*/

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes
});

sync(store, router);
window.vueRouter = router;

Vue.filter('flexCurrency', function (value, currency, decimals) {
    const digitsRE = /(\d{3})(?=\d)/g;
    value = parseFloat(value);
    if (!isFinite(value) || (!value && value !== 0)) return '0.00 kn';
    currency = currency !== null ? currency : '$';
    let stringified = Math.abs(value).toFixed(decimals);
    let _int = stringified.slice(0, -1 - decimals);
    let i = _int.length % 3;
    let head = i > 0
        ? (_int.slice(0, i) + (_int.length > 3 ? ',' : ''))
        : '';
    let _float = stringified.slice(-1 - decimals);
    let sign = value < 0 ? '-' : '';
    return sign + head +
        _int.slice(i).replace(digitsRE, '$1,') +
        _float + currency;
});

const app = new Vue({
    el: '#app',
    store,
    router
});


//load datepicker default options and translations
if (window.translations.datepicker) {
    $.extend($.fn.pickadate.defaults, window.translations.datepicker)
}

// SideNav init
$(".button-collapse").sideNav();

// Custom scrollbar init
var el = document.querySelector('.custom-scrollbar');
Ps.initialize(el);

// Material Select Initialization
$(document).ready(function() {
    $('.mdb-select').material_select();
});

// Data Picker Initialization
$('.datepicker').pickadate();

// Tooltip Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
