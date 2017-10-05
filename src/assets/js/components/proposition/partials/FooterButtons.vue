<template>
    <div>
    <div class="btn-footer mt-4 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-warning">Upozorenje modal</button>
        <button onclick="toastr.error('Došlo je do problema. Pokušajte ponovno');" class="btn btn-lg btn-cancel" v-on:click="saveProposition">{{ lang('Error') }}</button>
        <button onclick="toastr.success('Uspješno obavljeno');" class="btn btn-lg btn-save" v-on:click="saveProposition">{{ lang('Save') }}</button>
        <button class="btn btn-lg btn-assign btn-assign-icon" v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
    </div>
        <!-- Central Modal Medium Assign Tab -->
        <div class="modal fade" id="centralModalAssign" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h6 class="w-100 text-center mb-2">{{ lang('Assign department or directly employee') }}</h6>
                    </div>

                    <!-- Nav tabs -->
                    <div class="tabs-wrapper">
                        <ul class="nav classic-tabs tabs-cyan tab-full" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link waves-light active" data-toggle="tab" href="#panel51" role="tab">{{ lang('Department') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-light" data-toggle="tab" href="#panel52" role="tab">{{ lang('Employee') }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab panels -->
                    <div class="tab-content">

                        <!--Panel 1-->
                        <div class="modal-body tab-pane fade in show active" id="panel51" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <input type="text" class="form-control" name="department" placeholder="Pretraži odjele" v-model="department" v-on:keyup="autocomplete($event, 'department')">
                                        <ul class="mdb-autocomplete-wrap" v-if="d_suggestions.length">
                                            <li v-for="(item, index) in d_suggestions" v-on:click="autocomplete_select(index, 'department')">{{ item.name }}</li>
                                        </ul>
                                    </div>
                                    <div class="chip mb-1" v-for="department in departments">
                                        {{ department.name }}<i class="close fa fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Panel 1-->

                        <!--Panel 2-->
                        <div class="modal-body tab-pane fade" id="panel52" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form d-flex addon">
                                        <input type="text" class="form-control" name="employee" placeholder="Pretraži osobe" v-model="employee" v-on:keyup="autocomplete($event, 'employee')">
                                        <ul class="mdb-autocomplete-wrap" v-if="e_suggestions.length">
                                            <li v-for="(item, index) in e_suggestions" v-on:click="autocomplete_select(index, 'employee')">{{ item.name }}</li>
                                        </ul>
                                    </div>
                                    <div class="chip mb-1" v-for="employee in employees">
                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg">{{ employee.name }}<i class="close fa fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Panel 2-->
                    </div>

                    <!--Footer-->
                    <div class="modal-footer btn-footer">
                        <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                        <button type="button" class="btn btn-lg btn-save" data-dismiss="modal" v-on:click="assignValues">{{ lang('Assign') }}</button>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Central Modal Medium Assign tab-->
        
        <!-- Success Modal -->
        <div class="modal fade" id="modal-warning" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h1 class="modal-title w-100 text-center">{{ lang('Warning') }}</h1>
                    </div>
                    <h4 class="w-100 text-center mt-5">{{ lang('Are you sure you want to proceed?') }}</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center mb-1">
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-save" v-on:click="closeModal">{{ lang('Yes') }}</button>
                    <button type="button" class="btn btn-lg btn-cancel" v-on:click="closeModal">{{ lang('No') }}</button>
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
                employees: [],
                departments: [],
                cancel: false
            }
        },
        computed: {
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
            assignValues: function() {
                axios.post('/api/proposition/assign/'+this.$route.params.id, {employees: this.employees, departments: this.departments})
                    .then((res) => {
                    })
                    .catch((err) => {
                    })
            }
        },
        mounted: function() {
        }
    }
</script>