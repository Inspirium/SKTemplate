import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        authors: [],
        expenses: {},
        note: '',
        other: []
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        }
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/authors_expense')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/authors_expense', state)
                        .then((res) => {
                        resolve();
                        })
                        .catch(() => { reject(); });
                }
                else {
                    reject();
                }
            });
        }
    }
}