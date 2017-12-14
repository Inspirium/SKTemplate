import createPersistedState from "vuex-persistedstate";
import axios from "axios/index";

export default {
    namespaced: true,
    plugins: [createPersistedState()],
    state: {
        id: 0,
        name: '',
        roles: []
    },
    mutations: {
        setUser(state, payload) {

        }
    },
    getters: {},
    actions: {
        initUser({state, commit}) {
            if (!state.id || state.id !== window.Laravel.userId) {
                axios.get('api/me')
                    .then((res) => {
                         commit('setUser', res.data);
                    });
            }
        }
    }
}