import axios from "axios/index";

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
                state[Object.keys(state)[i]] = payload[i];
            }
        },
        addFile(state, file) {
            state.market_potential_documents.push(file);
        },
        deleteFile(state, id) {
            state.market_potential_documents = _.filter(state.market_potential_documents, (file) => {
                return file.id != id;
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
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/market_potential')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
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
        deleteFile({commit}, id) {
            commit('deleteFile', id);
            //make request to remove from system
            axios.delete('/api/file/'+id);
        },
        filenameSave({commit}, payload) {
            commit('filenameSave', payload);
            //TODO: make request to change in system
        }
    }
}