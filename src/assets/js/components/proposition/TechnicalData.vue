<template>
    <div>
        <div class="page-name-xl mb-3">{{ lang('Technical Data') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="lang('Circulation')" v-model="circulation" v-on:keydown.13="addCirculation">
                        <label for="form1" class="">{{ lang('Circulation') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button" v-on:click="addCirculation">{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3" v-for="item in circulations">
                {{ item }}
                <i class="close fa fa-times" v-on:click="deleteCirculation(item)"></i>
            </div>

            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="lang('Additions')" v-model="addition" v-on:keydown.13="addAddition">
                        <label for="form2" class="">{{ lang('Additions') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button" v-on:click="addAddition">{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3" v-for="item in additions">
                {{ item }}
                <i class="close fa fa-times" v-on:click="deleteAddition(item)"></i>
            </div>

            <!-- First column -->
            <div class="row">
                <div class="col-md-6">
                    <div class="page-name-l mb-2">{{ lang('Book Block') }}</div>
                    <!-- Input fileds -->
                    <div class="md-form">
                        <input type="text" id="form3" class="form-control" v-model="number_of_pages">
                        <label for="form3" class="">{{ lang('Number of Pages') }}</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="form4" class="form-control" v-model="width" v-bind:placeholder="lang('mm')">
                                <label for="form4" class="">{{ lang('Width') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="form5" class="form-control" v-model="height" v-bind:placeholder="lang('mm')">
                                <label for="form5" class="">{{ lang('Height') }}</label>
                            </div>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="md-form">
                        <input type="text" id="form6" class="form-control" v-model="paper_type">
                        <label for="form6" class="">{{ lang('Paper Type') }}</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="colors">
                                <option disabled >{{ lang('Choose Colors') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>

                            </select>
                            <label>{{ lang('Colors') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="colors_first_page">
                                <option disabled >{{ lang('Colors - First Pages') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                            </select>
                            <label>{{ lang('Colors - First Pages') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="colors_last_page">
                                <option disabled >{{ lang('Colors - Last Pages') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                            </select>
                            <label>{{ lang('Colors - Last Pages') }}</label>
                        </div>
                    </div>
                    <div class="md-form">
                        <input type="text" id="form7" class="form-control" v-model="additional_work">
                        <label for="form7" class="">{{ lang('Additional Work') }}</label>
                    </div>
                </div>

                <!-- Second column -->
                <div class="col-md-6">
                    <div class="page-name-l mb-2">{{ lang('Cover') }}</div>

                    <!-- Dropdown menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="cover_type">
                                <option disabled >{{ lang('Hard/Soft Cover') }}</option>
                                <option value="none">{{ lang('None') }}</option>
                                <option value="hard">{{ lang('Hard Cover') }}</option>
                                <option value="soft">{{ lang('Soft Cover') }}</option>
                                <option value="both">{{ lang('Hard and Soft Cover') }}</option>
                            </select>
                            <label>{{ lang('Hard/Soft Cover') }}</label>
                        </div>
                    </div>

                    <!-- Dropdown menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" v-model="cover_paper_type" class="form-control">
                            <label>{{ lang('Paper Type') }}</label>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="cover_colors">
                                <option disabled >{{ lang('Choose Colors') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                            </select>
                            <label>{{ lang('Colors') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="cover_plastification">
                                <option disabled >{{ lang('Plastification') }}</option>
                                <option value="none">{{ lang('None') }}</option>
                                <option value="glossy">{{ lang('Glossy plastification') }}</option>
                                <option value="mat">{{ lang('Mat plastification') }}</option>
                            </select>
                            <label>{{ lang('Plastification') }}</label>
                        </div>
                    </div>

                    <!--/. Checkbox -->
                    <div class="page-name-m">{{ lang('Film Print') }}</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="film" type="radio" id="film11" value="no" v-model="film_print">
                            <label for="film11">{{ lang('No') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="film" type="radio" id="film21" value="yes" v-model="film_print">
                            <label for="film21">{{ lang('Yes') }}</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">{{ lang('Blind Print') }}</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="blind" type="radio" id="blind11" value="no" v-model="blind_print">
                            <label for="blind11">{{ lang('No') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="blind" type="radio" id="blind21" value="yes" v-model="blind_print">
                            <label for="blind21">{{ lang('Yes') }}</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">{{ lang('UV Film') }}</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="uv" type="radio" id="uv11" value="no" v-model="uv_film">
                            <label for="uv11">{{ lang('No') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="uv" type="radio" id="uv21" value="yes" v-model="uv_film">
                            <label for="uv21">{{ lang('Yes') }}</label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Textarea -->
    <div class="md-form mt-2">
        <textarea id="form76" class="md-textarea" v-model="note"></textarea>
        <label for="form76">{{ lang('Note') }}</label>
    </div>
        <footer-buttons></footer-buttons>
    </div>
</template>

<script>
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function() {
            return {
                circulation: '',
                addition: '',
                option_colors: ['One Colour', 'Two Colours', 'Three Colours', 'Full Colour', 'Fifth Colour']
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        computed: {
            circulations: {
                get() { return this.$store.state.proposition.proposition.technical_data.circulations; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'circulations', group:'technical_data', value: value}) }
            },
            additions: {
                get() { return this.$store.state.proposition.proposition.technical_data.additions; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'additions', group:'technical_data', value: value}) }
            },
            number_of_pages: {
                get() { return this.$store.state.proposition.proposition.technical_data.number_of_pages; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'number_of_pages', group:'technical_data', value: value}) }
            },
            width: {
                get() { return this.$store.state.proposition.proposition.technical_data.width; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'width', group:'technical_data', value: value}) }
            },
            height: {
                get() { return this.$store.state.proposition.proposition.technical_data.height; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'height', group:'technical_data', value: value}) }
            },
            paper_type: {
                get() { return this.$store.state.proposition.proposition.technical_data.paper_type; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'paper_type', group:'technical_data', value: value}) }
            },
            additional_work: {
                get() { return this.$store.state.proposition.proposition.technical_data.additional_work; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'additional_work', group:'technical_data', value: value}) }
            },
            colors: {
                get() { return this.$store.state.proposition.proposition.technical_data.colors; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'colors', group:'technical_data', value: value}) }
            },
            colors_first_page: {
                get() { return this.$store.state.proposition.proposition.technical_data.colors_first_page; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'colors_first_page', group:'technical_data', value: value}) }
            },
            colors_last_page: {
                get() { return this.$store.state.proposition.proposition.technical_data.colors_last_page; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'colors_last_page', group:'technical_data', value: value}) }
            },
            cover_type: {
                get() { return this.$store.state.proposition.proposition.technical_data.cover_type; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_type', group:'technical_data', value: value}) }
            },
            cover_paper_type: {
                get() { return this.$store.state.proposition.proposition.technical_data.cover_paper_type; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_paper_type', group:'technical_data', value: value}) }
            },
            cover_colors: {
                get() { return this.$store.state.proposition.proposition.technical_data.cover_colors; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_colors', group:'technical_data', value: value}) }
            },
            cover_plastification: {
                get() { return this.$store.state.proposition.proposition.technical_data.cover_plastification; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_plastification', group:'technical_data', value: value}) }
            },
            film_print: {
                get() { return this.$store.state.proposition.proposition.technical_data.film_print; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'film_print', group:'technical_data', value: value}) }
            },
            blind_print: {
                get() { return this.$store.state.proposition.proposition.technical_data.blind_print; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'blind_print', group:'technical_data', value: value}) }
            },
            uv_film: {
                get() { return this.$store.state.proposition.proposition.technical_data.uv_film; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'uv_film', group:'technical_data', value: value}) }
            },
            note: {
                get() { return this.$store.state.proposition.proposition.technical_data.note; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'note', group:'technical_data', value: value}) }
            },
        },
        methods: {
            deleteCirculation: function(value) {
                this.$store.commit('proposition/removeFromArray', {key: 'circulations', group:'technical_data', value: value});
            },
            deleteAddition: function(value) {
                this.$store.commit('proposition/removeFromArray', {key: 'additions', group:'technical_data', value: value});
            },
            addCirculation: function() {
                if (this.circulation) {
                    this.$store.commit('proposition/pushToArray', {key: 'circulations', group:'technical_data', value: this.circulation});
                    this.circulation = '';
                }
            },
            addAddition: function() {
                if (this.addition) {
                    this.$store.commit('proposition/pushToArray', {key: 'additions', group:'technical_data', value: this.addition});
                    this.addition = '';
                }
            }
        },
        mounted: function() {
            $('.mdb-select').material_select();
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 3});
        }
    }
</script>
