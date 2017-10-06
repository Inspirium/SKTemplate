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
                state[i] = payload[i];
            }
        }
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id !== payload.id || payload.force) {                 
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + id + '/market_potential')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/market_potential', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/market_potential', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root: true});
                        }
                    });
            }
        }
    }
}