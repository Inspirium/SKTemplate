import axios from "axios/index";
let initialState = {
    webshop: '',
    jpg: [],
    psd: [],
};
export default {
    namespaced: true,
    state: {
        webshop: '',
        jpg: [],
        psd: [],
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
        addFile(state, data) {
            if (data.isFinal) {
                state.psd.push(data.file);
            }
            else {
                state.jpg.push(data.file);
            }
        },
        deleteFile(state, payload) {
            if (payload.isFinal) {
                state.psd = _.filter(state.psd, (file) => {
                    return file.id !== payload.id;
                })
            }
            else {
                state.jpg = _.filter(state.jpg, (file) => {
                    return file.id !== payload.id;
                })
            }
        },
        filenameSave(state, payload) {
            let files = payload.isFinal?state.psd:state.jpg;
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
                    axios.post('/api/proposition/' + id + '/files/multimedia', state)
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

        },
    }
}