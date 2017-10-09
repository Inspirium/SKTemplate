import axios from "axios/index";
import createPersistedState from "vuex-persistedstate";

export default {
    namespaced: true,
    plugins: [createPersistedState()],
    state: {
        categories: 0,
        types:0,
        schools:0,
        subjects:0,
        bibliotecas:0
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
        }
    },
    actions: {
        getData({commit, state}) {
            if (!state.categories) {
                axios.get('/api/book/category')
                    .then((res) => {
                        commit('setCategories', res.data);
                    });
            }
            if (!state.types) {
                axios.get('/api/book/types')
                    .then((res) => {
                        commit('setTypes', res.data);
                    });
            }
            if (!state.schools) {
                axios.get('/api/book/schools')
                    .then((res) => {
                        commit('setSchools', res.data);
                    });
            }
            if (!state.subjects) {
                axios.get('/api/book/subjects')
                    .then((res) => {
                        commit('setSubjects', res.data);
                    });
            }
            if (!state.bibliotecas) {
                axios.get('/api/book/bibliotecas')
                    .then((res) => {
                        commit('setBibliotecas', res.data);
                    });
            }
        }
    }
}
