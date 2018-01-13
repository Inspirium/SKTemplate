import axios from 'axios';
let initialState = {
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
};
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
        initClear({commit}) {
            return new Promise((resolve, reject) => {
                commit('initData', initialState);
                resolve();
            })

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
