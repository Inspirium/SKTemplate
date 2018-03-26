import axios from 'axios'
import _ from 'lodash'
let initialState = {
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
    manuscript_documents: [],
    questionnaire: []
};
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
        manuscript_documents: [],
        questionnaire: []
    },
    mutations: {
        initData(state, payload) {
            state.title = payload.title;
            state.authors = payload.authors;
            state.concept = payload.concept;
            state.note = payload.note;
            state.possible_products = payload.possible_products?payload.possible_products:[];
            state.dotation = payload.dotation;
            state.dotation_amount = payload.dotation_amount;
            state.dotation_origin = payload.dotation_origin;
            state.manuscript = payload.manuscript;
            state.manuscript_documents = payload.manuscript_documents;
            state.questionnaire = payload.questionnaire;
        },
        addAuthor(state, payload) {
            state.authors.push(payload);
        },
        removeAuthor(state, payload) {
            state.authors = _.filter(state.authors, (author) => {
                return author.id != payload;
            })
        },
        addFile(state, payload) {
            let file = payload.file;
            if (payload.isFinal === 'manuscripts') {
                state.manuscript_documents.push(file);
            }
            if (payload.isFinal === 'questionnaire') {
                state.questionnaire.push(file);
            }

        },
        deleteFile(state, payload) {
            let id = payload.id;
            if (payload.isFinal === 'manuscripts') {
                state.manuscript_documents = _.filter(state.manuscript_documents, (file) => {
                    return file.id != id;
                })
            }
            if (payload.isFinal === 'questionnaire') {
                state.questionnaire = _.filter(state.questionnaire, (file) => {
                    return file.id != id;
                })
            }

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
        saveData({state}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/basic_data', state)
                        .then((res) => {
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
        },
        deleteFile({commit}, payload) {
            commit('deleteFile', payload.data);
            //make request to remove from system
            axios.delete('/api/file/'+payload.data.id);
        },
        filenameSave({commit}, payload) {
            commit('filenameSave', payload);
            //TODO: make request to change in system
        },
        initClear({commit}) {
            return new Promise((resolve, reject) => {
                commit('initData', initialState);
                resolve();
            })

        }
    }
}
