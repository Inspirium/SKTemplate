<template>
    <div>
        <div class="page-name-xl mb-3">{{ lang('Technical Data') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="number" id="form1" class="form-control" v-bind:placeholder="lang('Circulation')" v-model.number="circulation" step="1" min="1" v-on:keydown.13="addCirculation">
                        <label for="form1" class="">{{ lang('Circulation') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon p-1 ml-1" type="button" v-on:click="addCirculation">{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3" v-for="item in technical_data['circulations']" v-bind:key="item.id">
                {{ item.title }}
                <i class="close fa fa-times" v-on:click="deleteCirculation(item.id)"></i>
            </div>
            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="lang('Additions')" v-model="addition" v-on:keydown.13="addAddition">
                        <label for="form2" class="">{{ lang('Additions') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon p-1 ml-1" type="button" v-on:click="addAddition">{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3" v-for="item in technical_data['additions']" v-bind:key="item.id">
                {{ item.title }}
                <i class="close fa fa-times" v-on:click="deleteAddition(item.id)"></i>
            </div>

            <!-- First column -->
            <div class="row">
                <div class="col-md-6">
                    <div class="page-name-l mb-2">{{ lang('Book Block') }}</div>
                    <!-- Input fileds -->
                    <div class="md-form">
                        <input type="text" id="form3" class="form-control" v-model="technical_data['number_of_pages']">
                        <label for="form3" class="">{{ lang('Number of Pages') }}</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="form4" class="form-control" v-model="technical_data['width']" v-bind:placeholder="lang('mm')">
                                <label for="form4" class="">{{ lang('Width') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="form5" class="form-control" v-model="technical_data['height']" v-bind:placeholder="lang('mm')">
                                <label for="form5" class="">{{ lang('Height') }}</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dropdown menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="technical_data['book_binding']">
                                <option disabled >{{ lang('Book binding') }}</option>
                                <option value="none">{{ lang('None') }}</option>
                                <option value="hard">{{ lang('Hard book binding') }}</option>
                                <option value="soft">{{ lang('Soft book binding') }}</option>
                                <option value="both">{{ lang('Spiral book binding') }}</option>
                            </select>
                            <label>{{ lang('Book bindingr') }}</label>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="md-form">
                        <input type="text" class="form-control" v-model="technical_data['paper_type']">
                        <label>{{ lang('Paper Type') }}</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="technical_data['colors']">
                                <option disabled >{{ lang('Choose Colors') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>

                            </select>
                            <label>{{ lang('Colors') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="technical_data['colors_first_page']">
                                <option disabled >{{ lang('Colors - First Pages') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                            </select>
                            <label>{{ lang('Colors - First Pages') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="technical_data['colors_last_page']">
                                <option disabled >{{ lang('Colors - Last Pages') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                            </select>
                            <label>{{ lang('Colors - Last Pages') }}</label>
                        </div>
                    </div>
                    <div class="md-form">
                        <input type="text" id="form7" class="form-control" v-model="technical_data['additional_work']">
                        <label for="form7" class="">{{ lang('Additional Work') }}</label>
                    </div>
                </div>

                <!-- Second column -->
                <div class="col-md-6">
                    <div class="page-name-l mb-2">{{ lang('Cover') }}</div>

                    <!-- Dropdown menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="technical_data['cover_type']">
                                <option disabled >{{ lang('Hard/Soft Cover') }}</option>
                                <option value="none">{{ lang('None') }}</option>
                                <option value="hard">{{ lang('Hard Cover') }}</option>
                                <option value="soft">{{ lang('Soft Cover') }}</option>
                                <option value="both">{{ lang('Hard and Soft Cover') }}</option>
                            </select>
                            <label>{{ lang('Hard/Soft Cover') }}</label>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="md-form">
                        <input type="text" id="form6" class="form-control" v-model="technical_data['cover_paper_type']">
                        <label for="form6" class="">{{ lang('Paper Type') }}</label>
                    </div>

                    <!-- Input fileds -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="technical_data['cover_colors']">
                                <option disabled >{{ lang('Choose Colors') }}</option>
                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                            </select>
                            <label>{{ lang('Colors') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" v-model="technical_data['cover_plastification']">
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
                            <input name="film" type="radio" id="film11" value="no" v-model="technical_data['film_print']">
                            <label for="film11">{{ lang('No') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="film" type="radio" id="film21" value="yes" v-model="technical_data['film_print']">
                            <label for="film21">{{ lang('Yes') }}</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">{{ lang('Blind Print') }}</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="blind" type="radio" id="blind11" value="no" v-model="technical_data['blind_print']">
                            <label for="blind11">{{ lang('No') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="blind" type="radio" id="blind21" value="yes" v-model="technical_data['blind_print']">
                            <label for="blind21">{{ lang('Yes') }}</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">{{ lang('UV Film') }}</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="uv" type="radio" id="uv11" value="no" v-model="technical_data['uv_print']">
                            <label for="uv11">{{ lang('No') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="uv" type="radio" id="uv21" value="yes" v-model="technical_data['uv_print']">
                            <label for="uv21">{{ lang('Yes') }}</label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Textarea -->
    <div class="md-form mt-2">
        <textarea id="form76" class="md-textarea" v-model="technical_data['note']"></textarea>
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
                option_colors: ['One Colour', 'Two Colours', 'Three Colours', 'Full Colour', 'Fifth Colour'],
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        computed: {
            technical_data() {
                return this.$deepModel('proposition.proposition.technical_data');
            }
        },
        methods: {
            deleteCirculation: function(value) {
                this.$store.commit('proposition/removeFromObjectArray', {key:'circulations', group: 'technical_data', value: value});
                this.$store.commit('proposition/deletePrintOffer', {id: value});
            },
            deleteAddition: function(value) {
                this.$store.commit('proposition/removeFromObjectArray', {key: 'additions', group:'technical_data', value: value});
            },
            addCirculation: function() {
                if (this.circulation && !isNaN(parseFloat(this.circulation)) && isFinite(this.circulation)) {
                    this.$store.commit('proposition/addToObjectArray', {key:'circulations', group: 'technical_data', value: this.circulation});
                    this.circulation = '';
                }
            },
            addAddition: function() {
                if (this.addition) {
                    this.$store.commit('proposition/addToObjectArray', {key:'additions', group: 'technical_data', value: this.addition});
                    this.addition = '';
                }
            }
        },
        mounted: function() {
            $('.mdb-select').material_select('destroy');
            $('.mdb-select').material_select();
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 3});
        }
    }
</script>
