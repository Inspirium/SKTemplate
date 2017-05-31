import axios from 'axios';
import _ from 'lodash';

export default {
    namespaced: true,
    state: {
        proposition: {
            id: 0,
            title: '',
            authors: [],
            concept: '',
            basic_data_note: '',
            possible_products: [],
            dotation: '',
            dotation_amount: '',
            dotation_origin: '',
            manuscript: '',
            manuscript_documents: [],
            supergroup: 0,
            upgroup: 0,
            group: 0,
            categorization_note: '',

            book_type_group: '',
            book_type: '',
            school_type: [],
            school_level: [],
            school_assignment: '',
            school_subject: '',
            school_subject_detailed: '',
            biblioteca:'',

            main_target: '',
            market_potential_note: '',
            market_potential_documents: [],

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

        },
        step: 0,
        error: ''
    },
    mutations: {
        updateProposition(state, payload) {
            state.proposition[payload.key] = payload.value;
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
