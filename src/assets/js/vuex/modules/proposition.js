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
        initData({commit, state, dispatch, rootState}, payload) {
            return new Promise((resolve, reject) => {
                if (!state.proposition_id || state.proposition_id != rootState.route.params.id) {
                    axios.get('/api/proposition/' + rootState.route.params.id + '/init')
                        .then((res) => {
                            commit('initData', res.data);
                            commit('owner/initData', res.data.owner);
                            dispatch('getData')
                                .then(resolve)
                                .catch(reject);
                        })
                        .catch(reject);
                }
                else {
                    dispatch('getData')
                        .then(resolve)
                        .catch(reject);
                }
            });
        },
        getData({state, rootState, commit, dispatch}, payload) {
            return new Promise((resolve, reject) => {
                Promise.all([
                    dispatch('categorization/getData', {}, {root: true}),
                    new Promise((resolve, reject) => {
                        let path = '/api/proposition/' + rootState.route.params.id + '/' + rootState.route.meta.save;
                        if (rootState.route.meta.type) {
                            path += rootState.route.meta.type;
                        }
                        axios.get(path)
                            .then((res) => {
                                commit(rootState.route.meta.save + '/initData', res.data);
                                resolve();
                            })
                            .catch((err) => {
                                 reject(403);
                            });
                    })
                ]).then(resolve).catch(reject);
            });
        },
        listenForWarning({state, rootState, dispatch}, payload) {
            payload.vue.$eventHub.on('warningConfirmed', () => {
                dispatch(rootState.route.meta.warning, payload, {root: true});
            })
        },
        deleteProposition({state}, payload) {
            axios.delete('/api/proposition/'+state.proposition_id)
                .then((res) => {
                    payload.vue.$router.push('/propositions');
                });
        },
        clearProposition({commit}) {
            commit('clearData');
        }

    }
}
