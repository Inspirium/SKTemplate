import axios from 'axios';

export default {
    namespaced: true,
    state: {
        supergroup: 0,
        upgroup: 0,
        group: 0,
        note: '',
        book_type_group: 0,
        book_type: 0,
        school_type: [],
        school_level: [],
        school_assignment: 0,
        school_subject: 0,
        school_subject_detailed: 0,
        biblioteca: 0
    },
    mutations: {
        initData(state, payload) {
            state.supergroup = payload.supergroup;
            state.upgroup = payload.upgroup;
            state.group = payload.group;
            state.book_type_group = payload.book_type_group;
            state.book_type = payload.book_type;
            state.school_type = payload.school_type;
            state.school_level = payload.school_level;
            state.school_assignment = payload.school_assignment;
            state.school_subject = payload.school_subject;
            state.school_subject_detailed = payload.school_subject_detailed;
            state.biblioteca = payload.biblioteca;
            state.note = payload.note;
        }
    },
    actions: {
        getData({commit}, id) {
            axios.get('/api/proposition/' + id + '/categorization')
                .then((res) => {
                    commit('initData', res.data);
                });

        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/categorization', state)
                    .then((res) => {});
            }
            else {
                axios.post('/api/proposition/categorization', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root:true});
                        }
                    });
            }
        }
    }
}
