<template>
    <div class="modal fade" id="modal-reassign" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="d-flex">
                        <i class="fa fa-exclamation-triangle fa-4x animated flash"></i>
                        <h1 class="modal-title w-100 text-center">{{ lang('Reassign') }}</h1>
                    </div>
                    <h4 class="w-100 text-center mt-5">{{ lang('Are you sure you want to proceed?') }}</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center mb-1">
                        <div class="row">
                            <div class="col">
                                <div class="md-form d-flex addon">
                                    <input type="text" class="form-control" name="employee" placeholder="Pronađi osobu" v-model="employee" v-on:keyup="autocomplete($event, 'employee')">
                                    <ul class="mdb-autocomplete-wrap" v-if="e_suggestions.length">
                                        <li v-for="(item, index) in e_suggestions" v-on:click="autocomplete_select(index, 'employee')">{{ item.name }}</li>
                                    </ul>
                                </div>
                                <div class="chip mb-5" v-for="employee in employees">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg">{{ employee.name }}<i class="close fa fa-times"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                    <button type="button" class="btn btn-lg btn-save" v-on:click="confirm" data-dismiss="modal">{{ lang('Reassign') }}</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "task-reassign",
        data() {
            return {
                employee: '',
                employees: [],
                e_suggestions: []
            }
        },
        methods: {
            confirm() {
                this.$emit('reassign', this.employees);
                this.employees = [];
                this.employee = '';
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
                    //this.$store.commit('proposition/pushToArray', {key: 'departments', group: 'assigned', value: this.d_suggestions[index]});
                    this.departments.push(this.d_suggestions[index]);
                    this.d_suggestions = [];
                    this.department = '';
                }
                else {
                    //this.$store.commit('proposition/pushToArray', {key: 'employees', group: 'assigned', value: this.e_suggestions[index]});
                    this.employees.push(this.e_suggestions[index]);
                    this.e_suggestions = [];
                    this.employee = '';
                }

            },
        }
    }
</script>