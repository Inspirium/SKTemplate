
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
import store from './vuex/store'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.lang= function (key) {
    return _.get(window.translations, key, key);
};

Vue.component('inspirium-tablesearch', require('./components/TableSearch.vue'));
Vue.component('inspirium-notifications', require('./components/Notifications.vue'));
Vue.component('proposition-edit', require('./components/PropositionEdit.vue'));
Vue.use(VueMoment);

const app = new Vue({
    el: '#app',
    store
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
