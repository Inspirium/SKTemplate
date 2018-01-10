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
import price_definition from "./proposition/price_definition"

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
        price_definition: price_definition,
        owner: owner
    },
    state: {
        proposition_id: 0,
        created_at: 0,
        updated_at: 0,
        deleted_at: 0,
        loaded: false,
        retail_price: 0,
        error: ''
    },
    mutations: {
        initData(state, payload) {
            state.proposition_id = payload.proposition_id;
            state.created_at = payload.created_at;
            state.updated_at = payload.updated_at;
            state.deleted_at = payload.deleted_at;
        },
        clearData(state) {
            state.start = {};
            state.basic_data = {};
            state.categorization = {};
            state.deadline = {};
            state.distribution_expense = {};
            state.layout_expense = {};
            state.market_potential = {};
            state.marketing_expense = {};
            state.print = {};
            state.production_expense = {};
            state.technical_data = {};
            state.authors_expense = {};
            state.calculation = {};
            state.compare = {};
            state.price_definition = {};
            state.owner = {};

            state.proposition_id = 0;
            state.created_at = 0;
            state.updated_at = 0;
            state.deleted_at = 0;
        }
    },
    actions: {
        initData({commit, state}, payload) {
            if (!state.proposition_id || state.proposition_id != payload.id || payload.force) {
                axios.get('/api/proposition/' + payload.id + '/init')
                    .then((res) => {
                        commit('initData', res.data);
                        commit('proposition/owner/initData', res.data.owner, {root: true});
                    });
            }
        },
        clearProposition({commit}) {
            commit('clearData');
        }

    }
}
