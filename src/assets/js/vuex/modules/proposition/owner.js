
export default {
    namespaced: true,
    state: {
        image: '',
        name: '',
        id: 0,

    },
    mutations: {
        initData(state, payload) {
            state.image = payload.image;
            state.name = payload.name;
            state.id = payload.id;
        }
    }
}
