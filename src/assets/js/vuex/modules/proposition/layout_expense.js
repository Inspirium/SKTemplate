import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        layout_complexity: '',
        layout_include: '',
        layout_note: '',
        design_complexity: '',
        design_include: '',
        design_note: ''
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                state[Object.keys(state)[i]] = payload[i];
            }
        }
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/layout_expense')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/layout_expense', state)
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