<template>
    <div class="content" v-if="expense.id>0">
        <div class="page-name-xl mb-2 mt-3">{{ lang('Production Expense') }}</div>
        <!-- Circulation Number -->
        <div class="col-md-12 mb-5">
            <h6 class="text-center no-border display-e">{{ lang('Total') }}</h6>
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
                                    <input type="text" id="text-price" class="form-control" v-model="expense.text_price" v-bind:placeholder="expense.parent.text_price">
                                    <label for="text-price">{{ lang('Text Price') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="text-price-amount" class="form-control" v-model="expense.text_price_amount" v-bind:placeholder="expense.parent.text_price_amount">
                                    <label for="text-price-amount">{{ lang('Amount') }}</label>
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
                            <input type="text" id="accontation" class="form-control" v-model="expense.accontation" v-bind:placeholder="expense.parent.accontation">
                            <label for="accontation">{{ lang('Accontation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="netto-price-percentage" class="form-control" v-model="expense.netto_price_percentage" v-bind:placeholder="expense.parent.netto_price_percentage">
                            <label for="netto-price-percentage">{{ lang('Netto Price Percentage') }}</label>
                            <span class="input-group-addon">{{ lang('%') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="reviews" class="form-control" v-model="expense.reviews" v-bind:placeholder="expense.parent.reviews">
                            <label for="reviews">{{ lang('Reviews') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="lecture" class="form-control" v-model="expense.lecture" v-bind:placeholder="expense.parent.lecture">
                                    <label for="lecture" class="">{{ lang('Lecture') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="lecture-amount" class="form-control" v-model="expense.lecture_amount" v-bind:placeholder="expense.parent.lecture_amount">
                                    <label for="lecture-amount" class="">{{ lang('Amount') }}</label>
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
                                    <input type="text" id="correction" class="form-control" v-model="expense.correction" v-bind:placeholder="expense.parent.correction">
                                    <label for="correction" class="">{{ lang('Correction') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="correction-amount" class="form-control" v-model="expense.correction_amount" v-bind:placeholder="expense.parent.correction_amount">
                                    <label for="correction-amount" class="">{{ lang('Amount') }}</label>
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
                                    <input type="text" id="proofreading" class="form-control" v-model="expense.proofreading" v-bind:placeholder="expense.parent.proofreading">
                                    <label for="proofreading" class="">{{ lang('Proofreading') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="proofreading-amount" class="form-control" v-model="expense.proofreading_amount" v-bind:placeholder="expense.parent.proofreading_amount">
                                    <label for="proofreading-amount" class="">{{ lang('Amount') }}</label>
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
                                    <input type="text" id="translation" class="form-control" v-model="expense.translation" v-bind:placeholder="expense.parent.translation">
                                    <label for="translation" class="">{{ lang('Translation') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="translation-amount" class="form-control" v-model="expense.translation_amount" v-bind:placeholder="expense.parent.translation_amount">
                                    <label for="translation-amount">{{ lang('Amount') }}</label>
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
                                    <input type="text" id="index" class="form-control" v-model="expense.index" v-bind:placeholder="expense.parent.index">
                                    <label for="index">{{ lang('Index') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="index-amount" class="form-control" v-model="expense.index_amount" v-bind:placeholder="expense.parent.index_amount">
                                    <label for="index-amount">{{ lang('Amount') }}</label>
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
                            <input type="text" id="epilogue" class="form-control" v-model="expense.epilogue" v-bind:placeholder="expense.parent.epilogue">
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
                                    <input type="text" id="photos" class="form-control" v-model="expense.photos" v-bind:placeholder="expense.parent.photos">
                                    <label for="photos">{{ lang('Photos') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="photos-amount" class="form-control" v-model="expense.photos_amount" v-bind:placeholder="expense.parent.photos_amount">
                                    <label for="photos-amount" class="">{{ lang('Amount') }}</label>
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
                                    <input type="text" id="illustrations" class="form-control" v-model="expense.illustrations" v-bind:placeholder="expense.parent.illustrations">
                                    <label for="illustrations">{{ lang('Illustrations') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="illustrations-amount" class="form-control" v-model="expense.illustrations_amount" v-bind:placeholder="expense.parent.illustrations_amount">
                                    <label for="illustrations-amount" class="">{{ lang('Amount') }}</label>
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
                                    <input type="text" id="technical-drawings" class="form-control" v-model="expense.technical_drawings" v-bind:placeholder="expense.parent.technical_drawings">
                                    <label for="technical-drawings" class="">{{ lang('Technical Drawings') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="technical-drawings-amount" class="form-control" v-model="expense.technical_drawings_amount" v-bind:placeholder="expense.parent.technical_drawings_amount">
                                    <label for="technical-drawings-amount">{{ lang('Amount') }}</label>
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
                            <input type="text" id="expert-report" class="form-control" v-model="expense.expert_report" v-bind:placeholder="expense.parent.expert_report">
                            <label for="expert-report" class="">{{ lang('Expert Report') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="copyright" class="form-control" v-model="expense.copyright" v-bind:placeholder="expense.parent.copyright">
                            <label for="copyright">{{ lang('Copyright') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="copyright-mediator" class="form-control" v-model="expense.copyright_mediator" v-bind:placeholder="expense.parent.copyright_mediator">
                            <label for="copyright-mediator">{{ lang('Copyright Mediator') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="methodical-instrumentarium" class="form-control" v-model="expense.methodical_instrumentarium" v-bind:placeholder="expense.parent.methodical_instrumentarium">
                            <label for="methodical-instrumentarium" class="">{{ lang('Methodical Instrumentarium') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="selection" class="form-control" v-model="expense.selection" v-bind:placeholder="expense.parent.selection">
                            <label for="selection">{{ lang('Selection') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="powerpoint-presentation" class="form-control" v-model="expense.powerpoint_presentation" v-bind:placeholder="expense.parent.powerpoint_presentation">
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
                        <input type="text" class="form-control" v-model="item.expense" v-bind:placeholder="item.parent?item.parent.expense:lang('Expense')">
                        <label>{{ lang('Expense') }}</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form input-group">
                        <input type="text" class="form-control" v-model="item.amount" v-bind:placeholder="item.parent?item.parent.amount:lang('Amount')">
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
        <proposition-footer-buttons v-on:warningSaved="next"></proposition-footer-buttons>

    </div>
</template>
<script>
    import FooterButtons from '../partials/FooterButtons.vue';
    export default {
        data: function () {
            return {}
        },
        components: {
            'footer-buttons': FooterButtons
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
        },
        mounted: function() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/production_expense/getData', {id: this.$route.params.id, type:'expense'});
            }
        }
    }
</script>
