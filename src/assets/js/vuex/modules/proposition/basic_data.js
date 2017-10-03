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
            state = payload;
        }
    },
    actions: {
        getData({commit}, id) {
            axios.get('/api/proposition/'+id+'/basic_data')
                .then((res) => {
                    commit('initData', res.data);
                })
        }
    }
}
