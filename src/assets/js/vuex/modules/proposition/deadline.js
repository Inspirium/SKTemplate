import axios from "axios/index";
let initialState = {
    id: 0,
    date: '',
    priority: '',
    note: ''
};
export default {
    namespaced: true,
    state: {
        id: 0,
        date: '',
        priority: '',
        note: ''
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
        saveDate(state, payload) {
            state.date = payload;
        }
    },
    actions: {
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/deadline', state)
                        .then((res) => {
                            resolve();
                        })
                        .catch(() => {
                            reject()
                        });
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