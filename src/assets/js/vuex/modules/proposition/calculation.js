import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        author_expenses: [],
        offers: [],
        authors_total: 0,
        authors_advance: 0,
        authors_other: 0,
        marketing_expense: 0,
        production_expense: 0,
        design_layout_expense: 0,
        dotation: 0,
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
    },
    actions: {
        getData({commit, state, dispatch}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/calculation')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/calculation', state)
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
    },
    getters: {

    }
}