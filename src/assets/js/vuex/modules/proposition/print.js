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
        },
        addFile(state, payload) {
            state.offers[payload.offer].files.push(payload.file);
        },
        deleteFile(state, payload) {
            state.offers[payload.offer].files = _.filter(state.offers[payload.offer].files, (file) => {
                return file.id !== payload.id;
            })
        },
        filenameSave(state, payload) {
            _.forEach(state.offers[payload.offer].files, (o) => {
                if (o.id === payload.id) {
                    o.title = payload.title;
                }
            });
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
        },
        deleteFile({commit}, payload) {
            commit('deleteFile', payload);
            //make request to remove from system
            axios.delete('/api/file/'+payload.id);
        },
        filenameSave({commit}, payload) {
            commit('filenameSave', payload);
            //TODO: make request to change in system
        }
    }
}