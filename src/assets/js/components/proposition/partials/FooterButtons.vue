<template>
    <div>
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button class="btn btn-lg btn-save" v-on:click="saveProposition">{{ lang('Save') }}</button>
        <button class="btn btn-lg btn-assign btn-assign-icon" v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
    </div>
        <div class="modal fade" id="centralModalAssign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header flex-column px-3 pt-3">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                        <div class="d-flex">
                            <i class="fa fa-user-circle-o fa-4x mb-1 animated rotateInDownLeft"></i>
                            <h1 class="modal-title w-100 text-center">{{ lang('Assign to...') }}</h1>
                        </div>
                        <h6 class="w-100 text-center">{{ lang('Assign department or directly an employee') }}</h6>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="page-name-xl mb-1">{{ lang('Department') }}</div>
                                <div class="md-form d-flex addon">
                                    <input type="text" class="form-control" name="department"  v-model="department" v-on:keyup="autocomplete($event, 'department')">
                                    <ul class="mdb-autocomplete-wrap" v-if="d_suggestions.length">
                                        <li v-for="(item, index) in d_suggestions" v-on:click="autocomplete_select(index, 'department')">{{ item.name }}</li>
                                    </ul>
                                    <span class="d-flex">
                                    <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add') }}</button>
                                </span>
                                </div>
                                <div class="chip mb-1" v-for="department in departments">
                                    {{ department.name }}<i class="close fa fa-times"></i>
                                </div>
                                <div class="page-name-xl mb-1">{{ lang('Employee') }}</div>
                                <div class="md-form d-flex addon">
                                    <input type="text" class="form-control" name="employee" v-model="employee" v-on:keyup="autocomplete($event, 'employee')">
                                    <ul class="mdb-autocomplete-wrap" v-if="e_suggestions.length">
                                        <li v-for="(item, index) in e_suggestions" v-on:click="autocomplete_select(index, 'employee')">{{ item.name }}</li>
                                    </ul>
                                    <span class="d-flex">
                                    <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add') }}</button>
                                </span>
                                </div>
                                <div class="chip mb-1" v-for="employee in employees">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg">{{ employee.name }}<i class="close fa fa-times"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer btn-footer">
                        <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                        <button type="button" class="btn btn-lg btn-save">{{ lang('Assign') }}</button>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                employee: '',
                e_suggestions: [],
                department: '',
                d_suggestions: [],
                cancel: false
            }
        },
        computed: {
            departments: {
                get() { return this.$store.state.proposition.proposition.assigned.departments; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'departments', group: 'assigned', value: value}) }
            },
            employees: {
                get() { return this.$store.state.proposition.proposition.assigned.employees; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'employees', group: 'assigned', value: value}) }
            }
        },
        methods: {
            saveProposition: function() {
                this.$store.dispatch('proposition/saveProposition');
            },
            assignModalOpen: function() {
                jQuery('#centralModalAssign').modal('show');
            },
            autocomplete: function(event, type) {
                if (this.cancel) {
                    this.cancel();
                    this.cancel = false;
                }
                let CancelToken = axios.CancelToken;
                if (this[type].length > 2) {
                    axios.get('/api/human_resources/'+type+'/search/' + this[type], {
                        cancelToken: new CancelToken((c) => {
                            this.cancel = c;
                        })
                    })
                        .then((response) => {
                            if (type === 'department') {
                                this.d_suggestions = response.data;
                            }
                            else {
                                this.e_suggestions = response.data;
                            }
                        })
                        .catch((error) => {});
                }
            },
            autocomplete_select: function(index, type) {
                if (type === 'department') {
                    this.departments.push(this.d_suggestions[index]);
                    this.d_suggestions = [];
                    this.department = '';
                }
                else {
                    this.employees.push(this.e_suggestions[index]);
                    this.e_suggestions = [];
                    this.employee = '';
                }

            }
        }
    }
</script>