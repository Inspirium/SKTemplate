import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        type: '',
        note: '',
        margin: ''
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
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                let path = '/api/proposition/' + payload.id + '/distribution_expense/';
                if (payload.type) {
                    path += payload.type;
                }
                axios.get(path)
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    let path = '/api/proposition/' + id + '/distribution_expense/';
                    if (state.type === 'expense') {
                        path += 'expense';
                    }
                    axios.post(path, state)
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