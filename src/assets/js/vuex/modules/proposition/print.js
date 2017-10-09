import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        offers: {}
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
            return new Promise((resolve, reject) => {
                if (!state.id || state.id != payload.id || payload.force) {
                    //retrieve data only we don't have it or we need to refresh it
                    axios.get('/api/proposition/' + payload.id + '/print')
                        .then((res) => {
                            commit('initData', res.data);
                            resolve();
                        });
                }
                else {
                    resolve();
                }
            })
        },
        saveData({state}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/print', state)
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