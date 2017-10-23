<template>
    <div class="content">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ lang('Budget vs. Expenses') }}</h1>
            </div>
        </div>

        <!-- Display fileds -->
        <div class="profile-head pb-2 row">
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Budget') }}</h6>
                <h3 class="mb-1 text-white">{{ total_budget | flexCurrency(' kn', 2) }}</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Expenses') }}</h6>
                <h3 class="mb-1 text-white">{{ total_expenses | flexCurrency(' kn', 2) }}</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Difference') }}</h6>
                <h3 class="mb-1 text-white">{{ total_difference | flexCurrency(' kn', 2) }}</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Difference in precentage') }}</h6>
                <h3 class="mb-1 text-white">{{ total_percent_difference }}%</h3>
           </div>
        </div>

        <!-- Table -->
        <div class="page-name-xl mb-3 mt-3">{{ lang('Authors Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th class="text-right">{{ lang('Budget') }}</th>
                <th class="text-right">{{ lang('Expense Total') }}</th>
                <th class="text-right">{{ lang('Difference') }}</th>
                <th class="text-right">{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr v-for="(author, i) in authors">
                <th scope="row">1</th>
                <td v-bind:data-title="lang('Title')">{{ author.name }}</td>
                <td class="text-right" v-bind:data-title="lang('Budget')">{{ author.expenses[0].totals | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Expense Total')">{{ author.expenses[1].totals | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Difference')">{{ Math.abs(diff = author.expenses[0].totals - author.expenses[1].totals) | flexCurrency(' kn', 2) }}</td>
                <template v-if="requests['author_expense.'+i] && requests['author_expense.'+i][0] && requests['author_expense.'+i][0].status === 'requested'">
                    <td class="text-right" v-bind:data-title="lang('Cost pending')">
                        <div class="file-box-sty icon icon-cost-pending">{{ lang('Cost Approval Pending') }}

                        </div>
                    </td>
                </template>
                <template v-else-if="requests['author_expense.'+i] && requests['author_expense.'+i][0] && requests['author_expense.'+i][0].status === 'denied'">
                    <td class="text-right" v-bind:data-title="lang('Cost Rejected')">
                        <div class="file-box-sty icon icon-cost-rejected">{{ lang('Cost Rejected') }}
                        </div>
                    </td>
                </template>
                <template v-else-if="requests['author_expense.'+i] && requests['author_expense.'+i][0] && requests['author_expense.'+i][0].status === 'accepted'">
                    <td class="text-right" v-bind:data-title="lang('Cost Approved')">
                        <div class="file-box-sty icon icon-cost-approved">{{ lang('Cost Approved') }}
                        </div>
                    </td>
                </template>
                <template v-else>
                    <td class="text-right" v-bind:data-title="lang('Send for Approval')"><div class="file-box-sty icon icon-cost-approval" v-on:click="sendForApproval('author_expense.'+i)" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
                </template>
            </tr>
            </tbody>
        </table>

        <div class="page-name-xl mb-3 mt-3">{{ lang('Production Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th class="text-right">{{ lang('Budget') }}</th>
                <th class="text-right">{{ lang('Expense Total') }}</th>
                <th class="text-right">{{ lang('Difference') }}</th>
                <th class="text-right">{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr v-for="(row, i) in production_expenses">
                <th scope="row">{{ i+1 }}</th>
                <td v-bind:data-title="lang('Title')">{{lang(row['title'])}}</td>
                <td class="text-right" v-bind:data-title="lang('Budget')">{{ production_expense.budget.totals[row['designation']] | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Expense Total')">{{ production_expense.expense.totals[row['designation']] | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Difference')">{{ Math.abs(diff = production_expense.budget.totals[row['designation']] - production_expense.expense.totals[row['designation']]) | flexCurrency(' kn', 2) }}</td>
                <template v-if="requests['production_expense.'+row['designation']] && requests['production_expense.'+row['designation']][0] && requests['production_expense.'+row['designation']][0].status === 'requested'">
                    <td class="text-right" v-bind:data-title="lang('Cost pending')">
                        <div class="file-box-sty icon icon-cost-pending">{{ lang('Cost Approval Pending') }}

                        </div>
                    </td>
                </template>
                <template v-else-if="requests['production_expense.'+row['designation']] && requests['production_expense.'+row['designation']][0] && requests['production_expense.'+row['designation']][0].status === 'denied'">
                    <td class="text-right" v-bind:data-title="lang('Cost Rejected')">
                        <div class="file-box-sty icon icon-cost-rejected">{{ lang('Cost Rejected') }}
                        </div>
                    </td>
                </template>
                <template v-else-if="requests['production_expense.'+row['designation']] && requests['production_expense.'+row['designation']][0] && requests['production_expense.'+row['designation']][0].status === 'accepted'">
                    <td class="text-right" v-bind:data-title="lang('Cost Approved')">
                        <div class="file-box-sty icon icon-cost-approved">{{ lang('Cost Approved') }}
                        </div>
                    </td>
                </template>
                <template v-else>
                    <td class="text-right" v-bind:data-title="lang('Send for Approval')"><div class="file-box-sty icon icon-cost-approval" v-on:click="sendForApproval('production_expense.'+row['designation'])" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
                </template>
            </tr>
            </tbody>
        </table>

        <div class="page-name-xl mb-3 mt-3">{{ lang('Layout and Design Expense') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th class="text-right">{{ lang('Budget') }}</th>
                <th class="text-right">{{ lang('Expense Total') }}</th>
                <th class="text-right">{{ lang('Difference') }}</th>
                <th class="text-right">{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr>
                <th scope="row">1</th>
                <td v-bind:data-title="lang('Title')">{{ lang('Layout and Design budget') }}</td>
                <td class="text-right" v-bind:data-title="lang('Budget')">{{ production_expense.budget.totals.layout | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Expense Total')">{{ production_expense.expense.totals.layout | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Difference')">{{ Math.abs(diff = production_expense.budget.totals.layout - production_expense.expense.totals.layout) | flexCurrency(' kn', 2) }}</td>
                <template v-if="requests['layout_expense'] && requests['layout_expense'][0] && requests['layout_expense'][0].status === 'requested'">
                    <td class="text-right" v-bind:data-title="lang('Cost pending')">
                        <div class="file-box-sty icon icon-cost-pending">{{ lang('Cost Approval Pending') }}

                        </div>
                    </td>
                </template>
                <template v-else-if="requests['layout_expense'] && requests['layout_expense'][0] && requests['layout_expense'][0].status === 'denied'">
                    <td class="text-right" v-bind:data-title="lang('Cost Rejected')">
                        <div class="file-box-sty icon icon-cost-rejected">{{ lang('Cost Rejected') }}
                        </div>
                    </td>
                </template>
                <template v-else-if="requests['layout_expense'] && requests['layout_expense'][0] && requests['layout_expense'][0].status === 'accepted'">
                    <td class="text-right" v-bind:data-title="lang('Cost Approved')">
                        <div class="file-box-sty icon icon-cost-approved">{{ lang('Cost Approved') }}
                        </div>
                    </td>
                </template>
                <template v-else>
                    <td class="text-right" v-bind:data-title="lang('Send for Approval')"><div class="file-box-sty icon icon-cost-approval" v-on:click="sendForApproval('layout_expense')" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
                </template>
            </tr>
            </tbody>
        </table>

        <div class="page-name-xl mb-3 mt-3">{{ lang('Marketing Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th class="text-right">{{ lang('Budget') }}</th>
                <th class="text-right">{{ lang('Expense Total') }}</th>
                <th class="text-right">{{ lang('Difference') }}</th>
                <th class="text-right">{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr>
                <th scope="row">1</th>
                <td v-bind:data-title="lang('Title')">Marketing budget</td>
                <td class="text-right" v-bind:data-title="lang('Budget')">{{ marketing_expense.budget?marketing_expense.budget.totals:0 | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Expense Total')">{{ marketing_expense.expense?marketing_expense.expense.totals:0 | flexCurrency(' kn', 2) }}</td>
                <td class="text-right" v-bind:data-title="lang('Difference')">{{ Math.abs(diff = marketing_expense.budget.totals - marketing_expense.expense.totals) | flexCurrency(' kn', 2) }}</td>
                <template v-if="requests['marketing_expense'] && requests['marketing_expense'][0] && requests['marketing_expense'][0].status === 'requested'">
                    <td class="text-right" v-bind:data-title="lang('Cost pending')">
                        <div class="file-box-sty icon icon-cost-pending">{{ lang('Cost Approval Pending') }}

                        </div>
                    </td>
                </template>
                <template v-else-if="requests['marketing_expense'] && requests['marketing_expense'][0] && requests['marketing_expense'][0].status === 'denied'">
                    <td class="text-right" v-bind:data-title="lang('Cost Denied')">
                        <div class="file-box-sty icon icon-cost-rejected">{{ lang('Cost Rejected') }}
                        </div>
                    </td>
                </template>
                <template v-else-if="requests['marketing_expense'] && requests['marketing_expense'][0] && requests['marketing_expense'][0].status === 'accepted'">
                    <td class="text-right" v-bind:data-title="lang('Cost Approved')">
                        <div class="file-box-sty icon icon-cost-approved">{{ lang('Cost Approved') }}
                        </div>
                    </td>
                </template>
                <template v-else>
                    <td class="text-right" v-bind:data-title="lang('Send for Approval')"><div class="file-box-sty icon icon-cost-approval" v-on:click="sendForApproval('marketing_expense')" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
                </template>
            </tr>
            </tbody>
        </table>

        <!-- Central Modal Medium Assign Tab -->
        <div class="modal fade" id="ModalCostApprove" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header flex-column px-3 pt-3">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                        <div class="d-flex">
                            <i class="fa fa-magic fa-4x mb-1 animated rotateInDownLeft"></i>
                            <h1 class="modal-title w-100 text-center">{{ lang('Cost Approve') }}</h1>
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
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg">{{ employee.name }}<i class="close fa fa-times"></i>
                                </div>
                                <!-- Expense difference -->
                                <div class="page-name-m">{{ lang('Expense') }}</div>
                                <table class="table">
                                    <thead class="thead-inverse">
                                    <tr>
                                        <th>{{ lang('Item') }}</th>
                                        <th class="text-right">{{ lang('Budget') }}</th>
                                        <th class="text-right">{{ lang('Expense Total') }}</th>
                                        <th class="text-right">{{ lang('Difference') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="white">
                                    <tr>
                                        <td v-bind:data-title="lang('Title')">{{ lang(line_title) }}</td>
                                        <td class="text-right" v-bind:data-title="lang('Budget')">{{ line_budget | flexCurrency(' kn', 2) }}</td>
                                        <td class="text-right" v-bind:data-title="lang('Expense Total')">{{ line_expense | flexCurrency(' kn', 2) }}</td>
                                        <td class="text-right" v-bind:data-title="lang('Difference')">{{ Math.abs(line_budget-line_expense) | flexCurrency(' kn', 2) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--/. Expense difference -->
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
                        <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                        <button type="button" class="btn btn-lg btn-save" v-on:click="assignValues">{{ lang('Assign') }}</button>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Central Modal Medium Assign tab-->

    </div>

</template>
<script>
    import _ from 'lodash'
    import FooterButtons from '../partials/FooterButtons.vue';
    import { mapState } from 'vuex'

    export default {
        data: function () {
            return {
                production_expenses: [
                    { designation: 'text_price', title: 'Text'},
                    { designation: 'reviews', title: 'Reviews'},
                    { designation: 'lecture', title: 'Lecture'},
                    { designation: 'correction', title: 'Correction'},
                    { designation: 'proofreading', title: 'Proofreading'},
                    { designation: 'translation', title: 'Translation'},
                    { designation: 'index', title: 'Index'},
                    { designation: 'epilogue', title: 'Epilogue'},
                    { designation: 'photos', title: 'Photos'},
                    { designation: 'illustrations', title: 'Illustrations'},
                    { designation: 'technical_drawings', title: 'Tehnical drawings'},
                    { designation: 'expert_report', title : 'Expert report'},
                    { designation: 'copyright', title: 'Copyright'},
                    { designation: 'copyright_mediator', title: 'Copyright mediator'},
                    { designation: 'methodical_instrumentarium', title: 'Methodical Instrumentarium'},
                    { designation: 'selection', title: 'Selection'},
                    { designation: 'powerpoint_presentation', title: 'Powerpoint presentation'},
                    { designation: 'additional_expenses', title: 'Additional expenses'}
                    ],
                employee: '',
                e_suggestions: [],
                employees: [],
                description: '',
                cancel: false,
                line_title: '',
                line_budget: '',
                line_expense: '',
                titles: {
                    text_price : 'Text',
                    reviews: 'Reviews',
                    lecture: 'Lecture',
                    correction: 'Correction',
                    proofreading: 'Proofreading',
                    translation: 'Translation',
                    index: 'Index',
                    epilogue: 'Epilogue',
                    photos: 'Photos',
                    illustrations: 'Illustrations',
                    technical_drawings : 'Tehnical drawings',
                    expert_report : 'Expert report',
                    copyright : 'Copyright',
                    copyright_mediator : 'Copyright mediator',
                    methodical_instrumentarium : 'Methodical Instrumentarium',
                    selection : 'Selection',
                    powerpoint_presentation : 'Powerpoint presentation',
                    additional_expenses : 'Additional expenses'
                },
                expense: ''
            }
        },
        components: {
            'footer-buttons': FooterButtons
        },
        computed: {
            total_budget() {
                console.log(this.pro);
                return _.sumBy(this.authors, (a) =>{return Number(a.expenses[0].totals)}) + Number(this.production_expense.budget.totals.total) + Number(this.marketing_expense.budget.totals);
            },
            total_expenses() {
                return _.sumBy(this.authors, (a) =>{return Number(a.expenses[1].totals)}) + Number(this.production_expense.expense.totals.total) + Number(this.marketing_expense.expense.totals);
            },
            total_difference() {
                return this.total_budget - this.total_expenses;
            },
            total_percent_difference() {
                return Math.round( this.total_difference / this.total_budget * 100 );
            },
            ...mapState('proposition/compare', [
                'production_expense', 'marketing_expense', 'authors', 'requests'
            ])
        },
        methods: {
            editField: function(field) {
                this.activeEdit = field;
            },
            currentEdit: function(field) {
                return field === this.activeEdit
            },
            closeEdit: function() {
                this.activeEdit = '';
            },
            sendForApproval: function(what) {
                if (what === 'marketing_expense') {
                    this.line_title = 'Marketing budget';
                    this.line_budget = this.marketing_expense.budget.totals;
                    this.line_expense = this.marketing_expense.expense.totals;
                }
                if (what === 'layout_expense') {
                    this.line_title = 'Layout and Design budget';
                    this.line_budget = this.production_expense.budget.totals.layout;
                    this.line_expense = this.production_expense.expense.totals.layout;
                }
                if (what.includes('production_expense.')) {
                    let vars = what.split('.');
                    this.line_title = this.titles[vars[1]];
                    this.line_budget = this.production_expense.budget.totals[vars[1]];
                    this.line_expense = this.production_expense.expense.totals[vars[1]];
                }
                if (what.includes('author_expense.')) {
                    let vars = what.split('.');
                    this.line_title = this.authors[vars[1]].name;
                    this.line_budget = this.authors[vars[1]].expenses[0].totals;
                    this.line_expense = this.authors[vars[1]].expenses[1].totals;
                }
                this.expense = what;
                $('#ModalCostApprove').modal('show');
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
                if (this.employees.length && this.description && this.expense) {
                    axios.post('/api/proposition/' + this.$route.params.id + '/request_approval', {
                        requestees: this.employees,
                        description: this.description,
                        expense: this.line_expense,
                        budget: this.line_budget,
                        name: this.line_title,
                        designation: this.expense
                    })
                        .then(() => {
                            this.employees = [];
                            this.description = '';
                            this.line_expense = '';
                            this.line_budget = '';
                            this.line_title = '';
                            this.expense = '';
                            $('#ModalCostApprove').modal('hide');
                        })
                        .catch((err) => {
                            this.error = 'Error in request. Try again.'
                        })
                }
                else {
                    this.error = 'Missing data';
                }
            }
        },
        mounted() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/compare/getData', {id: this.$route.params.id});
            }
        }
    }
</script>