import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        type: '',
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
        additional_expenses: [],
        parent:{
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
            additional_expenses: [],
        }
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                if (key === 'parent' && !payload.parent) {
                    continue;
                }
                state[key] = payload[key];
            }
        },
        addExpense(state) {
            state.additional_expenses.push({expense: '', amount: 0});
        },
        deleteExpense(state, index) {
            state.additional_expenses.splice(index, 1);
        }
    },
    actions: {
        getData({commit, state}, payload) {
                let path = '/api/proposition/' + payload.id + '/production_expense/';
                if (payload.type) {
                    path += payload.type;
                }
                axios.get(path)
                    .then((res) => {
                        commit('initData', res.data);
                    });

        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    let path = '/api/proposition/' + id + '/production_expense/';
                    if (state.type === 'expense') {
                        path += 'expense';
                    }
                    axios.post(path, state)
                        .then((res) => {
                            commit('initData', res.data);
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