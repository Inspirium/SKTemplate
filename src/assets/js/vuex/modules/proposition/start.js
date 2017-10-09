import axios from 'axios';

export default {
    namespaced: true,
    state: {
        id: 0,
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
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/start')
                    .then((res) => {
                        commit('initData', res.data);
                        commit('proposition/initData', res.data, {root: true});
                    });
            }
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
                            commit('proposition/initData', res.data, {root: true});
                        }
                    });
            }
        }
    }
}
