import axios from 'axios';

export default {
    namespaced: true,
    state: {
        price_first_year: {
            retail: 0,
            wholesale: 0,
            direct: 0,
            field:0,
            promotors:0,
            export: 0
        },
        price_second_year: {
            retail: 0,
            wholesale: 0,
            direct: 0,
            field:0,
            promotors:0,
            export: 0
        },
        retail_price: 0,
        selected_circulation: 0,
        offers: {}
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];  state[key] = payload[key];
            }
        }
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/price_definition')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/price_definition', state)
                        .then((res) => {
                            resolve();
                        });
                }
                else {
                    reject();
                }
            });
        }
    }
}
