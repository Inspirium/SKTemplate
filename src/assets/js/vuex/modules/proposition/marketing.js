import axios from "axios/index";
let initialState = {
    cover: [],
    leaflet: []
};
export default {
    namespaced: true,
    state: {
        cover: [],
        leaflet: []
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
        addFile(state, data) {
            if (data.isFinal === 'final') {
                state.leaflet.push(data.file);
            }
            else {
                state.cover.push(data.file);
            }
        },
        deleteFile(state, payload) {
            if (payload.isFinal === 'final') {
                state.leaflet = _.filter(state.leaflet, (file) => {
                    return file.id !== payload.id;
                })
            }
            else {
                state.cover = _.filter(state.cover, (file) => {
                    return file.id !== payload.id;
                })
            }
        },
        filenameSave(state, payload) {
            let files = payload.isFinal==='final'?state.leaflet:state.cover;
            _.forEach(files, (o) => {
                if (o.id === payload.id) {
                    o.title = payload.file.title;
                }
            });
        }
    },
    actions: {
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/files/marketing', state)
                        .then((res) => {
                            resolve();
                        })
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
        initClear({commit}) {
            return new Promise((resolve, reject) => {
                commit('initData', initialState);
                resolve();
            })

        }
    }
}