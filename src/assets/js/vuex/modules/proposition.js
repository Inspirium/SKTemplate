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
        technical_data : technical_data
    },
    state: {
        id: 0,
        proposition: {
            loaded: false,
            assigned: {
                departments: [],
                employees: []
            },
            id: 0,
        },
        steps: [
            'basic_data',
            'categorization',
            'market_potential',
            'technical_data',
            'print',
            'authors_expense',
            'production_expense',
            'marketing_expense',
            'distribution_expense',
            'layout_expense',
            'deadline',
            'calculation',
            'work_order',
        ],
        error: ''
    },
    mutations: {
        setId(state, id) {
            state.id = id;
        },

        updateProposition(state, payload) {
            if (payload.group) {
                state.proposition[payload.group][payload.key] = payload.value;
            }
            else {
                state.proposition[payload.key] = payload.value;
            }
        },
        pushToObject(state, payload) {
            state.proposition[payload.group][payload.key] = {...state.proposition[payload.group][payload.key], [payload.id] :  payload.value};
        },
        pushToArray(state, payload) {
            state.proposition[payload.group][payload.key].push(payload.value);
        },
        removeFromArray(state, payload) {
            let arr = state.proposition[payload.group][payload.key];
            let index = payload.index;
            if (!payload.hasOwnProperty('index')) {
                index = arr.indexOf(payload.value)
            }
            arr.splice(index, 1);
        },
        initProposition(state, payload) {
            _.forEach(payload, (value, key) => {
                state.proposition[key] = value;
            });
            state.proposition.loaded = true;
            state.id = payload.id;
        },
        error(state, error) {
            state.error = error;
        },
        stepIncrement(state) {
            state.proposition.step++;
        },
        addToObjectArray(state, payload) {
            let object = payload.value;
            if (typeof(object.id) === 'undefined') {
                object.id = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    let r = Math.random()*16|0, v = c === 'x' ? r : (r&0x3|0x8);
                    return v.toString(16);
                })
            }
            state.proposition[payload.group][payload.key].push(object);
        },
        removeFromObjectArray(state, payload) {
            state.proposition[payload.group][payload.key] = _.filter(state.proposition[payload.group][payload.key], (o) => {
                return o.id !== payload.value;
            });
        },
        updateOffer(state, payload) {
            state.proposition.print.offers[payload.id][payload.field] = payload.value;
        },
        deletePrintOffer(state, payload) {
            delete(state.proposition.print.offers[payload.id]);
        },
        addAuthorExpense(state, payload) {
            state.proposition.authors_expense.expenses[payload.author].additional_expenses.push({expense:'', amount:0});
        },
        deleteAuthorExpense(state, payload) {
            state.proposition.authors_expense.expenses[payload.author].additional_expenses.splice(payload.index, 1);
        },
        addFile(state, payload) {
            state.proposition[payload.group][payload.key].push(payload.file);
        },
        removeFile(state, payload) {
            state.proposition[payload.group][payload.key].splice(_.findIndex(state.proposition[payload.group][payload.key], { 'id': payload.id }), 1);
        },
        fileNameSave(state, payload) {
            _.forEach(state.proposition[payload.group][payload.key], (o) => {
                if (o.id === payload.id) {
                    o.title = payload.title;
                }
            });
        }
    },
    actions: {
        initProposition({commit, state}, payload) {
            return new Promise((resolve, reject) => {
                axios.get('/api/proposition/' + payload.id)
                    .then((res) => {
                        commit('initProposition', res.data);
                        resolve();
                    })
                    .catch((err) => {

                    });
            });
        },
        saveProposition({commit, state}) {
            let step = state.proposition.step;
            if (step === 11){
                step = 4;
            }
            let data = {
                step: state.steps[step],
                data: state.proposition[state.steps[step]]
            };
            if (!state.proposition.id) {
                axios.post('/api/proposition', data)
                    .then((res) => {
                        commit('updateProposition', {key: 'id', value: res.data.id});
                    })
                    .catch((err) => {
                        commit('error', 'There was an error saving proposition. Please try again.');
                    });
            }
            else {
                axios.patch('/api/proposition/' + parseInt(state.proposition.id), data)
                    .then((res) => {
                        commit('initProposition', res.data);
                    })
                    .catch((err) => {
                        commit('error', 'There was an error saving proposition. Please try again.');
                    });
            }
        },
        initOffers({state, commit}) {
            return new Promise((resolve, reject) => {
                let offers = state.proposition.print.offers;
                _.forEach(state.proposition.technical_data.circulations, function (o) {
                    if (typeof(offers[o.id]) === 'undefined') {
                        let offer = {
                            title: o.title,
                            note: '',
                            print_offer: '',
                            book_binding: state.proposition.technical_data.book_binding,
                            paper_type: state.proposition.technical_data.paper_type,
                            cover_type: state.proposition.technical_data.cover_type,
                            colors: state.proposition.technical_data.colors,
                            colors_first_page: state.proposition.technical_data.colors_first_page,
                            colors_last_page: state.proposition.technical_data.colors_last_page,
                            additional_work: '',
                            cover_paper_type: state.proposition.technical_data.cover_paper_type,
                            cover_colors: state.proposition.technical_data.cover_colors,
                            cover_plastification: state.proposition.technical_data.cover_plastification,
                            film_print: state.proposition.technical_data.film_print,
                            blind_print: state.proposition.technical_data.blind_print,
                            uv_print: state.proposition.technical_data.uv_print,
                            number_of_pages: state.proposition.technical_data.number_of_pages,
                            hard_cover_circulation: 0,
                            soft_cover_circulation: 0,
                            total_cost: 0,
                            direct_cost_cover: 0,
                            complete_cost_cover: 0,
                            compensation: 0,
                            indirect_expenses:0,
                            complete_expense: 0,
                            remainder_after_sales: 0,
                            price_proposal: 0,
                            calculated_profit_percent: 18,
                            shop_percent: 20,
                            vat_percent: 5,
                        };
                        commit('pushToObject', {
                            id: o.id,
                            value: offer,
                            group: 'print',
                            key: 'offers'
                        });
                    }
                });
                resolve();
            });
        },
        initAuthorExpenses({state, commit}) {
            let expenses = state.proposition.authors_expense.expenses;
            _.forEach(state.proposition.basic_data.authors, function (a) {
                if (typeof(expenses[a.id]) === 'undefined') {
                    commit('pushToObject', {
                        group: 'authors_expense',
                        key: 'expenses',
                        id: a.id,
                        value: {
                            amount: '', percentage: '', accontation: '',
                            additional_expenses: []
                        }
                    });
                }
            });
        },
        deleteFile({commit}, payload) {
            commit('removeFile', payload);
            //make request to remove from system
            axios.delete('/api/file/'+payload.id);
        },
        fileNameSave({commit}, payload) {
            commit('fileNameSave', payload);
            //make request to change in system
        }
    }
}
