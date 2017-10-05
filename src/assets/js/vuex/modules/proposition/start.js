import axios from 'axios';

export default {
    namespaced: true,
    state: {
        project_number: '',
        project_name: '',
        additional_project_number: '',
        note: ''
    },
    mutations: {
        initData(state, payload) {
            state.project_number = payload.project_number;
            state.additional_project_number = payload.additional_project_number;
            state.project_name = payload.project_name;
            state.note = payload.note;
        }
    },
    actions: {
        getData({commit}, id) {
            axios.get('/api/proposition/' + id + '/start')
                .then((res) => {
                    commit('initData', res.data);
                });
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/start', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/start', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root:true});
                        }
                    });
            }
        }
    }
}
