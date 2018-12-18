import axios from 'axios';

let initialState = {
    proposition_id: 0,
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
    biblioteca: 0,
    book_tender: 0
};
export default {
    namespaced: true,
    state: {
        proposition_id: 0,
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
        biblioteca: 0,
        book_tender: 0
    },
    mutations: {
        initData(state, payload) {
            if (payload.group) {
                state.supergroup = payload.group.parent.parent_id;
                state.upgroup = payload.group.parent.id;
                state.group = payload.group.id;
            }
            else {
                state.supergroup = 0;
                state.upgroup = 0;
                state.group = 0;
            }
            if (payload.book_type) {
                state.book_type_group = payload.book_type.parent_id;
                state.book_type = payload.book_type.id;
            }
            else {
                state.book_type_group = 0;
                state.book_type = 0;
            }
            state.school_type = payload.school_type;

            state.school_level = payload.school_level;
            state.school_assignment = payload.school_assignment;
            if (payload.school_subject) {
                state.school_subject = payload.school_subject.parent_id;
                state.school_subject_detailed = payload.school_subject.id;
            }
            else {
                state.school_subject = 0;
                state.school_subject_detailed = 0;
            }
            if (payload.biblioteca) {
                state.biblioteca = payload.biblioteca.id;
            }
            else {
                state.biblioteca = 0;
            }
            if (payload.book_tender) {
                state.book_tender = payload.book_tender.id;
            }
            else {
                state.book_tender = 0;
            }
            state.note = payload.note;
        }
    },
    actions: {
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id) {
                    axios.post('/api/proposition/' + id + '/categorization', state)
                        .then((res) => {
                            resolve()
                        })
                        .catch(() => {
                            reject()
                        });
                }
                else {
                    reject();
                }
            });
        },
        initClear({commit}) {
            return new Promise((resolve, reject) => {
                commit('initData', initialState);
                resolve();
            })
        }
    }
}
