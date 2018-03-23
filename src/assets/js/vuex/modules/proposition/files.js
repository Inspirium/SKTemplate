import axios from "axios/index";
let initialState = {
    proposition_id: 0,
    files: [],
    final: [],
    dir: ''
};
export default {
    namespaced: true,
    state: {
        proposition_id: 0,
        files: [],
        final: [],
        dir: '',
        step_status: ''
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
                state.final.push(data.file);
            }
            else {
                state.files.push(data.file);
            }
        },
        deleteFile(state, payload) {
            if (payload.isFinal === 'final') {
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
            let files = payload.isFinal==='final'?state.final:state.files;
            _.forEach(files, (o) => {
                if (o.id === payload.id) {
                    o.title = payload.file.title;
                }
            });
        }
    },
    actions: {
        saveData({state, commit, rootState, dispatch}, id) {
            if (rootState.route.meta.dir === 'marketing' || rootState.route.meta.dir === 'multimedia'){
                return dispatch( 'proposition/' + rootState.route.meta.dir + '/saveData', id, {root: true});
            }
            else {
                return new Promise((resolve, reject) => {
                    if (id) {
                        let path = '/api/proposition/' + id + '/files/' + rootState.route.meta.dir;
                        axios.post(path, state)
                            .then((res) => {
                                commit('initData', res.data);
                                resolve();
                            })
                            .catch(() => {
                                reject();
                            });
                    }
                    else {
                        reject();
                    }
                });
            }
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
        skipStep({rootState}) {
            return new Promise((resolve, reject) => {
                let path = '/api/proposition/' + rootState.route.params.id + '/files/' + rootState.route.meta.dir;
                console.log(path);
                axios.post(path, {status: 'skipped'})
                    .then(() => {
                        resolve();
                    })
                    .catch(() => {
                        reject();
                    });
            });
        },
        markFinished({rootState}) {
            return new Promise((resolve, reject) => {
                let path = '/api/proposition/' + rootState.route.params.id + '/files/' + rootState.route.meta.dir;
                axios.post(path, {status: 'finished'})
                    .then(() => {
                        resolve();
                    })
                    .catch(() => {
                        reject();
                    })
            });
        }
    }
}
