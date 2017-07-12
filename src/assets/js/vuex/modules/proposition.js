import axios from 'axios';
import _ from 'lodash';

export default {
    namespaced: true,
    state: {
        proposition: {
            loaded: false,
            assigned: {
                departments: [],
                employees: []
            },
            id: 0,
            basic_data: {
                title: '',
                authors: {},
                concept: '',
                note: '',
                possible_products: [],
                dotation: 'no',
                dotation_amount: '',
                dotation_origin: '',
                manuscript: '',
                manuscript_documents: [],
            },
            categorization: {
                supergroup: 0,
                supergroup_text: '',
                upgroup: 0,
                upgroup_coef: 0,
                group_text: '',
                note: '',
                book_type_group: 0,
                book_type: 0,
                school_type: [],
                school_level: [],
                school_assignment: '',
                school_subject: '',
                school_subject_detailed: '',
                biblioteca:'',
            },
            market_potential: {
                main_target: '',
                note: '',
                market_potential_documents: [],
            },
            technical_data: {
                circulations: [],
                additions: [],
                number_of_pages: 0,
                width: 0,
                height: 0,
                paper_type: '',
                additional_work: '',
                colors: '',
                colors_first_page: '',
                colors_last_page: '',
                cover_type: '',
                cover_paper_type: '',
                cover_colors: '',
                cover_plastification: '',
                film_print: 0,
                blind_print: 0,
                uv_print: 0,
                book_binding: '',
                note: ''
            },
            print: {
                offers : {}
            },
            authors_expense: {
                expenses: {},
                note: '',
                other: []
            },
            production_expense: {
                text_price: '',
                text_price_amount: '',
                note: '',
                accontation: '',
                netto_price_percentage: '',
                reviews: '',
                lecture: '',
                lecture_amount: '',
                correction: '',
                correction_amount: '',
                proofreading: '',
                proofreading_amount: '',
                translation: '',
                translation_amount: '',
                index: '',
                index_amount: '',
                epilogue: '',
                photos: '',
                photos_amount: '',
                illustrations: '',
                illustrations_amount: '',
                technical_drawings: '',
                technical_drawings_amount: '',
                expert_report: '',
                copyright: '',
                copyright_mediator: '',
                selection: '',
                powerpoint_presentation: '',
                methodical_instrumentarium: '',
                additional_expense: []
            },
            marketing_expense: {
                expense: '',
                note: '',
                additional_expenses: []
            },
            distribution_expense: {
                note: '',
                margin: ''
            },
            layout_expense: {
                layout_complexity: '',
                layout_include: '',
                layout_note: '',
                design_complexity: '',
                design_include: '',
                design_note: ''
            },
            deadline: {
                date: '',
                priority: '',
                note: ''
            },
            precalculation: {},
            calculation: {
                options: {}
            },
            work_order: {},
            owner: {},
            created_at: 0,

            step: 0,
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
            'precalculation',
            'calculation',
            'work_order',
        ],
        error: ''
    },
    mutations: {
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
        },
        error(state, error) {
            state.error = error;
        },
        stepIncrement(state) {
            state.proposition.step++;
        },
        addToObjectArray(state, payload) {
            state.proposition[payload.group][payload.key].push({
                title: payload.value,
                id: 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    let r = Math.random()*16|0, v = c === 'x' ? r : (r&0x3|0x8);
                    return v.toString(16);
                })
            });
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
        }
    },
    actions: {
        initProposition({commit, state}, payload) {
            axios.get('/api/proposition/'+payload.id)
                .then((res) => {
                    commit('initProposition', res.data);
                })
                .catch((err) => {

                });
        },
        saveProposition({commit, state}) {
            //TODO: make request
            let data = {
                step: state.steps[state.proposition.step],
                data: state.proposition[state.steps[state.proposition.step]]
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
                        //commit('stepIncrement');
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
        }
    }
}
