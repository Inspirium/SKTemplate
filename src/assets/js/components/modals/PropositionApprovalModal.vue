<template>
    <div class="modal fade" id="propositionApprovalModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                    <div class="d-flex mx-auto">
                        <i class="fa fa-magic fa-4x mb-1 animated rotateInDownLeft"></i>
                        <h1 class="modal-title w-100 text-center">{{ lang('Approval') }}</h1>
                    </div>
                    <h6 class="w-100 text-center mb-2">{{ lang('Assign employee') }}</h6>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form d-flex addon">
                                <input type="text" class="form-control" name="employee" v-bind:placeholder="lang('Find employee')" v-model="employee" v-on:keyup="autocomplete($event, 'employee')">
                                <ul class="mdb-autocomplete-wrap" v-if="e_suggestions.length">
                                    <li v-for="(item, index) in e_suggestions" v-on:click="autocomplete_select(index, 'employee')">{{ item.name }}</li>
                                </ul>
                            </div>
                            <div class="chip mb-5" v-for="employee in employees">
                                <img v-bind:src="employee.image">{{ employee.name }}<i class="close fa fa-times"></i>
                            </div>
                            <!-- Textarea -->
                            <div class="md-form mt-5 mb-2">
                                <textarea id="form76" class="md-textarea" v-model="description"></textarea>
                                <label for="form76">{{ lang('Task Description') }}</label>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <spinner-button v-on:button_clicked="assignValues" v-on:button_cleanup_success="hideModal" :enabled="enabledAssign"></spinner-button>
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "proposition-approval-modal",
        data() {
            return {
                employee: '',
                e_suggestions: [],
                department: '',
                d_suggestions: [],
                employees: [],
                description: '',

                departments: [],
                cancel: false
            }
        },
        computed: {
            enabledAssign() {
                return !!this.employees.length
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
                    this.employees.splice(0,1,this.e_suggestions[index]);
                    this.e_suggestions = [];
                    this.employee = '';
            },
            assignValues: function() {
                if (this.employees.length) {
                    axios.post('/api/proposition/' + this.$route.params.id + '/approval', {
                        employees: this.employees,
                        departments: this.departments,
                        description: this.description
                    })
                        .then(() => {
                            this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                            toastr.success(this.lang('Uspješno obavljeno'));
                        })
                        .catch(() => {
                            this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                            toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                        })
                }
            },
            hideModal() {
                $('#propositionApprovalModal').modal('hide');
            }
        }
    }
</script>