import axios from "axios/index";

let initialState = {
    id: 0,
    type: '',
    authors: [],
    note: '',
    other: [],
};
export default {
    namespaced: true,
    state: {
        id: 0,
        type: '',
        authors: [],
        note: '',
        other: [],
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
        addExpense(state, author) {
            state.authors[author].expenses[0].additional_expenses.push({expense:'', amount: 0, id: 0})
        },
        deleteExpense(state, payload) {
            state.authors[payload.author].expenses[0].additional_expenses.splice(payload.index, 1);
        },
        addOtherExpense(state) {
            state.other.push({expense:'', amount: 0, id: 0});
        },
        deleteOtherExpense(state, index) {
            state.other.splice(index, 1);
        }
    },
    actions: {
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    let path = '/api/proposition/' + id + '/authors_expense/';
                    if (state.type === 'expense') {
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
        },
        initClear({commit}) {
            return new Promise((resolve, reject) => {
                commit('initData', initialState);
                resolve();
            })

        }
    }
}