import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        author_expenses: [],
        offers: [],
        authors_expenses: [],
        authors_total: 0,
        authors_advance: 0,
        authors_other: 0,
        marketing_expense: 0,
        production_expense: 0,
        design_layout_expense: 0,
        dotation: 0,
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
        getData({commit, state, dispatch}, payload) {
            if (!state.id || state.id != payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/calculation')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/calculation', state)
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
    },
    getters: {
        totals(state) {
            let options = {};
            _.forEach(state.offers, (option) => {
                let x6 = Number(state.authors_total) + Number(option.print_offer) + Number(state.marketing_expense) + Number(state.production_expense) + Number(state.design_layout_expense),
                    x7 = x6 * option.compensation/100,
                    x8 = x6 + x7,
                    x9 = x8 * option.indirect_expenses / 100,
                    x10 = x8 + x9,
                    remainder = _.sumBy(Object.keys(state.author_expenses), (key) => {
                        let e = state.author_expenses[key];
                        return e.percentage * option.title * option.price_proposal / 100;
                    }),
                    x11 = remainder - Number(state.authors_advance),
                    x12 = x10 + x11,
                    x14 = x12 - Number(state.dotation),
                    x15 = x14 * option.calculated_profit_percent / 100,
                    x16 = x14 + x15,
                    p17 = Number(option.shop_percent) / 100,
                    x17 = x16 * p17 / (1-p17),
                    x18 = x17 + x16,
                    x19 = x18 * option.vat_percent / 100,
                    x20 = x18 + x19;


                options[option.id] = {
                    x6: x6,
                    x7: x7,
                    x8: x8,
                    x9: x9,
                    x10: x10,
                    x11: x11,
                    x12: x12,
                    x14: x14,
                    x15: x15,
                    x16: x16,
                    x17: x17,
                    x18: x18,
                    x19: x19,
                    x20: x20,

                };
            });
            return options;
        },
    }
}