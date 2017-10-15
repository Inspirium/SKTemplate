import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        expense: '',
        note: '',
        additional_expenses: [],
        parent: {}
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
        addExpense(state) {
            state.additional_expense.push({expense: '', amount: 0});
        },
        deleteExpense(state, index) {
            state.additional_expense.splice(index, 1);
        }
    },
    actions: {
        getData({commit, state}, payload) {
                //retrieve data only we don't have it or we need to refresh it
                let path = '/api/proposition/' + payload.id + '/marketing_expense/';
                if (payload.type) {
                    path += payload.type;
                }
                axios.get(path)
                    .then((res) => {
                        commit('initData', res.data);
                    });

        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    let path = '/api/proposition/' + id + '/marketing_expense/';
                    if (state.placeholders) {
                        path += 'expense';
                    }
                    axios.post(path, state)
                        .then((res) => {
                            commit('initData', res.data);
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