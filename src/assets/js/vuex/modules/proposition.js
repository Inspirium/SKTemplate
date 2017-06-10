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
                colors: [],
                colors_first_page: [],
                colors_last_page: [],
                cover_type: '',
                cover_paper_type: '',
                cover_colors: [],
                cover_plastification: '',
                film_print: '',
                blind_print: '',
                uv_film: '',
                technical_data_note: ''
            }

        },
        step: 0,
        error: ''
    },
    mutations: {
        updateProposition(state, payload) {
            console.log(payload);
            if (payload.group) {
                state.proposition[payload.group][payload.key] = payload.value;
            }
            else {
                state.proposition[payload.key] = payload.value;
            }
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
            state.step++;
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
