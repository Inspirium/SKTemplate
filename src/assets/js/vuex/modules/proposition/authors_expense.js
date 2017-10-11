import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        authors: [],
        note: '',
        other: []
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
        addExpense(state, author) {
            state.authors[author].expenses[0].additional_expenses.push({expense:'', amount: 0})
        },
        deleteExpense(state, payload) {
            state.authors[payload.author].expenses[0].additional_expenses.splice(payload.index, 1);
        },
        addOtherExpense(state) {
            state.other.push({expense:'', amount: 0});
        },
        deleteOtherExpense(state, index) {
            state.other.splice(index, 1);
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