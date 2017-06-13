import axios from 'axios';
import _ from 'lodash';

export default {
    namespaced: true,
    state: {
        proposition: {
            assigned: {
                departments: [],
                employees: []
            },
            id: 0,
            basic_data: {
                title: '',
                authors: [],
                concept: '',
                note: '',
                possible_products: [],
                dotation: '',
                dotation_amount: '',
                dotation_origin: '',
                manuscript: '',
                manuscript_documents: [],
            },
            categorization: {
                supergroup: 0,
                upgroup: 0,
                group: 0,
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
                film_print: '',
                blind_print: '',
                uv_film: '',
                note: ''
            },
            print: {
                offers:[]
            },
            authors_expense: {},
            production_expense: {
                text_price: 0,
                text_price_amount: 0,
                note: '',
                accontation: 0,
                netto_price_percentage: 0,
                reviews: 0,
                lecture: 0,
                lecture_amount: 0,
                correction: 0,
                correction_amount: 0,
                proofreading: 0,
                proofreading_amount: 0,
                translation: 0,
                translation_amount: 0,
                index: 0,
                index_amount: 0,
                reviews2: 0,
                photos: 0,
                photos_amount: 0,
                illustrations: 0,
                illustrations_amount: 0,
                technical_drawings: 0,
                technical_drawings_amount: 0,
                expert_report: 0,
                copyright: 0,
                copyright_mediator: 0,
                selection: 0,
                powerpoint_presentation: 0,
                methodical_instrumentarium: 0
            },
            marketing_expense: {},
            distribution_expense: {},
            layout_expense: {},
            deadline: {},
            precalculation: {},
            calculation: {},
            work_order: {},

            step: 0,
        },
        steps: [
            '/proposition/basic_data',
            '/proposition/categorization',
            '/proposition/market_potential',
            '/proposition/technical_data',
            '/proposition/print',
            '/proposition/authors_expense',
            '/proposition/production_expense',
            '/proposition/marketing_expense',
            '/proposition/distribution_expense',
            '/proposition/layout_expense',
            '/proposition/deadline',
            '/proposition/precalculation',
            '/proposition/calculation',
            '/proposition/word_order',
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
        addCirculation(state, payload) {
            state.proposition.technical_data.circulations.push({
                title: payload.value,
                id: 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    let r = Math.random()*16|0, v = c === 'x' ? r : (r&0x3|0x8);
                    return v.toString(16);
                })
            });
        },
        removeCirculation(state, payload) {
            state.proposition.technical_data.circulations = _.filter(state.proposition.technical_data.circulations, (o) => {
                return o.id !== payload.value;
            });
        }
    },
    actions: {
        saveProposition({commit, state}) {
            //TODO: make request
            if (!state.proposition.id) {
                axios.post('/api/proposition', state.proposition)
                    .then((res) => {
                        commit('updateProposition', {key: 'id', value: res.data.id});
                        commit('stepIncrement');
                    })
                    .catch((err) => {
                        commit('error', 'There was an error saving proposition. Please try again.');
                    });
            }
            else {
                axios.patch('/api/proposition/' + parseInt(state.proposition.id), state.proposition)
                    .then((res) => {
                        commit('stepIncrement');
                    })
                    .catch((err) => {
                        commit('error', 'There was an error saving proposition. Please try again.');
                    });
            }
        }
    }
}
