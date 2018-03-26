import axios from 'axios';
import _ from "lodash";
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
        final_circulation: 0,
        final_print_price: 0,
        selected_circulation: 0,
        offers: {},
        print_offers: []
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];  state[key] = payload[key];
            }
        },
        addFile(state, payload) {
            let file = payload.file;
            if (payload.isFinal === 'print_offers') {
                state.print_offers.push(file);
            }

        },
        deleteFile(state, payload) {
            let id = payload.id;
            if (payload.isFinal === 'print_offers') {
                state.print_offers = _.filter(state.print_offers, (file) => {
                    return file.id != id;
                })
            }

        },
        filenameSave(state, payload) {
            _.forEach(state.print_offers, (o) => {
                if (o.id === payload.id) {
                    o.title = payload.title;
                }
            });
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
        },
        deleteFile({commit}, payload) {
            commit('deleteFile', payload.data);
            //make request to remove from system
            axios.delete('/api/file/'+payload.data.id);
        },
        filenameSave({commit}, payload) {
            commit('filenameSave', payload);
            //TODO: make request to change in system
        },
    }
}
