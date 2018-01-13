import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        name: '',
        department_id: 0,
        roles: [],
        image: ''
    },
    mutations: {
        setUser(state, payload) {
            state.id = payload.id;
            state.name = payload.name;
            state.roles = payload.roles;
            state.department_id = payload.department_id;
            state.image = payload.image;
        }
    },
    getters: {},
    actions: {
        initUser({state, commit}) {
            if (!state.id || state.id !== window.Laravel.userId) {
                axios.get('/api/me')
                    .then((res) => {
                         commit('setUser', res.data);
                    });
            }
        }
    }
}