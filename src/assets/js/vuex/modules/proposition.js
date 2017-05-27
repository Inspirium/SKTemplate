export default {
    namespaced: true,
    state: {
        proposition: {
            id: 0,
            title: '',
            authors: [],
            concept: '',
            basic_data_note: '',
            possible_products: [],
            dotation: '',
            dotation_amount: '',
            dotation_origin: '',
            manuscript: '',
            manuscript_documents: []
        },
        step: 0
    },
    mutations: {
        updateProposition(state, payload) {
            state.proposition[payload.key] = payload.value;
        }
    }
}
