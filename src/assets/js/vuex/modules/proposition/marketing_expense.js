import axios from "axios/index";
let initialState = {
    proposition_id: 0,
    type: '',
    expense: '',
    note: '',
    additional_expenses: [],
    parent: {}
};
export default {
    namespaced: true,
    state: {
        proposition_id: 0,
        type: '',
        expense: '',
        note: '',
        additional_expenses: [],
        parent: {}
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                if (key === 'parent' && !payload.parent) {
                    continue;
                }
                state[key] = payload[key];
            }
        },
        addExpense(state) {
            state.additional_expenses.push({expense: '', amount: 0});
        },
        deleteExpense(state, index) {
            state.additional_expenses.splice(index, 1);
        }
    },
    actions: {
        initClear({commit}) {
            return new Promise((resolve, reject) => {
                commit('initData', initialState);
                resolve();
            })

        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    let path = '/api/proposition/' + id + '/marketing_expense/';
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
        }
    }
}