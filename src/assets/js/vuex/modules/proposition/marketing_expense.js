import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        expense: '',
        note: '',
        additional_expense: []
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
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/marketing_expense')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/marketing_expense', state)
                        .then(() => { resolve(); })
                        .catch(() => { reject(); });
                }
                else {
                    reject();
                }
            });
        }
    }
}