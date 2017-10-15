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
                <th>{{ lang('Budget') }}</th>
                <th>{{ lang('Expense Total') }}</th>
                <th>{{ lang('Difference') }}</th>
                <th>{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr v-for="author in authors">
                <th scope="row">1</th>
                <td>{{ author.name }}</td>
                <td>{{ author.expenses[0].totals | flexCurrency(' kn', 2) }}</td>

                <td>{{ author.expenses[1].totals | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = author.expenses[0].totals - author.expenses[1].totals) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            </tbody>
        </table>

        <div class="page-name-xl mb-3 mt-3">{{ lang('Production Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th>{{ lang('Budget') }}</th>
                <th>{{ lang('Expense Total') }}</th>
                <th>{{ lang('Difference') }}</th>
                <th>{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr>
                <th scope="row">1</th>
                <td>Text</td>
                <td>{{ production_expense.budget.totals.text_price | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.text_price | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.text_price - production_expense.expense.totals.text_price) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Reviews</td>
                <td>{{ production_expense.budget.totals.reviews | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.reviews | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.reviews - production_expense.expense.totals.reviews) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lecture</td>
                <td>{{ production_expense.budget.totals.lecture | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.lecture | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.lecture - production_expense.expense.totals.lecture) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Correction</td>
                <td>{{ production_expense.budget.totals.correction | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.correction | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.correction - production_expense.expense.totals.correction) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Proofreading</td>
                <td>{{ production_expense.budget.totals.proofreading | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.proofreading | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.proofreading - production_expense.expense.totals.proofreading) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Translation</td>
                <td>{{ production_expense.budget.totals.translation | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.translation | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.translation - production_expense.expense.totals.translation) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Index</td>
                <td>{{ production_expense.budget.totals.index | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.index | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.index - production_expense.expense.totals.index) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Epilogue</td>
                <td>{{ production_expense.budget.totals.epilogue | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.epilogue | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.epilogue - production_expense.expense.totals.epilogue) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Photos</td>
                <td>{{ production_expense.budget.totals.photos | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.photos | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.photos - production_expense.expense.totals.photos) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>illustrations</td>
                <td>{{ production_expense.budget.totals.illustrations | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.illustrations | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.illustrations - production_expense.expense.totals.illustrations) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Tehnical drawings</td>
                <td>{{ production_expense.budget.totals.technical_drawings | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.technical_drawings | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.technical_drawings - production_expense.expense.totals.technical_drawings) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Expert report</td>
                <td>{{ production_expense.budget.totals.expert_report | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.expert_report | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.expert_report - production_expense.expense.totals.expert_report) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright</td>
                <td>{{ production_expense.budget.totals.copyright | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.copyright | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.copyright - production_expense.expense.totals.copyright) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright mediator</td>
                <td>{{ production_expense.budget.totals.copyright_mediator | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.copyright_mediator | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.copyright_mediator - production_expense.expense.totals.copyright_mediator) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>METHODICAL INSTRUMENTARIUM</td>
                <td>{{ production_expense.budget.totals.methodical_instrumentarium | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.methodical_instrumentarium | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.methodical_instrumentarium - production_expense.expense.totals.methodical_instrumentarium) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Selection</td>
                <td>{{ production_expense.budget.totals.selection | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.selection | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.selection - production_expense.expense.totals.selection) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Powerpoint presentation</td>
                <td>{{ production_expense.budget.totals.powerpoint_presentation | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.powerpoint_presentation | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.powerpoint_presentation - production_expense.expense.totals.powerpoint_presentation) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Additional expenses</td>
                <td>{{ production_expense.budget.totals.additional_expenses | flexCurrency(' kn', 2) }}</td>
                <td>{{ production_expense.expense.totals.additional_expenses | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = production_expense.budget.totals.additional_expenses - production_expense.expense.totals.additional_expense) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>

            </tbody>
        </table>

        <div class="page-name-xl mb-3 mt-3">{{ lang('Marketing Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th>{{ lang('Budget') }}</th>
                <th>{{ lang('Expense Total') }}</th>
                <th>{{ lang('Difference') }}</th>
                <th>{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr>
                <th scope="row">1</th>
                <td>Marketing budget</td>
                <td>{{ marketing_expense.budget?marketing_expense.budget.totals:0 | flexCurrency(' kn', 2) }}</td>
                <td>{{ marketing_expense.expense?marketing_expense.expense.totals:0 | flexCurrency(' kn', 2) }}</td>
                <td>{{ Math.abs(diff = marketing_expense.budget.totals - marketing_expense.expense.totals) | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval" v-if="diff<0">{{ lang('Send for Approval') }}</div></td>
            </tr>
            </tbody>
        </table>

        <div class="btn-footer mt-4 mb-5 flex-column flex-md-row d-flex p-2">
            <button class="btn btn-lg btn-save" v-on:click="saveExpenses">{{ lang('Save') }}</button>

        </div>

    </div>

</template>
<script>
    import _ from 'lodash'
    import FooterButtons from '../partials/FooterButtons.vue';
    import { mapState } from 'vuex'

    export default {
        data: function () {
            return {
                activeEdit: '',
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
                'production_expense', 'marketing_expense', 'authors'
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
            saveExpenses: function() {
                axios.post('/api/proposition/' + this.$route.params.id + '/compare', {expenses:this.expenses})
                    .then((res) => {

                    });
            },
            sendForApproval: function() {
                axios.post('/api/proposition/' + this.$route.params.id + '/approval')
                    .then((res) => {});
            }
        },
        mounted() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/compare/getData', {id: this.$route.params.id});
            }
        }
    }
</script>