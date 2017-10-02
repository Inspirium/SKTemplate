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
                <td>{{ author_expenses }} kn</td>
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
                <template v-if="currentEdit('text_price')">
                    <td><input type="text" class="form-control" v-model="expenses.text_price" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('text_price')">{{ expenses.text_price }} kn</td>
                </template>
                <td>{{ production_expense.text_price * production_expense.text_price_amount - expenses.text_price }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Reviews</td>
                <td>{{ production_expense.reviews }} kn</td>
                <template v-if="currentEdit('reviews')">
                    <td><input type="text" class="form-control" v-model="expenses.reviews" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('reviews')">{{ expenses.reviews }} kn</td>
                </template>
                <td>{{ production_expense.reviews - expenses.reviews }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lecture</td>
                <td>{{ production_expense.lecture * production_expense.lecture_amount }} kn</td>
                <template v-if="currentEdit('lecture')">
                    <td><input type="text" class="form-control" v-model="expenses.lecture" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('lecture')">{{ expenses.lecture }} kn</td>
                </template>
                <td>{{ production_expense.lecture * production_expense.lecture_amount - expenses.lecture }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Correction</td>
                <td>{{ production_expense.correction * production_expense.correction_amount }} kn</td>
                <template v-if="currentEdit('correction')">
                    <td><input type="text" class="form-control" v-model="expenses.correction" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('correction')">{{ expenses.correction }} kn</td>
                </template>
                <td>{{ production_expense.correction * production_expense.correction_amount - expenses.correction }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Proofreading</td>
                <td>{{ production_expense.proofreading * production_expense.proofreading_amount }} kn</td>
                <template v-if="currentEdit('proofreading')">
                    <td><input type="text" class="form-control" v-model="expenses.proofreading" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('proofreading')">{{ expenses.proofreading }} kn</td>
                </template>
                <td>{{ production_expense.proofreading * production_expense.proofreading_amount - expenses.proofreading }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Translation</td>
                <td>{{ production_expense.translation * production_expense.translation_amount }} kn</td>
                <template v-if="currentEdit('translation')">
                    <td><input type="text" class="form-control" v-model="expenses.translation" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('translation')">{{ expenses.translation }} kn</td>
                </template>
                <td>{{ production_expense.translation * production_expense.translation_amount - expenses.translation }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Index</td>
                <td>{{ production_expense.index * production_expense.index_amount }} kn</td>
                <template v-if="currentEdit('index')">
                    <td><input type="text" class="form-control" v-model="expenses.index" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('index')">{{ expenses.index }} kn</td>
                </template>
                <td>{{ production_expense.index * production_expense.index_amount - expenses.index }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Epilogue</td>
                <td>{{ production_expense.epilogue }} kn</td>
                <template v-if="currentEdit('epilogue')">
                    <td><input type="text" class="form-control" v-model="expenses.epilogue" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('epilogue')">{{ expenses.epilogue }} kn</td>
                </template>
                <td>{{ production_expense.epilogue - expenses.epilogue }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Photos</td>
                <td>{{ production_expense.photos * production_expense.photos_amount }} kn</td>
                <template v-if="currentEdit('photos')">
                    <td><input type="text" class="form-control" v-model="expenses.photos" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('photos')">{{ expenses.photos }} kn</td>
                </template>
                <td>{{ production_expense.photos * production_expense.photos_amount - expenses.photos }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>illustrations</td>
                <td>{{ production_expense.illustrations * production_expense.illustrations_amount }} kn</td>
                <template v-if="currentEdit('illustrations')">
                    <td><input type="text" class="form-control" v-model="expenses.illustrations" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('illustrations')">{{ expenses.illustrations }} kn</td>
                </template>
                <td>{{ production_expense.illustrations * production_expense.illustrations_amount - expenses.illustrations }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Tehnical drawings</td>
                <td>{{ production_expense.technical_drawings * production_expense.technical_drawings_amount }} kn</td>
                <template v-if="currentEdit('technical_drawings')">
                    <td><input type="text" class="form-control" v-model="expenses.technical_drawings" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('technical_drawings')">{{ expenses.technical_drawings }} kn</td>
                </template>
                <td>{{ production_expense.technical_drawings * production_expense.technical_drawings_amount - expenses.technical_drawings }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Expert report</td>
                <td>{{ production_expense.expert_report }} kn</td>
                <template v-if="currentEdit('expert_report')">
                    <td><input type="text" class="form-control" v-model="expenses.expert_report" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('expert_report')">{{ expenses.expert_report }} kn</td>
                </template>
                <td>{{ production_expense.expert_report - expenses.expert_report }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright</td>
                <td>{{ production_expense.copyright }} kn</td>
                <template v-if="currentEdit('copyright')">
                    <td><input type="text" class="form-control" v-model="expenses.copyright" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('copyright')">{{ expenses.copyright }} kn</td>
                </template>
                <td>{{ production_expense.copyright - expenses.copyright }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright mediator</td>
                <td>{{ production_expense.copyright_mediator }} kn</td>
                <template v-if="currentEdit('copyright_mediator')">
                    <td><input type="text" class="form-control" v-model="expenses.copyright_mediator" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('copyright_mediator')">{{ expenses.copyright_mediator }} kn</td>
                </template>
                <td>{{ production_expense.copyright_mediator - expenses.copyright_mediator }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>METHODICAL INSTRUMENTARIUM</td>
                <td>{{ production_expense.methodical_instrumentarium }} kn</td>
                <template v-if="currentEdit('methodical_instrumentarium')">
                    <td><input type="text" class="form-control" v-model="expenses.methodical_instrumentarium" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('methodical_instrumentarium')">{{ expenses.methodical_instrumentarium }} kn</td>
                </template>
                <td>{{ production_expense.methodical_instrumentarium - expenses.methodical_instrumentarium }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Selection</td>
                <td>{{ production_expense.selection }} kn</td>
                <template v-if="currentEdit('selection')">
                    <td><input type="text" class="form-control" v-model="expenses.selection" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('selection')">{{ expenses.selection }} kn</td>
                </template>
                <td>{{ production_expense.selection - expenses.selection }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Powerpoint presentation</td>
                <td>{{ production_expense.powerpoint_presentation }} kn</td>
                <template v-if="currentEdit('powerpoint_presentation')">
                    <td><input type="text" class="form-control" v-model="expenses.powerpoint_presentation" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                <td v-on:click="editField('powerpoint_presentation')">{{ expenses.powerpoint_presentation }} kn</td>
                </template>
                <td>{{ production_expense.powerpoint_presentation - expenses.powerpoint_presentation }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Additional expenses</td>
                <td>{{ additional_expense }} kn</td>
                <template v-if="currentEdit('additional_expense')">
                    <td><input type="text" class="form-control" v-model="expenses.additional_expense" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('additional_expense')">{{ expenses.additional_expense }} kn</td>
                </template>
                <td>{{ additional_expense - expenses.additional_expense }} kn</td>
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
                <td>{{ marketing_expense }} kn</td>
                <template v-if="currentEdit('marketing_expense')">
                    <td><input type="text" class="form-control" v-model="expenses.marketing_expense" v-on:keyup.enter="closeEdit" autofocus></td>
                </template>
                <template v-else>
                    <td v-on:click="editField('marketing_expense')">{{ expenses.marketing_expense }} kn</td>
                </template>
                <td>{{ marketing_expense - expenses.marketing_expense }} kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            </tbody>
        </table>

    </div>

</template>
<script>
    import _ from 'lodash'

    export default {
        data: function () {
            return {
                expenses: {
                    text_price: 0,
                    reviews: 0,
                    lecture: 0,
                    correction: 0,
                    proofreading: 0,
                    translation: 0,
                    index: 0,
                    epilogue: 0,
                    photos: 0,
                    illustrations: 0,
                    technical_drawings: 0,
                    expert_report: 0,
                    copyright: 0,
                    copyright_mediator: 0,
                    methodical_instrumentarium: 0,
                    selection: 0,
                    powerpoint_presentation: 0,
                    additional_expense: 0,
                    marketing_expense: 0,
                },
                activeEdit: '',
            }
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
            marketing_expense() {
                let marketing_expenses = this.$store.state.proposition.proposition.marketing_expense;
                return Number(marketing_expenses.expense) +  _.sumBy(marketing_expenses.additional_expense, function(o) { return Number(o.amount) })
            },
            additional_expense() {
                return _.sumBy(this.production_expense.additional_expense, (o) => {return Number(o.amount)});
            }
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
            }
        }
    }
</script>