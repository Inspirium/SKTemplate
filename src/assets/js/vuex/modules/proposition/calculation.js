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
                let remainder = _.sumBy(Object.keys(state.author_expenses), (key) => {
                        let e = state.author_expenses[key];
                        return e.percentage * option.title * option.price_proposal / 100;
                    }),
                    direct_cost = Number(state.authors_total) + Number(option.print_offer) + Number(option.compensation)*total_expenses/100 +Number(state.marketing_expense) + Number(state.production_expense) + Number(state.design_layout_expense),
                    indirect_expense = direct_cost * option.indirect_expenses / 100,
                    complete = direct_cost + indirect_expense + remainder-state.authors_advance,
                    mprice = (Number(complete) - Number(state.dotation)) * (100 + Number(option.calculated_profit_percent)) / 100,
                    price = mprice * (100 + Number(option.shop_percent)) / 100,
                    total_expenses = Number(state.authors_total) + Number(option.print_offer) + Number(state.marketing_expense) + Number(state.production_expense) + Number(state.design_layout_expense);


                options[option.id] = {
                    direct_cost: direct_cost,
                    indirect_expense: indirect_expense,
                    remainder_after_sales: remainder-state.authors_advance,
                    complete_expense: complete,
                    cost_coverage: (Number(complete) - Number(state.dotation)),
                    manufacturer_price: mprice,
                    price: price,
                    total_cost: price * (100 + Number(option.vat_percent)) / 100,
                    total_expenses: total_expenses
                };
            });
            return options;
        },
    }
}