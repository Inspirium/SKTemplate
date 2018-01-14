import axios from "axios/index";
let initialState = {
    id: 0,
    offers: {},
    active_offer: 0
};
export default {
    namespaced: true,
    state: {
        id: 0,
        offers: {},
        active_offer: 0
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                if (payload.hasOwnProperty(key)) {
                    state[key] = payload[key];
                }
            }
            state.active_offer = Object.keys(state.offers)[0];
        },
        addFile(state, payload) {
            state.offers[state.active_offer].files.push(payload.file);
        },
        deleteFile(state, payload) {
            state.offers[payload.offer].files = _.filter(state.offers[payload.offer].files, (file) => {
                return file.id !== payload.id;
            })
        },
        filenameSave(state, payload) {
            _.forEach(state.offers[state.active_offer].files, (o) => {
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
        },
        deleteFile({commit}, payload) {
            commit('deleteFile', payload.data);
            //make request to remove from system
            axios.delete('/api/file/'+payload.data.id);
        },
        filenameSave({commit}, payload) {
            commit('filenameSave', payload);
            //TODO: make request to change in system
        }
    }
}