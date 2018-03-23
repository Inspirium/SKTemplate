import axios from "axios/index";
let initialState = {
    webshop: '',
    jpg: [],
    psd: [],
    preview: [],
    step_status: ''
};
export default {
    namespaced: true,
    state: {
        webshop: '',
        jpg: [],
        psd: [],
        preview: []
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
        addFile(state, data) {
            console.log(data);
            if (data.isFinal === 'preview') {
                state.preview.push(data.file);
            }
            if (data.isFinal === 'final') {
                state.psd.push(data.file);
            }
            if (data.isFinal === 'initial') {
                state.jpg.push(data.file);
            }
        },
        deleteFile(state, payload) {
            if (payload.isFinal === 'preview') {
                state.preview = _.filter(state.preview, (file) => {
                    return file.id !== payload.id;
                })
            }
            if (payload.isFinal === 'final') {
                state.psd = _.filter(state.psd, (file) => {
                    return file.id !== payload.id;
                })
            }
            if (data.isFinal === 'initial') {
                state.jpg = _.filter(state.jpg, (file) => {
                    return file.id !== payload.id;
                })
            }
        },
        filenameSave(state, payload) {
            let files = payload.isFinal==='final'?state.psd:state.jpg;
            if (payload.isFinal === 'preview') {
                files = state.preview;
            }
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