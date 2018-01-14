import axios from "axios/index";
let initialState = {
    id: 0,
    main_target: '',
    note: '',
    market_potential_documents: [],
};
export default {
    namespaced: true,
    state: {
        id: 0,
        main_target: '',
        note: '',
        market_potential_documents: [],
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];  state[key] = payload[key];
            }
        },
        addFile(state, file) {
            state.market_potential_documents.push(file);
        },
        deleteFile(state, data) {
            state.market_potential_documents = _.filter(state.market_potential_documents, (file) => {
                return file.id != data.data;
            })
        },
        filenameSave(state, payload) {
            _.forEach(state.market_potential_documents, (o) => {
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
                    axios.post('/api/proposition/' + id + '/market_potential', state)
                        .then(() => { resolve(); })
                        .catch(() => { reject(); });
                }
                else {
                    reject();
                }
            });
        },
        deleteFile({commit}, data) {
            console.log(data);
            commit('deleteFile', data);
            //make request to remove from system
            axios.delete('/api/file/'+data.data);
        },
        filenameSave({commit}, payload) {
            commit('filenameSave', payload);
            //TODO: make request to change in system
        }
    }
}