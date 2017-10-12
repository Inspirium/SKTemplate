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
                <td>{{ author_expenses[author.id] | flexCurrency(' kn', 2) }}</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
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
                <td>{{ production_expense.text_price * production_expense.text_price_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('text_price')">
                    <td><input type="text" class="form-control" v-model="expenses.text_price" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('text_price')">{{ expenses.text_price | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.text_price * production_expense.text_price_amount - expenses.text_price | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Reviews</td>
                <td>{{ production_expense.reviews | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('reviews')">
                    <td><input type="text" class="form-control" v-model="expenses.reviews" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('reviews')">{{ expenses.reviews | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.reviews - expenses.reviews | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lecture</td>
                <td>{{ production_expense.lecture * production_expense.lecture_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('lecture')">
                    <td><input type="text" class="form-control" v-model="expenses.lecture" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('lecture')">{{ expenses.lecture | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.lecture * production_expense.lecture_amount - expenses.lecture | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Correction</td>
                <td>{{ production_expense.correction * production_expense.correction_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('correction')">
                    <td><input type="text" class="form-control" v-model="expenses.correction" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('correction')">{{ expenses.correction | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.correction * production_expense.correction_amount - expenses.correction | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Proofreading</td>
                <td>{{ production_expense.proofreading * production_expense.proofreading_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('proofreading')">
                    <td><input type="text" class="form-control" v-model="expenses.proofreading" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('proofreading')">{{ expenses.proofreading | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.proofreading * production_expense.proofreading_amount - expenses.proofreading | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Translation</td>
                <td>{{ production_expense.translation * production_expense.translation_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('translation')">
                    <td><input type="text" class="form-control" v-model="expenses.translation" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('translation')">{{ expenses.translation | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.translation * production_expense.translation_amount - expenses.translation | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Index</td>
                <td>{{ production_expense.index * production_expense.index_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('index')">
                    <td><input type="text" class="form-control" v-model="expenses.index" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('index')">{{ expenses.index | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.index * production_expense.index_amount - expenses.index | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Epilogue</td>
                <td>{{ production_expense.epilogue | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('epilogue')">
                    <td><input type="text" class="form-control" v-model="expenses.epilogue" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('epilogue')">{{ expenses.epilogue | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.epilogue - expenses.epilogue | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Photos</td>
                <td>{{ production_expense.photos * production_expense.photos_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('photos')">
                    <td><input type="text" class="form-control" v-model="expenses.photos" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('photos')">{{ expenses.photos | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.photos * production_expense.photos_amount - expenses.photos | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>illustrations</td>
                <td>{{ production_expense.illustrations * production_expense.illustrations_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('illustrations')">
                    <td><input type="text" class="form-control" v-model="expenses.illustrations" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('illustrations')">{{ expenses.illustrations | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.illustrations * production_expense.illustrations_amount - expenses.illustrations | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Tehnical drawings</td>
                <td>{{ production_expense.technical_drawings * production_expense.technical_drawings_amount | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('technical_drawings')">
                    <td><input type="text" class="form-control" v-model="expenses.technical_drawings" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('technical_drawings')">{{ expenses.technical_drawings | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.technical_drawings * production_expense.technical_drawings_amount - expenses.technical_drawings | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Expert report</td>
                <td>{{ production_expense.expert_report | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('expert_report')">
                    <td><input type="text" class="form-control" v-model="expenses.expert_report" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('expert_report')">{{ expenses.expert_report | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.expert_report - expenses.expert_report | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright</td>
                <td>{{ production_expense.copyright | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('copyright')">
                    <td><input type="text" class="form-control" v-model="expenses.copyright" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('copyright')">{{ expenses.copyright | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.copyright - expenses.copyright | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright mediator</td>
                <td>{{ production_expense.copyright_mediator | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('copyright_mediator')">
                    <td><input type="text" class="form-control" v-model="expenses.copyright_mediator" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('copyright_mediator')">{{ expenses.copyright_mediator | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.copyright_mediator - expenses.copyright_mediator | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>METHODICAL INSTRUMENTARIUM</td>
                <td>{{ production_expense.methodical_instrumentarium | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('methodical_instrumentarium')">
                    <td><input type="text" class="form-control" v-model="expenses.methodical_instrumentarium" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('methodical_instrumentarium')">{{ expenses.methodical_instrumentarium | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.methodical_instrumentarium - expenses.methodical_instrumentarium | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Selection</td>
                <td>{{ production_expense.selection | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('selection')">
                    <td><input type="text" class="form-control" v-model="expenses.selection" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('selection')">{{ expenses.selection | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.selection - expenses.selection | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Powerpoint presentation</td>
                <td>{{ production_expense.powerpoint_presentation | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('powerpoint_presentation')">
                    <td><input type="text" class="form-control" v-model="expenses.powerpoint_presentation" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                <td v-on:click="editField('powerpoint_presentation')">{{ expenses.powerpoint_presentation | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ production_expense.powerpoint_presentation - expenses.powerpoint_presentation | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Additional expenses</td>
                <td>{{ additional_expense | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('additional_expense')">
                    <td><input type="text" class="form-control" v-model="expenses.additional_expense" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('additional_expense')">{{ expenses.additional_expense | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ additional_expense - expenses.additional_expense | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
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
                <td>{{ marketing_expense | flexCurrency(' kn', 2) }}</td>
                <template v-if="currentEdit('marketing_expense')">
                    <td><input type="text" class="form-control" v-model="expenses.marketing_expense" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('marketing_expense')">{{ expenses.marketing_expense | flexCurrency(' kn', 2) }}</td>
                </template>
                <td>{{ marketing_expense - expenses.marketing_expense | flexCurrency(' kn', 2) }}</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
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
    import FooterButtons from './partials/FooterButtons.vue';
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
            authors() {
                return this.$deepModel('proposition.proposition.basic_data.authors');
            },
            additional_expense() {
                return _.sumBy(this.production_expense.additional_expense, (o) => {return Number(o.amount)});
            },
            total_budget() {
                return this.total_authors + this.production_expense
            },
            total_expenses() {
                return Object.values(this.expenses).reduce((a, b) => a + b);
            },
            total_difference() {
                return this.total_budget - this.total_expenses;
            },
            total_percent_difference() {
                return Math.round( this.total_difference / this.total_budget * 100 );
            },
            ...mapState('proposition/compare', [
                'production_expense', 'marketing_expense'
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
                axios.get('/api/proposition/' + this.$route.params.id + '/compare')
                    .then((res) => {})
            }
        }
    }
</script>