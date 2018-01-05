import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        marketing_expense : {
            budget: {
                totals: {}
            },
            expense: {
                totals: {}
            }
        },
        production_expense : {
            budget: {
                totals: {}
            },
            expense: {
                totals: {}
            }
        },
        authors : [],
        requests: {}
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
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/compare')
                    .then((res) => {
                        commit('initData', res.data);
                    })
                    .catch((err) => {
                        if(err.response.status === 403) {
                            window.location.href='/propositions'
                        }
                    });;
            }
        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/compare', state)
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