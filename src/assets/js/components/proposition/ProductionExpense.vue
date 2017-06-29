<template>
    <div>
        <div class="page-name-xl mb-3">{{ lang('Production Expense') }}</div>
        <!-- Circulation Number -->
        <div class="col-md-12 mb-3">
            <h6 class="text-center no-border display-e">{{ lang('Circulation') }}</h6>
            <h1 class="text-center display-2">52.354 kn</h1>
        </div>

        <div class="row">
            <div class="col-md-12">

                <!-- First column -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="page-name-l mb-2">{{ lang('Book Block') }}</div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="text-price" class="form-control" v-model="expense['text_price']">
                                    <label for="text-price">{{ lang('Text Price') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="text-price-amount" class="form-control" v-model="expense['text_price_amount']">
                                    <label for="text-price-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div >
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['text_price'] * expense['text_price_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds -->
                        <div class="md-form input-group">
                            <input type="text" id="accontation" class="form-control" v-model="expense['accontation']">
                            <label for="accontation">{{ lang('Accontation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="netto-price-percentage" class="form-control" v-model="expense['netto_price_percentage']">
                            <label for="netto-price-percentage">{{ lang('Netto Price Percentage') }}</label>
                            <span class="input-group-addon">{{ lang('%') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="reviews" class="form-control" v-model="expense['reviews']">
                            <label for="reviews">{{ lang('Reviews') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="lecture" class="form-control" v-model="expense['lecture']">
                                    <label for="lecture" class="">{{ lang('Lecture') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="lecture-amount" class="form-control" v-model="expense['lecture_amount']">
                                    <label for="lecture-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['lecture'] * expense['lecture_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="correction" class="form-control" v-model="expense['correction']">
                                    <label for="correction" class="">{{ lang('Correction') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="correction-amount" class="form-control" v-model="expense['correction_amount']">
                                    <label for="correction-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['correction'] * expense['correction_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="proofreading" class="form-control" v-model="expense['proofreading']">
                                    <label for="proofreading" class="">{{ lang('Proofreading') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="proofreading-amount" class="form-control" v-model="expense['proofreading_amount']">
                                    <label for="proofreading-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['proofreading'] * expense['proofreading_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="translation" class="form-control" v-model="expense['translation']">
                                    <label for="translation" class="">{{ lang('Translation') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="translation-amount" class="form-control" v-model="expense['translation_amount']">
                                    <label for="translation-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['translation'] * expense['translation_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="index" class="form-control" v-model="expense['index']">
                                    <label for="index">{{ lang('Index') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="index-amount" class="form-control" v-model="expense['index_amount']">
                                    <label for="index-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['index'] * expense['index_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="reviews2" class="form-control" v-model="expense['reviews2']">
                            <label for="reviews2" class="">{{ lang('Reviews') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                    </div>
                    <!-- Second column -->
                    <div class="col-md-6">
                        <div class="page-name-l mb-2">{{ lang('Cover') }}</div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="photos" class="form-control" v-model="expense['photos']">
                                    <label for="photos">{{ lang('Photos') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="photos-amount" class="form-control" v-model="expense['photos_amount']">
                                    <label for="photos-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['photos'] * expense['photos_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="illustrations" class="form-control" v-model="expense['illustrations']">
                                    <label for="illustrations">{{ lang('Illustrations') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="illustrations-amount" class="form-control" v-model="expense['illustrations_amount']">
                                    <label for="illustrations-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['illustrations'] * expense['illustrations_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="technical-drawings" class="form-control" v-model="expense['technical_drawings']">
                                    <label for="technical-drawings" class="">{{ lang('Technical Drawings') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="technical-drawings-amount" class="form-control" v-model="expense['technical_drawings_amount']">
                                    <label for="technical-drawings-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ expense['technical_drawings'] * expense['technical_drawings_amount'] }} kn</div>
                                </div>
                            </div>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="expert-report" class="form-control" v-model="expense['expert_report']">
                            <label for="expert-report" class="">{{ lang('Expert Report') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="copyright" class="form-control" v-model="expense['copyright']">
                            <label for="copyright">{{ lang('Copyright') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="copyright-mediator" class="form-control" v-model="expense['copyright_mediator']">
                            <label for="copyright-mediator">{{ lang('Copyright Mediator') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="methodical-instrumentarium" class="form-control" v-model="expense['methodical_instrumentarium']">
                            <label for="methodical-instrumentarium" class="">{{ lang('Methodical Instrumentarium') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="selection" class="form-control" v-model="expense['selection']">
                            <label for="selection">{{ lang('Selection') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="powerpoint-presentation" class="form-control" v-model="expense['powerpoint_presentation']">
                            <label for="powerpoint-presentation">{{ lang('PowerPoint Presentation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Documents upload -->
        <div class="page-name-l mb-1">{{ lang('Additional Expenses') }}</div>
        <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add New Expense') }}</button>


        <!-- Textarea -->
        <div class="md-form mt-3">
            <textarea id="form76" class="md-textarea" v-model="expense['note']"></textarea>
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
                return this.$deepModel('proposition.proposition.print.production_expense');
            }
        },
        methods: {},
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 6});
        }
    }
</script>
