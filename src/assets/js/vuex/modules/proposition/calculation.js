import axios from "axios/index";

export default {
    namespaced: true,
    state: {
        id: 0,
        author_expenses: [],
        offers: [{
            title: 0,
            total_cost: '',
            direct_cost_cover: '',
            complete_cost_cover: '',
            price_proposal:0,
            print_offer: 0,
            compensation:0,
            direct_cost: 0,
            indirect_expenses:0,
            remainder_after_sales:0,
            complete_expense:0,
            calculated_profit_percent:0,
            cost_coverage:0,
            manufacturer_price:0,
            shop_percent:0,
            price:0,
            vat_percent:0
        }],
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

    }
}