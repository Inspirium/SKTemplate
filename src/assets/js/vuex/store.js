import Vue from 'vue';
import Vuex from 'vuex';
import proposition from './modules/proposition';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        'proposition':proposition
    },
    strict: process.env.NODE_ENV !== 'production'
})
