
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
import store from './vuex/store'
import { routes } from './routes'
import { sync } from 'vuex-router-sync'

Vue.prototype.lang= function (key) {
    return _.get(window.translations, key, key);
};

Vue.component('inspirium-tablesearch', require('./components/TableSearch.vue'));
Vue.component('inspirium-notifications', require('./components/Notifications.vue'));
Vue.component('proposition-edit', require('./components/PropositionEdit.vue'));
Vue.component('proposition-menu', require('./components/PropositionMenu.vue'));

Vue.use(VueMoment);
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes
});

sync(store, router);
window.vueRouter = router;

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
