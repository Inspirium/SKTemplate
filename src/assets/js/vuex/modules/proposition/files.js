import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        proposition_id: 0,
        files: [],
        final: [],
        dir: ''
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
        saveData({state, commit, rootState}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    let path = '/api/proposition/' + id + '/files/' + rootState.route.meta.dir;
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
