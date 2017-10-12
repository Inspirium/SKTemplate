import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        expenses: {
            authors: {},
            text_price: 0,
            reviews: 0,
            lecture: 0,
            correction: 0,
            proofreading: 0,
            translation: 0,
            index: 0,
            epilogue: 0,
            photos: 0,
            illustrations: 0,
            technical_drawings: 0,
            expert_report: 0,
            copyright: 0,
            copyright_mediator: 0,
            methodical_instrumentarium: 0,
            selection: 0,
            powerpoint_presentation: 0,
            additional_expense: 0,
            marketing_expense: 0,
        },
        authors: [],
        marketing_expense: 0,
        production_expense: {
            text_price: 0,
            reviews: 0,
            lecture: 0,
            correction: 0,
            proofreading: 0,
            translation: 0,
            index: 0,
            epilogue: 0,
            photos: 0,
            illustrations:0,
            technical_drawings:0,
            expert_report:0,
            copyright:0,
            copyright_mediator:0,
            methodical_instrumentarium:0,
            selection:0,
            powerpoint_presentation:0,
            accontation:0,
            additional_expense:0
        }

    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        },
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/compare')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/compare', state)
                        .then((res) => {
                            resolve();
                        })
                        .catch(() => { reject(); });
                }
                else {
                    reject();
                }
            });
        }
    }
}