import axios from 'axios'
import _ from 'lodash'

export default {
    namespaced: true,
    state: {
        id: 0,
        title: '',
        authors: [],
        concept: '',
        note: '',
        possible_products: [],
        dotation: 'no',
        dotation_amount: '',
        dotation_origin: '',
        manuscript: '',
        manuscript_documents: []
    },
    mutations: {
        initData(state, payload) {
            state.title = payload.title;
            state.authors = payload.authors;
            state.concept = payload.concept;
            state.note = payload.note;
            state.possible_products = payload.possible_products;
            state.dotation = payload.dotation;
            state.dotation_amount = payload.dotation_amount;
            state.dotation_origin = payload.dotation_origin;
            state.manuscript = payload.manuscript;
            state.manuscript_documents = payload.manuscript_documents;
        },
        addAuthor(state, payload) {
            state.authors.push(payload);
        },
        removeAuthor(state, payload) {
            state.authors = _.filter(state.authors, (author) => {
                return author.id != payload;
            })
        },
        addFile(state, file) {
            state.manuscript_documents.push(file);
        },
        deleteFile(state, id) {
            state.manuscript_documents = _.filter(state.manuscript_documents, (file) => {
                return file.id != id;
            })
        },
        filenameSave(state, payload) {
            _.forEach(state.manuscript_documents, (o) => {
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
                axios.get('/api/proposition/' + payload.id + '/basic_data')
                    .then((res) => {
                        commit('initData', res.data);
                    })
            }
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/basic_data', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/basic_data', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root: true});
                        }
                    });
            }
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
