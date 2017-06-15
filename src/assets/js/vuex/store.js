import Vue from 'vue';
import Vuex from 'vuex';
import * as VueDeepSet from 'vue-deepset'
import proposition from './modules/proposition';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        'proposition':proposition
    },
    mutations: VueDeepSet.extendMutation({}),
    strict: process.env.NODE_ENV !== 'production'
})
