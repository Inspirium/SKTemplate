import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        text_price: '',
        text_price_amount: '',
        note: '',
        accontation: '',
        netto_price_percentage: '',
        reviews: '',
        lecture: '',
        lecture_amount: '',
        correction: '',
        correction_amount: '',
        proofreading: '',
        proofreading_amount: '',
        translation: '',
        translation_amount: '',
        index: '',
        index_amount: '',
        epilogue: '',
        photos: '',
        photos_amount: '',
        illustrations: '',
        illustrations_amount: '',
        technical_drawings: '',
        technical_drawings_amount: '',
        expert_report: '',
        copyright: '',
        copyright_mediator: '',
        selection: '',
        powerpoint_presentation: '',
        methodical_instrumentarium: '',
        additional_expense: []
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
                axios.get('/api/proposition/' + id + '/production_expense')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/production_expense', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/production_expense', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root: true});
                        }
                    });
            }
        }
    }
}