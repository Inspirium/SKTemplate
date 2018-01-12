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
        addFile(state, data) {
            if (data.isFinal) {
                state.final.push(data.file);
            }
            else {
                state.files.push(data.file);
            }
        },
        deleteFile(state, payload) {
            if (payload.isFinal) {
                state.final = _.filter(state.final, (file) => {
                    return file.id !== payload.id;
                })
            }
            else {
                state.files = _.filter(state.files, (file) => {
                    return file.id !== payload.id;
                })
            }
        },
        filenameSave(state, payload) {
            let files = payload.isFinal?state.final:state.files;
            _.forEach(files, (o) => {
                if (o.id === payload.id) {
                    o.title = payload.file.title;
                }
            });
        }
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
        },
        deleteFile({commit}, payload) {
            commit('deleteFile', payload.data.id);
            //make request to remove from system
            axios.delete('/api/file/'+payload.data.id.id);
        },
    }
}
