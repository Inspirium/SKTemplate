import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        expense: '',
        note: '',
        additional_expenses: []
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                state[Object.keys(state)[i]] = payload[i];
            }
        }
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/marketing_expense')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/marketing_expense', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/marketing_expense', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root: true});
                        }
                    });
            }
        }
    }
}