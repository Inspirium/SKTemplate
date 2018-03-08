<template>
    <div class="content">
        <div class="page-name-xl mb-2 mt-3">{{ lang('Production Expense') }}</div>
        <!-- Circulation Number -->
        <div class="col-md-12 mb-5">
            <h6 class="text-center no-border display-e">{{ lang('Total') }} brutto</h6>
            <h1 class="text-center display-2">{{ total | flexCurrency(' kn', 2) }}</h1>
        </div>

        <div class="row">
            <div class="col-md-12">

                <!-- First column -->
                <div class="row">
                    <div class="col-md-6">
                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="text-price" class="form-control" v-model="expense.text_price">
                                    <label for="text-price">{{ lang('Text Price') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="text-price-amount" class="form-control" v-model="expense.text_price_amount">
                                    <label for="text-price-amount">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div >
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.text_price * expense.text_price_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds -->
                        <div class="md-form input-group">
                            <input type="number" id="accontation" class="form-control" v-model="expense.accontation">
                            <label for="accontation">{{ lang('Accontation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="number" id="netto-price-percentage" class="form-control" v-model="expense.netto_price_percentage">
                            <label for="netto-price-percentage">{{ lang('Netto Price Percentage') }}</label>
                            <span class="input-group-addon">{{ lang('%') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="number" id="reviews" class="form-control" v-model="expense.reviews">
                            <label for="reviews">{{ lang('Reviews') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="lecture" class="form-control" v-model="expense.lecture">
                                    <label for="lecture" class="">{{ lang('Lecture') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="lecture-amount" class="form-control" v-model="expense.lecture_amount">
                                    <label for="lecture-amount" class="">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.lecture * expense.lecture_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="correction" class="form-control" v-model="expense.correction">
                                    <label for="correction" class="">{{ lang('Correction') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="correction-amount" class="form-control" v-model="expense.correction_amount">
                                    <label for="correction-amount" class="">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.correction * expense.correction_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="proofreading" class="form-control" v-model="expense.proofreading">
                                    <label for="proofreading" class="">{{ lang('Proofreading') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="proofreading-amount" class="form-control" v-model="expense.proofreading_amount">
                                    <label for="proofreading-amount" class="">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.proofreading * expense.proofreading_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="translation" class="form-control" v-model="expense.translation">
                                    <label for="translation" class="">{{ lang('Translation') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="translation-amount" class="form-control" v-model="expense.translation_amount">
                                    <label for="translation-amount">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.translation * expense.translation_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="index" class="form-control" v-model="expense.index">
                                    <label for="index">{{ lang('Index') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="index-amount" class="form-control" v-model="expense.index_amount">
                                    <label for="index-amount">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.index * expense.index_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="md-form input-group">
                            <input type="number" id="epilogue" class="form-control" v-model="expense.epilogue">
                            <label for="epilogue" class="">{{ lang('Epilogue') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                    </div>
                    <!-- Second column -->
                    <div class="col-md-6">

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="photos" class="form-control" v-model="expense.photos">
                                    <label for="photos">{{ lang('Photos') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="photos-amount" class="form-control" v-model="expense.photos_amount">
                                    <label for="photos-amount" class="">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.photos * expense.photos_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="illustrations" class="form-control" v-model="expense.illustrations">
                                    <label for="illustrations">{{ lang('Illustrations') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="illustrations-amount" class="form-control" v-model="expense.illustrations_amount">
                                    <label for="illustrations-amount" class="">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.illustrations * expense.illustrations_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="number" id="technical-drawings" class="form-control" v-model="expense.technical_drawings">
                                    <label for="technical-drawings" class="">{{ lang('Technical Drawings') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="number" id="technical-drawings-amount" class="form-control" v-model="expense.technical_drawings_amount">
                                    <label for="technical-drawings-amount">{{ lang('Quantity') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense.technical_drawings * expense.technical_drawings_amount | flexCurrency( ' kn', 2 ) }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="md-form input-group">
                            <input type="number" id="expert-report" class="form-control" v-model="expense.expert_report">
                            <label for="expert-report" class="">{{ lang('Expert Report') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="number" id="copyright" class="form-control" v-model="expense.copyright">
                            <label for="copyright">{{ lang('Copyright') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="number" id="copyright-mediator" class="form-control" v-model="expense.copyright_mediator">
                            <label for="copyright-mediator">{{ lang('Copyright Mediator') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="number" id="methodical-instrumentarium" class="form-control" v-model="expense.methodical_instrumentarium">
                            <label for="methodical-instrumentarium" class="">{{ lang('Methodical Instrumentarium') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="number" id="selection" class="form-control" v-model="expense.selection">
                            <label for="selection">{{ lang('Selection') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="number" id="powerpoint-presentation" class="form-control" v-model="expense.powerpoint_presentation">
                            <label for="powerpoint-presentation">{{ lang('PowerPoint Presentation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-name-l mb-4">{{ lang('Additional Expenses') }}</div>
        <template v-for="(item,index) in expense.additional_expenses">
            <div class="row">
                <div class="col-md-4">
                    <div class="md-form input-group">
                        <input type="text" class="form-control" v-model="item.expense">
                        <label>{{ lang('Expense') }}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form input-group">
                        <input type="number" class="form-control" v-model="item.amount">
                        <label>{{ lang('Amount') }}</label>
                        <span class="input-group-addon">{{ lang('Kn') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-danger btn-addon" v-on:click="deleteExpense(index)">{{ lang('Delete Expense') }}</button>
                </div>
            </div>
        </template>
        <button class="btn btn-neutral btn-addon" type="button" v-on:click="addExpense">{{ lang('Add New Expense') }}</button>

        <!-- Textarea -->
        <div class="md-form mt-5">
            <textarea id="form76" class="md-textarea" v-model="expense.note"></textarea>
            <label for="form76">{{ lang('Note') }}</label>
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {
            expense() {
                return this.$deepModel('proposition.production_expense');
            },
            total: function() {
                let sum = ( Number(this.expense.text_price) * Number(this.expense.text_price_amount) ) +
                    ( Number(this.expense.lecture) * Number(this.expense.lecture_amount) ) +
                    ( Number(this.expense.correction) * Number(this.expense.correction_amount) ) +
                    ( Number(this.expense.proofreading) * Number(this.expense.proofreading_amount) )  +
                    ( Number(this.expense.translation) * Number(this.expense.translation_amount) ) +
                    ( Number(this.expense.index) * Number(this.expense.index_amount) ) +
                    ( Number(this.expense.photos) * Number(this.expense.photos_amount) ) +
                    ( Number(this.expense.illustrations) * Number(this.expense.illustrations_amount) ) +
                    ( Number(this.expense.technical_drawings) * Number(this.expense.technical_drawings_amount) )  +
                    Number(this.expense.accontation) + Number(this.expense.reviews) + Number(this.expense.epilogue) +
                    Number(this.expense.expert_report) + Number(this.expense.copyright) +
                    Number(this.expense.copyright_mediator) + Number(this.expense.methodical_instrumentarium) +
                    Number(this.expense.selection) + Number(this.expense.powerpoint_presentation);
                let additional = _.sumBy(this.expense.additional_expenses, (o) => {return Number(o.amount)});
                return sum + additional;

            }
        },
        methods: {
            addExpense: function() {
                this.$store.commit('proposition/production_expense/addExpense');
            },
            deleteExpense: function(index) {
                this.$store.commit('proposition/production_expense/deleteExpense', index);
            }
        }
    }
</script>
