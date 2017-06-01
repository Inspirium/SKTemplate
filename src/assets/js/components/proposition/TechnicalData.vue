<template>
    <div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="lang('Circulation')">
                        <label for="form1" class="">{{ lang('Circulation') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3" v-for="item in circulations">
                {{ item }}
                <i class="close fa fa-times" v-on:click="deleteCirculation"></i>
            </div>

            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="lang('Additions')">
                        <label for="form2" class="">{{ lang('Additions') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3" v-for="item in additions">
                {{ item }}
                <i class="close fa fa-times" v-on:click="deleteAddition"></i>
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
                            <select class="mdb-select" v-model="colors" multiple>
                                <option disabled >{{ lang('Choose Colors') }}</option>
                            </select>
                            <label>{{ lang('Colors') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="colors_first_page" multiple>
                                <option disabled >{{ lang('Colors - First Pages') }}</option>
                            </select>
                            <label>{{ lang('Colors - First Pages') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="colors_last_page" multiple>
                                <option disabled >{{ lang('Colors - Last Pages') }}</option>
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
                            </select>
                            <label>{{ lang('Hard/Soft Cover') }}</label>
                        </div>
                    </div>

                    <!-- Dropdown menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="cover_paper_type">
                                <option disabled >{{ lang('Paper Type') }}</option>
                            </select>
                            <label>{{ lang('Paper Type') }}</label>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="cover_colors">
                                <option disabled >{{ lang('Choose Colors') }}</option>
                            </select>
                            <label>{{ lang('Colors') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="cover_plastification">
                                <option disabled >{{ lang('Plastification') }}</option>
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
        <textarea id="form76" class="md-textarea" v-model="technical_data_note"></textarea>
        <label for="form76">{{ lang('Note') }}</label>
    </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {}
        },
        computed: {
            circulations: {
                get() { return this.$store.state.proposition.proposition.circulations; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'circulations', value: value}) }
            },
            additions: {
                get() { return this.$store.state.proposition.proposition.additions; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'additions', value: value}) }
            },
            number_of_pages: {
                get() { return this.$store.state.proposition.proposition.number_of_pages; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'number_of_pages', value: value}) }
            },
            width: {
                get() { return this.$store.state.proposition.proposition.width; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'width', value: value}) }
            },
            height: {
                get() { return this.$store.state.proposition.proposition.height; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'height', value: value}) }
            },
            paper_type: {
                get() { return this.$store.state.proposition.proposition.paper_type; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'paper_type', value: value}) }
            },
            additional_work: {
                get() { return this.$store.state.proposition.proposition.additional_work; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'additional_work', value: value}) }
            },
            colors: {
                get() { return this.$store.state.proposition.proposition.colors; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'colors', value: value}) }
            },
            colors_first_page: {
                get() { return this.$store.state.proposition.proposition.colors_first_page; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'colors_first_page', value: value}) }
            },
            colors_last_page: {
                get() { return this.$store.state.proposition.proposition.colors_last_page; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'colors_last_page', value: value}) }
            },
            cover_type: {
                get() { return this.$store.state.proposition.proposition.cover_type; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_type', value: value}) }
            },
            cover_paper_type: {
                get() { return this.$store.state.proposition.proposition.cover_paper_type; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_paper_type', value: value}) }
            },
            cover_colors: {
                get() { return this.$store.state.proposition.proposition.cover_colors; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_colors', value: value}) }
            },
            cover_plastification: {
                get() { return this.$store.state.proposition.proposition.cover_plastification; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'cover_plastification', value: value}) }
            },
            film_print: {
                get() { return this.$store.state.proposition.proposition.film_print; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'film_print', value: value}) }
            },
            blind_print: {
                get() { return this.$store.state.proposition.proposition.blind_print; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'blind_print', value: value}) }
            },
            uv_film: {
                get() { return this.$store.state.proposition.proposition.uv_film; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'uv_film', value: value}) }
            },
            technical_data_note: {
                get() { return this.$store.state.proposition.proposition.technical_data_note; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'technical_data_note', value: value}) }
            },
        },
        methods: {
            deleteCirculation: function() {

            },
            deleteAddition: function() {

            }
        },
        mounted: function() {
            $('.mdb-select').material_select();
        }
    }
</script>
