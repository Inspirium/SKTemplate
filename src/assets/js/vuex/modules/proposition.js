import axios from 'axios';

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
            supergroup: 1,
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

            biblioteca:''

        },
        step: 1,
        error: ''
    },
    mutations: {
        updateProposition(state, payload) {
            state.proposition[payload.key] = payload.value;
        },
        initProposition(state, payload) {
            state.proposition = payload;
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
