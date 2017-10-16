import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        proposition_id: 0,
        layout_complexity: '',
        layout_include: '',
        layout_note: '',
        design_complexity: '',
        design_include: '',
        design_note: '',
        number_of_pages: 0,
        photos_amount: 0,
        illustrations_amount: 0,
        technical_drawings_amount: 0,
        group: {}
    },
    mutations: {
        initData(state, payload) {
            for (let i in Object.keys(state)) {
                let key = Object.keys(state)[i];
                state[key] = payload[key];
            }
        }
    },
    actions: {
        getData({commit, state}, payload) {
            return new Promise((resolve, reject) => {
            if (!state.proposition_id || state.proposition_id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/layout_expense')
                    .then((res) => {
                        commit('initData', res.data);
                        resolve();
                    })
                    .catch(() => {
                        reject();
                    });
            }
            else {
                resolve();
            }
            });
        },
        saveData({state}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/layout_expense', state)
                        .then(() => { resolve(); })
                        .catch(() => { reject(); });
                }
                else {
                    reject();
                }
            });
        }
    },
    getters: {
        number_of_hours: state => {
            if (!state.group.parent){
                return 0;
            }
            let category = state.group.parent.coefficient / 60,
                pages = state.number_of_pages,
                photos = state.photos_amount / 30,
                illustrations = state.illustrations_amount / 30,
                drawings = state.technical_drawings_amount / 30;
            const complexity = {
                1: 0.65,
                2: 0.8,
                3: 1,
                4: 1.2,
                5: 1.35
            };
            return (category * pages + photos + illustrations + drawings) * complexity[state.layout_complexity];
        },
        layout_total: (state, getters) => {
            let price = 8000 / 175;
            return getters.number_of_hours * price;
        },
        design_total: (state, getters) => {
            let price = 15000 / 175;
            const complexity = {
                1: 0.4,
                2: 0.7,
                3: 1,
                4: 1.3,
                5: 1.6
            };
            return getters.number_of_hours * price * complexity[state.design_complexity] / 2;
        }
    }
}