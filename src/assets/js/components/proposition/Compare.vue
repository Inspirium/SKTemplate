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
                <h3 class="mb-1 text-white">123.450 kn</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Expenses') }}</h6>
                <h3 class="mb-1 text-white">155.446 kn</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Difference') }}</h6>
                <h3 class="mb-1 text-white">22.985 kn</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Difference in precentage') }}</h6>
                <h3 class="mb-1 text-white">18%</h3>
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
                <td>{{ author_expenses.expenses[author.id].amount }} kn</td>
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
                <td>{{ production_expense.text_price * production_expense.text_price_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Reviews</td>
                <td>{{ production_expense.reviews * production_expense.reviews_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lecture</td>
                <td>{{ production_expense.lecture * production_expense.lecture_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Correction</td>
                <td>{{ production_expense.correction * production_expense.correction_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Proofreading</td>
                <td>{{ production_expense.proofreading * production_expense.proofreading_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Translation</td>
                <td>{{ production_expense.translation * production_expense.translation_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Index</td>
                <td>{{ production_expense.index * production_expense.index_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Epilogue</td>
                <td>{{ production_expense.epilogue }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Photos</td>
                <td>{{ production_expense.photos * production_expense.photos_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>illustrations</td>
                <td>{{ production_expense.illustrations * production_expense.illustrations_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Tehnical drawings</td>
                <td>{{ production_expense.technical_drawings * production_expense.technical_drawings_amount }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Expert report</td>
                <td>{{ production_expense.expert_report }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright</td>
                <td>{{ production_expense.copyright }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright mediator</td>
                <td>{{ production_expense.copyright_mediator }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>METHODICAL INSTRUMENTARIUM</td>
                <td>{{ production_expense.methodical_instrumentarium }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Selection</td>
                <td>{{ production_expense.selection }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Powerpoint presentation</td>
                <td>{{ production_expense.powerpoint_presentation }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Additional expenses ?!?!?!</td>
                <td>{{ _.sumBy(production_expense.additional_expense, (o) => {return Number(o.amount)}) }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
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
                <td>{{ Number(marketing_expenses.expense) +  _.sumBy(marketing_expenses.additional_expense, function(o) { return Number(o.amount) }) }} kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            </tbody>
        </table>

    </div>

</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {
            authors() {
                return this.$deepModel('proposition.proposition.basic_data.authors');
            },
            author_expenses() {
                this.$deepModel('proposition.proposition.authors_expense');
            },
            production_expense() {
                return this.$deepModel('proposition.proposition.production_expense');
            },
            marketing_expenses() {
                return this.$deepModel('proposition.proposition.marketing_expense');
            },
        },
        methods: {}
    }
</script>