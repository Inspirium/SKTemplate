import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        circulations: [],
        additions: [],
        number_of_pages: 0,
        width: 0,
        height: 0,
        paper_type: '',
        additional_work: '',
        colors: '',
        colors_first_page: '',
        colors_last_page: '',
        cover_type: '',
        cover_paper_type: '',
        cover_colors: '',
        cover_plastification: '',
        film_print: 0,
        blind_print: 0,
        uv_print: 0,
        book_binding: '',
        note: ''
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                if (payload[key]) {
                    state[key] = payload[key];
                }
            }
        },
        addCirculation(state, circulation) {
            state.circulations.push({
                title: circulation,
                id: 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                    let r = Math.random() * 16 | 0,
                        v = c === 'x' ? r : (r & 0x3 | 0x8);
                    return v.toString(16);
                })
            })
        },
        deleteCirculation(state, id) {
            state.circulations = _.filter(state.circulations, (c) => {
                return c.id != id;
            })
        },
        addAddition(state, addition) {
            state.additions.push({
                title: addition,
                id: 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                    let r = Math.random() * 16 | 0,
                        v = c === 'x' ? r : (r & 0x3 | 0x8);
                    return v.toString(16);
                })
            })
        },
        deleteAddition(state, id) {
            state.additions = _.filter(state.additions, (a) => {
                return a.id != id;
            })
        }
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/technical_data')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/technical_data', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/technical_data', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root: true});
                        }
                    });
            }
        }
    }
}