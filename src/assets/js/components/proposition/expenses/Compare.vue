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
                <h3 class="mb-1 text-white">{{ Math.abs(total_difference) | flexCurrency(' kn', 2) }}</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Difference in precentage') }}</h6>
                <h3 class="mb-1 text-white">{{ Math.abs(total_percent_difference) }}%</h3>
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
                        <div class="file-box-sty icon icon-cost-rejected" v-on:click="sendForApproval('author_expense.'+i)">{{ lang('Cost Rejected') }}
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
                        <div class="file-box-sty icon icon-cost-rejected" v-on:click="sendForApproval('production_expense.'+row['designation'])">{{ lang('Cost Rejected') }}
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
                        <div class="file-box-sty icon icon-cost-rejected" v-on:click="sendForApproval('layout_expense')">{{ lang('Cost Rejected') }}
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
                        <div class="file-box-sty icon icon-cost-rejected" v-on:click="sendForApproval('marketing_expense')">{{ lang('Cost Rejected') }}
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
        <expense-approval-modal :line="line" :expense="expense"></expense-approval-modal>
        <!-- Central Modal Medium Assign tab-->

    </div>

</template>
<script>
    import _ from 'lodash'
    import { mapState } from 'vuex'
    import ExpenseApprovalModal from '../../modals/ExpenseApprovalModal'

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
                    { designation: 'technical_drawings', title: 'Tehnical Drawings'},
                    { designation: 'expert_report', title : 'Expert Report'},
                    { designation: 'copyright', title: 'Copyright'},
                    { designation: 'copyright_mediator', title: 'Copyright Mediator'},
                    { designation: 'methodical_instrumentarium', title: 'Methodical Instrumentarium'},
                    { designation: 'selection', title: 'Selection'},
                    { designation: 'powerpoint_presentation', title: 'Powerpoint Presentation'},
                    { designation: 'additional_expenses', title: 'Additional Expenses'}
                    ],
                employee: '',
                e_suggestions: [],
                employees: [],
                description: '',
                cancel: false,
                line: {
                    title: '',
                    budget: '',
                    expense: '',
                },
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
                    technical_drawings : 'Tehnical Drawings',
                    expert_report : 'Expert Report',
                    copyright : 'Copyright',
                    copyright_mediator : 'Copyright Mediator',
                    methodical_instrumentarium : 'Methodical Instrumentarium',
                    selection : 'Selection',
                    powerpoint_presentation : 'Powerpoint Presentation',
                    additional_expenses : 'Additional Expenses'
                },
                expense: ''
            }
        },
        components: {
            ExpenseApprovalModal
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
                    this.line.title = 'Marketing budget';
                    this.line.budget = this.marketing_expense.budget.totals;
                    this.line.expense = this.marketing_expense.expense.totals;
                }
                if (what === 'layout_expense') {
                    this.line.title = 'Layout and Design budget';
                    this.line.budget = this.production_expense.budget.totals.layout;
                    this.line.expense = this.production_expense.expense.totals.layout;
                }
                if (what.includes('production_expense.')) {
                    let vars = what.split('.');
                    this.line.title = this.titles[vars[1]];
                    this.line.budget = this.production_expense.budget.totals[vars[1]];
                    this.line.expense = this.production_expense.expense.totals[vars[1]];
                }
                if (what.includes('author_expense.')) {
                    let vars = what.split('.');
                    this.line.title = this.authors[vars[1]].name;
                    this.line.budget = this.authors[vars[1]].expenses[0].totals;
                    this.line.expense = this.authors[vars[1]].expenses[1].totals;
                }
                this.expense = what;
                $('#ModalCostApprove').modal('show');
            },
        }
    }
</script>