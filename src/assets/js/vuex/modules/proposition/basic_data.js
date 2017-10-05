import axios from 'axios';

export default {
    state: {
        title: '',
        authors: [],
        concept: '',
        note: '',
        possible_products: [],
        dotation: 'no',
        dotation_amount: '',
        dotation_origin: '',
        manuscript: '',
        manuscript_documents: []
    },
    mutations: {
        initData(state, payload) {
            state.title = payload.title;
            state.authors = payload.authors;
            state.concept = payload.concept;
            state.note = payload.note;
            state.possible_products = payload.possible_products;
            state.dotation = payload.dotation;
            state.dotation_amount = payload.dotation_amount;
            state.dotation_origin = payload.dotation_origin;
            state.manuscript = payload.manuscript;
            state.manuscript_documents = payload.manuscript_documents;
        }
    },
    actions: {
        getData({commit}, id) {
            axios.get('/api/proposition/'+id+'/basic_data')
                .then((res) => {
                    commit('initData', res.data);
                })
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/basic_data', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/basic_data', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root:true});
                        }
                    });
            }
        }
    }
}
