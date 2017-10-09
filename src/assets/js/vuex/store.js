import Vue from 'vue';
import Vuex from 'vuex';
import * as VueDeepSet from 'vue-deepset'

import proposition from './modules/proposition';
import categorization from './modules/categorization';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        'proposition': proposition,
        'categorization': categorization
    },
    mutations: VueDeepSet.extendMutation({}),
    strict: false
})
