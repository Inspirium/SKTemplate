import Vue from 'vue';
import Vuex from 'vuex';
import * as VueDeepSet from 'vue-deepset'
import createPersistedState from "vuex-persistedstate";

import proposition from './modules/proposition';
import categorization from './modules/categorization';
import employee from './modules/employee';

Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        'proposition': proposition,
        'categorization': categorization,
        'employee' : employee
    },
    state: {
        edited: false,
        next: false
    },
    mutations: VueDeepSet.extendMutation({
        editedFalse(state) {
            state.next();
            state.edited = false;
            state.next = false;
        },
        editedTrue(state, payload) {
            state.next = payload.next;
        }
    }),
    strict: false
})
