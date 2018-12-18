import axios from "axios/index";
import createPersistedState from "vuex-persistedstate";

export default {
    namespaced: true,
  //  plugins: [createPersistedState()],
    state: {
        categories: 0,
        types:0,
        schools:0,
        subjects:0,
        bibliotecas:0,
        book_tenders:0
    },
    mutations: {
        setCategories(state, payload) {
            state.categories = payload;
        },
        setTypes(state, payload) {
            state.types = payload;
        },
        setSchools(state, payload) {
            state.schools = payload;
        },
        setSubjects(state, payload) {
            state.subjects = payload;
        },
        setBibliotecas(state, payload) {
            state.bibliotecas = payload;
        },
        setBookTenders(state, payload) {
            state.book_tenders = payload;
        }
    },
    actions: {
        getCategories({commit, state}) {
            return new Promise((resolve, reject) => {
                if (!state.categories) {
                    axios.get('/api/book/category')
                        .then((res) => {
                            commit('setCategories', res.data);
                            resolve();
                        });
                }
                else {
                    resolve();
                }
            });
        },
        getTypes({commit, state}) {
            return new Promise((resolve, reject) => {
                if (!state.types) {
                    axios.get('/api/book/types')
                        .then((res) => {
                            commit('setTypes', res.data);
                            resolve();
                        });
                }
                else {
                    resolve();
                }
            });
        },
        getSchools({commit, state}) {
            return new Promise((resolve, reject) => {
                if (!state.schools) {
                    axios.get('/api/book/schools')
                        .then((res) => {
                            commit('setSchools', res.data);
                            resolve();
                        });
                }
                else {
                    resolve();
                }
            });
        },
        getSubjects({commit, state}) {
            return new Promise((resolve, reject) => {
                if (!state.subjects) {
                    axios.get('/api/book/subjects')
                        .then((res) => {
                            commit('setSubjects', res.data);
                            resolve();
                        });
                }
                else {
                    resolve();
                }
            });
        },
        getBibliotecas({commit, state}) {
            return new Promise((resolve, reject) => {
                if (!state.bibliotecas) {
                    axios.get('/api/book/bibliotecas')
                        .then((res) => {
                            commit('setBibliotecas', res.data);
                            resolve();
                        });
                }
                else {
                    resolve();
                }
            });
        },
        getBookTenders({commit, state}) {
            return new Promise((resolve, reject) => {
                if (!state.book_tenders) {
                    axios.get('/api/book/book_tenders')
                        .then((res) => {
                            commit('setBookTenders', res.data);
                            resolve();
                        });
                }
                else {
                    resolve();
                }
            });
        },
        getData({commit, state, dispatch}) {
            return new Promise((resolve, reject) => {
                Promise.all([
                    dispatch('getCategories'),
                    dispatch('getTypes'),
                    dispatch('getSchools'),
                    dispatch('getSubjects'),
                    dispatch('getBibliotecas'),
                    dispatch('getBookTenders'),
                ])
                    .then(() => {resolve()});
            })
        }
    }
}
