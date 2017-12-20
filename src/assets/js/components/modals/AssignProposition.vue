<template>
    <div class="modal fade" id="centralModalAssign" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                    <div class="d-flex mx-auto">
                        <i class="fa fa-user-circle-o fa-4x mb-1 animated rotateInDownLeft"></i>
                        <h1 class="modal-title w-100 text-center">{{ lang('Assign to...') }}</h1>
                    </div>
                    <h6 class="w-100 text-center mb-2">{{ lang('Assign employee directly') }}</h6>
                </div>

                <!-- Nav tabs -->
                <div class="tabs-wrapper">
                    <ul class="nav classic-tabs tabs-cyan tab-full" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link waves-light active" data-toggle="tab" href="#panel52" role="tab">{{ lang('Employee') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 2-->
                    <div class="modal-body tab-pane fade in show active" id="panel52" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form d-flex addon">
                                    <input type="text" class="form-control" name="employee" placeholder="Pronađi osobu" v-model="employee" v-on:keyup="autocomplete($event, 'employee')">
                                    <ul class="mdb-autocomplete-wrap" v-if="e_suggestions.length">
                                        <li v-for="(item, index) in e_suggestions" v-on:click="autocomplete_select(index, 'employee')">{{ item.name }}</li>
                                    </ul>
                                </div>
                                <div class="chip mb-5" v-for="employee in employees">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg">{{ employee.name }}<i class="close fa fa-times"></i>
                                </div>
                                <!-- Textarea -->
                                <div class="md-form mt-2 mb-2">
                                    <textarea id="form76" class="md-textarea" v-model="description"></textarea>
                                    <label for="form76">{{ lang('Task Description') }}</label>
                                </div>
                                <!-- Date Picker -->
                                <div class="row mt-4">
                                    <div class="col-md-5">
                                        <div class="md-form">
                                            <input placeholder="Odaberi datum" type="text" id="date-picker2" class="form-control datepicker btn-white" v-model="date">
                                            <label for="date-picker2">{{ lang('Select Date') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <!--/. Checkbox -->
                                <div class="page-name-m">{{ lang('Priority') }}</div>
                                <div class="form-inline mb-3">
                                    <fieldset class="form-group">
                                        <input name="priority1" type="radio" id="radio61" value="high" v-model="priority" >
                                        <label for="radio61">{{ lang('High') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input name="priority1" type="radio" id="radio71" value="medium" v-model="priority">
                                        <label for="radio71">{{ lang('Medium') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input name="priority1" type="radio" id="radio81" value="low" v-model="priority">
                                        <label for="radio81">{{ lang('Low') }}</label>
                                    </fieldset>
                                </div>
                                <!--/. Checkbox -->
                                <!-- Checkbox -->
                                <div class="page-name-m">{{ lang('Access Level') }}</div>
                                <div class="form-inline mb-3">
                                    <fieldset class="form-group">
                                        <input checked name="access1" type="radio" id="radio91" value="allpage" v-model="access">
                                        <label for="radio91">{{ lang('All Proposition Pages') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input name="access1" type="radio" id="radio101" value="onepage" v-model="access">
                                        <label for="radio101">{{ lang('Only This Page') }}</label>
                                    </fieldset>
                                </div>
                                <!--/. Checkbox -->
                            </div>
                        </div>
                    </div>
                    <!--/.Panel 2-->
                </div>

                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-save" data-dismiss="modal" v-on:click="assignValues">{{ lang('Assign') }}
                        <i v-bind:class="['fa', 'fa-5x', 'fa-fw', 'text-white', spinnerType, isSpinnerHidden]"></i></button>
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "assign-proposition",
        data() {
            return {
                employee: '',
                e_suggestions: [],
                department: '',
                d_suggestions: [],
                employees: [],
                description: '',
                date: '',
                access: 0,
                priority: 0,
                departments: [],
                cancel: false,
                spinnerType: 'fa-refresh spinner-delay-rotate spinner-loader',
                isSpinnerHidden: 'hide'
            }
        },
        methods: {
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
            assignValues: function(event) {
                let saveButton = jQuery(event.target);
                saveButton.toggleClass('spinner-loading');
                this.isSpinnerHidden = '';

                axios.post('/api/proposition/'+this.$route.params.id + '/assign', {employees: this.employees, departments: this.departments, description: this.description, date: this.date, access:this.access, priority: this.priority, path: window.location.href})
                    .then(() => {
                        this.spinnerType = 'fa-check spinner-success';
                        setTimeout(() => {
                            this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                            this.isSpinnerHidden  ='hide';
                            saveButton.toggleClass( "spinner-loading" );

                            $('#centralModalAssign').modal('hide');
                        }, 1000);
                        toastr.success(this.lang('Uspješno obavljeno'));
                    })
                    .catch(() => {
                        this.spinnerType = 'fa-times spinner-fail';
                        setTimeout(() => {
                            this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                            this.isSpinnerHidden  ='hide';
                            saveButton.toggleClass( "spinner-loading" );
                        }, 1000);
                        toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                    })
            }
        },
        mounted() {
            $('.datepicker').pickadate({
                format: 'dd. mm. yyyy.',
                onSet: (context) => {
                    let date = new Date(context.select);
                    this.date = this.$options.filters.moment(date, 'DD. MM. YYYY.');
                }
            });
        }
    }
</script>

<style scoped>

</style>