import axios from 'axios';
import _ from 'lodash';

import basic_data from './proposition/basic_data'
import start from './proposition/start'
import categorization from './proposition/categorization'
import authors_expense from './proposition/authors_expense'
import deadline from './proposition/deadline'
import distribution_expense from './proposition/distribution_expense'
import layout_expense from './proposition/layout_expense'
import market_potential from './proposition/market_potential'
import marketing_expense from './proposition/marketing_expense'
import print from './proposition/print'
import production_expense from './proposition/production_expense'
import technical_data from './proposition/technical_data'
import owner from './proposition/owner'
import calculation from './proposition/calculation'
import compare from './proposition/compare'

export default {
    namespaced: true,
    modules: {
        start: start,
        basic_data : basic_data,
        categorization : categorization,
        deadline : deadline,
        distribution_expense : distribution_expense,
        layout_expense : layout_expense,
        market_potential : market_potential,
        marketing_expense : marketing_expense,
        print : print,
        production_expense : production_expense,
        technical_data : technical_data,
        authors_expense : authors_expense,
        calculation : calculation,
        compare : compare,
        owner: owner
    },
    state: {
        id: 0,
        created_at: 0,
        updated_at: 0,
        deleted_at: 0,
        loaded: false,
        assigned: {
            departments: [],
            employees: []
        },
        error: ''
    },
    mutations: {
        initData(state, payload) {
            state.id = payload.id;
            state.created_at = payload.created_at;
            state.updated_at = payload.updated_at;
            state.deleted_at = payload.deleted_at;
        }
    },
    actions: {
        initData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                axios.get('/api/proposition/' + payload.id + '/init')
                    .then((res) => {
                        commit('initData', res.data);
                        commit('proposition/owner/initData', res.data.owner, {root: true});
                    });
            }
        }
    }
}
