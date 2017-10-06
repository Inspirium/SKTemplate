import axios from 'axios';

export default {
    namespaced: true,
    state: {
        id: 0,
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
            state.supergroup = payload.group.parent.parent.id;
            state.upgroup = payload.group.parent.id;
            state.group = payload.group.id;
            state.book_type_group = payload.book_type.parent_id;
            state.book_type = payload.book_type.id;
            state.school_type = payload.school_type.id;
            state.school_level = payload.school_level;
            state.school_assignment = payload.school_assignment;
            state.school_subject = payload.school_subject.parent_id;
            state.school_subject_detailed = payload.school_subject.id;
            state.biblioteca = payload.biblioteca.id;
            state.note = payload.note;
        }
    },
    actions: {
        getData({commit, state}, payload) {
            if (!state.id || state.id !== payload.id || payload.force) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + id + '/categorization')
                    .then((res) => {
                        commit('initData', res.data);
                    });
            }
        },
        saveData({state, commit}, id) {
            if (id) {
                axios.post('/api/proposition/' + id + '/categorization', state)
                    .then((res) => {
                    });
            }
            else {
                axios.post('/api/proposition/categorization', state)
                    .then((res) => {
                        if (res.data.id) {
                            commit('proposition/setId', res.data.id, {root: true});
                        }
                    });
            }
        }
    }
}
