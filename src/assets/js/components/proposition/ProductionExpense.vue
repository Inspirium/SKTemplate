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
                                    <input type="text" id="text-price" class="form-control" v-model.number="text_price">
                                    <label for="text-price">{{ lang('Text Price') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="text-price-amount" class="form-control" v-model.number="text_price_amount">
                                    <label for="text-price-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div >
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ text_price * text_price_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds -->
                        <div class="md-form input-group">
                            <input type="text" id="accontation" class="form-control" v-model="accontation">
                            <label for="accontation">{{ lang('Accontation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="netto-price-percentage" class="form-control" v-model="netto_price_percentage">
                            <label for="netto-price-percentage">{{ lang('Netto Price Percentage') }}</label>
                            <span class="input-group-addon">{{ lang('%') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="reviews" class="form-control" v-model="reviews">
                            <label for="reviews">{{ lang('Reviews') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="lecture" class="form-control" v-model="lecture">
                                    <label for="lecture" class="">{{ lang('Lecture') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="lecture-amount" class="form-control" v-model="lecture_amount">
                                    <label for="lecture-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lecture * lecture_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="correction" class="form-control" v-model="correction">
                                    <label for="correction" class="">{{ lang('Correction') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="correction-amount" class="form-control" v-model="correction_amount">
                                    <label for="correction-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ correction * correction_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="proofreading" class="form-control" v-model="proofreading">
                                    <label for="proofreading" class="">{{ lang('Proofreading') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="proofreading-amount" class="form-control" v-model="proofreading_amount">
                                    <label for="proofreading-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ proofreading * proofreading_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="translation" class="form-control" v-model="translation">
                                    <label for="translation" class="">{{ lang('Translation') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="translation-amount" class="form-control" v-model="translation_amount">
                                    <label for="translation-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ translation * translation_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="index" class="form-control" v-model="index">
                                    <label for="index">{{ lang('Index') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="index-amount" class="form-control" v-model="index_amount">
                                    <label for="index-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ index * index_amount }} kn</div>
                                </div>
                            </div>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="reviews2" class="form-control" v-model="reviews2">
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
                                    <input type="text" id="photos" class="form-control" v-model="photos">
                                    <label for="photos">{{ lang('Photos') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="photos-amount" class="form-control" v-model="photos_amount">
                                    <label for="photos-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ photos * photos_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="illustrations" class="form-control" v-model="illustrations">
                                    <label for="illustrations">{{ lang('Illustrations') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="illustrations-amount" class="form-control" v-model="illustrations_amount">
                                    <label for="illustrations-amount" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ illustrations * illustrations_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="technical-drawings" class="form-control" v-model="technical_drawings">
                                    <label for="technical-drawings" class="">{{ lang('Technical Drawings') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="technical-drawings-amount" class="form-control" v-model="technical_drawings_amount">
                                    <label for="technical-drawings-amount">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ technical_drawings * technical_drawings_amount }} kn</div>
                                </div>
                            </div>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="expert-report" class="form-control" v-model="expert_report">
                            <label for="expert-report" class="">{{ lang('Expert Report') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="copyright" class="form-control" v-model="copyright">
                            <label for="copyright">{{ lang('Copyright') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="copyright-mediator" class="form-control" v-model="copyright_mediator">
                            <label for="copyright-mediator">{{ lang('Copyright Mediator') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="methodical-instrumentarium" class="form-control" v-model="methodical_instrumentarium">
                            <label for="methodical-instrumentarium" class="">{{ lang('Methodical Instrumentarium') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="selection" class="form-control" v-model="selection">
                            <label for="selection">{{ lang('Selection') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="powerpoint-presentation" class="form-control" v-model="powerpoint_presentation">
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
            <textarea id="form76" class="md-textarea" v-model="note"></textarea>
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
            note: {
                get() { return this.$store.state.proposition.proposition.production_expense.note; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'note', group: 'production_expense', value: value}) }
            },
            text_price: {
                get() { return this.$store.state.proposition.proposition.production_expense.text_price; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'text_price', group: 'production_expense', value: value}) }
            },
            text_price_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.text_price_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'text_price_amount', group: 'production_expense', value: value}) }
            },
            accontation: {
                get() { return this.$store.state.proposition.proposition.production_expense.accontation; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'accontation', group: 'production_expense', value: value}) }
            },
            netto_price_percentage: {
                get() { return this.$store.state.proposition.proposition.production_expense.netto_price_percentage; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'netto_price_percentage', group: 'production_expense', value: value}) }
            },
            reviews: {
                get() { return this.$store.state.proposition.proposition.production_expense.reviews; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'reviews', group: 'production_expense', value: value}) }
            },
            lecture: {
                get() { return this.$store.state.proposition.proposition.production_expense.lecture; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'lecture', group: 'production_expense', value: value}) }
            },
            lecture_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.lecture_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'lecture_amount', group: 'production_expense', value: value}) }
            },
            correction_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.correction_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'correction_amount', group: 'production_expense', value: value}) }
            },
            correction: {
                get() { return this.$store.state.proposition.proposition.production_expense.correction; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'correction', group: 'production_expense', value: value}) }
            },
            translation: {
                get() { return this.$store.state.proposition.proposition.production_expense.translation; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'translation', group: 'production_expense', value: value}) }
            },
            translation_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.translation_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'translation_amount', group: 'production_expense', value: value}) }
            },
            proofreading: {
                get() { return this.$store.state.proposition.proposition.production_expense.proofreading; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'proofreading', group: 'production_expense', value: value}) }
            },
            proofreading_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.proofreading_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'proofreading_amount', group: 'production_expense', value: value}) }
            },
            index: {
                get() { return this.$store.state.proposition.proposition.production_expense.index; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'index', group: 'production_expense', value: value}) }
            },
            index_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.index_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'index_amount', group: 'production_expense', value: value}) }
            },
            reviews2: {
                get() { return this.$store.state.proposition.proposition.production_expense.reviews2; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'reviews2', group: 'production_expense', value: value}) }
            },
            photos: {
                get() { return this.$store.state.proposition.proposition.production_expense.photos; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'photos', group: 'production_expense', value: value}) }
            },
            photos_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.photos_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'photos_amount', group: 'production_expense', value: value}) }
            },
            illustrations: {
                get() { return this.$store.state.proposition.proposition.production_expense.illustrations; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'illustrations', group: 'production_expense', value: value}) }
            },
            illustrations_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.illustrations_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'illustrations_amount', group: 'production_expense', value: value}) }
            },
            technical_drawings: {
                get() { return this.$store.state.proposition.proposition.production_expense.technical_drawings; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'technical_drawings', group: 'production_expense', value: value}) }
            },
            technical_drawings_amount: {
                get() { return this.$store.state.proposition.proposition.production_expense.technical_drawings_amount; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'technical_drawings_amount', group: 'production_expense', value: value}) }
            },
            expert_report: {
                get() { return this.$store.state.proposition.proposition.production_expense.expert_report; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'expert_report', group: 'production_expense', value: value}) }
            },
            copyright: {
                get() { return this.$store.state.proposition.proposition.production_expense.copyright; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'copyright', group: 'production_expense', value: value}) }
            },
            copyright_mediator: {
                get() { return this.$store.state.proposition.proposition.production_expense.copyright_mediator; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'copyright_mediator', group: 'production_expense', value: value}) }
            },
            selection: {
                get() { return this.$store.state.proposition.proposition.production_expense.selection; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'selection', group: 'production_expense', value: value}) }
            },
            powerpoint_presentation: {
                get() { return this.$store.state.proposition.proposition.production_expense.powerpoint_presentation; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'powerpoint_presentation', group: 'production_expense', value: value}) }
            },
            methodical_instrumentarium: {
                get() { return this.$store.state.proposition.proposition.production_expense.methodical_instrumentarium; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'methodical_instrumentarium', group: 'production_expense', value: value}) }
            },

        },
        methods: {}
    }
</script>
