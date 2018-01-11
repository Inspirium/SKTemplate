import axios from 'axios';
import Vue from 'vue';

let initialState = {
        proposition_id: 0,
        project_number: '',
        project_name: '',
        additional_project_number: '',
        note: '',
        status: ''
    };
export default {
    namespaced: true,
    state: Vue.util.extend({}, initialState),
    mutations: {
        initData(state, payload) {
            state.project_number = payload.project_number;
            state.additional_project_number = payload.additional_project_number;
            state.project_name = payload.project_name;
            state.note = payload.note;
            state.status = payload.status;
        }
    },
    actions: {
        getData({commit, dispatch, state}, payload) {
            if (payload.id && payload.id !== state.proposition_id) {
                //retrieve data only we don't have it or we need to refresh it
                axios.get('/api/proposition/' + payload.id + '/start')
                    .then((res) => {
                        commit('initData', res.data);
                        commit('proposition/initData', res.data, {root: true});
                    })
                    .catch((err) => {
                        if(err.response.status === 403) {
                            window.location.href='/propositions'
                        }
                    });
            }
            else {
                dispatch('proposition/clearProposition', {}, {root: true});
            }
        },
        saveData({state, commit}, id) {
            return new Promise((resolve, reject) => {
                if (id || state.proposition_id) {
                    let key = id?id:state.proposition_id;
                    axios.post('/api/proposition/' + key + '/start', state)
                        .then((res) => {
                            resolve();
                        });
                }
                else {
                    axios.post('/api/proposition/start', state)
                        .then((res) => {
                            if (res.data.proposition_id) {
                                commit('proposition/initData', res.data, {root: true});
                                resolve();
                            }
                            else {
                                reject();
                            }
                        })
                        .catch(() => { reject(); });
                }
            });
        }
    }
}
