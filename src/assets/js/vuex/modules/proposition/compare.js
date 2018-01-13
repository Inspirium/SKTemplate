import axios from "axios/index";
let initialState = {
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
};
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
        },
        initClear({commit}) {
            return new Promise((resolve, reject) => {
                commit('initData', initialState);
                resolve();
            })

        }
    }
}