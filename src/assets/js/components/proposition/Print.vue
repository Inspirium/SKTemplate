<template>
<div>
    <div class="page-name-xl mb-2">{{ lang('Print Offers') }}</div>
    <div class="row tabs-wrapper">
    <ul class="col nav classic-tabs tabs-cyan" id="tabs" role="tablist">
        <li class="nav-item" v-for="(offer, key, index) in offers">
            <a v-bind:class="['nav-link', !index?'active':'']" data-toggle="tab" v-bind:href="'#panel'+index" v-bind:key="key"  role="tab" v-on:click="switchTab($event)">{{ offer.title }}</a>
        </li>
    </ul>
    </div>
    <div class="tab-content">
        <div v-bind:class="['tab-pane', 'fade', !index?'active in show':'']" v-bind:id="'panel'+index" role="tabpanel" v-for="(offer, key, index) in offers" v-bind:key="key">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-center no-border display-e">{{ lang('Circulation') }}</h6>
                    <h1 class="text-center display-2">{{ offer.title }}</h1>
                    <div class="print-offer-box mt-2 mb-3">
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <!-- Input field -->
                                <div class="md-form d-flex">
                                    <input type="text" class="form-control" v-bind:placeholder="lang('In Kn')" v-bind:value="offer.price" v-on:input="changeInput($event, 'price', offer.id)">
                                    <label>{{ lang('Print offer') }}</label>
                                    <span class="d-flex">
                                        <button class="btn btn-neutral btn-addon" type="button" v-on:click="saveOffer">{{ lang('Save') }}</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- First column -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="page-name-l mb-2">{{ lang('Book Block') }}</div>

                            <!-- Dropdown menu -->
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-bind:value="offer.cover_type">
                                        <option disabled >{{ lang('Hard/Soft Cover') }}</option>
                                        <option value="none" >{{ lang('None') }}</option>
                                        <option value="hard" >{{ lang('Hard Cover') }}</option>
                                        <option value="soft" >{{ lang('Soft Cover') }}</option>
                                        <option value="both" >{{ lang('Hard and Soft Cover') }}</option>
                                    </select>
                                    <label>{{ lang('Hard/Soft Cover') }}</label>
                                </div>
                            </div>

                            <!-- Show depent on selection above -->
                            <!-- Input fileds -->
                            <div class="row">
                                <div class="col-md-6" v-if="offer.cover_type === 'soft' || offer.cover_type === 'both'" >
                                    <div class="md-form">
                                        <input type="text"class="form-control">
                                        <label >{{ lang('Soft Cover Circulation') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6"v-if="offer.cover_type === 'hard' || offer.cover_type === 'both'">
                                    <div class="md-form">
                                        <input type="text" class="form-control">
                                        <label>{{ lang('Hard Cover Circulation') }}</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Show depent on selection above -->

                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-bind:value="offer.colors">
                                        <option disabled >{{ lang('Choose Colors') }}</option>
                                        <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                    </select>
                                    <label>{{ lang('Colors') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-bind:value="offer.colors_first_page">
                                        <option disabled >{{ lang('Colors - First Pages') }}</option>
                                        <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                    </select>
                                    <label>{{ lang('Colors - First Pages') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-bind:value="offer.colors_last_page">
                                        <option disabled >{{ lang('Colors - Last Pages') }}</option>
                                        <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                    </select>
                                    <label>{{ lang('Colors - Last Pages') }}</label>
                                </div>
                            </div>
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" v-bind:value="offer.additional_work">
                                <label for="form1" class="">{{ lang('Additional Work') }}</label>
                            </div>
                        </div>

                        <!-- Second column -->
                        <div class="col-md-6">
                            <div class="page-name-l mb-2">{{ lang('Cover') }}</div>

                            <!-- Dropdown menu -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label>{{ lang('Paper Type') }}</label>
                                    <input type="text"  class="form-control" v-bind:value="offer.cover_paper_type">

                                </div>
                            </div>

                            <!-- Input fileds -->
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-bind:value="offer.cover_colors">
                                        <option disabled >{{ lang('Choose Colors') }}</option>
                                        <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                    </select>
                                    <label>{{ lang('Colors') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-bind:value="offer.cover_plastification">
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
                                    <input name="film_print" type="radio" id="film_print_no" value="no" v-bind:value="offer.film_print">
                                    <label for="film_print_no">{{ lang('No') }}</label>
                                </fieldset>
                                <fieldset class="form-group">
                                    <input name="film_print" type="radio" id="film_print_yes" value="yes" v-bind:value="offer.film_print">
                                    <label for="film_print_yes">{{ lang('Yes') }}</label>
                                </fieldset>
                            </div>

                            <div class="page-name-m">{{ lang('Blind Print') }}</div>
                            <div class="form-inline mb-3">
                                <fieldset class="form-group">
                                    <input name="blind_print" type="radio" id="blind_print_no" value="no" v-bind:value="offer.blind_print">
                                    <label for="blind_print_no">{{ lang('No') }}</label>
                                </fieldset>
                                <fieldset class="form-group">
                                    <input name="blind_print" type="radio" id="blind_print_yes" value="yes" v-bind:value="offer.blind_print">
                                    <label for="blind_print_yes">{{ lang('Yes') }}</label>
                                </fieldset>
                            </div>

                            <div class="page-name-m">{{ lang('UV Film') }}</div>
                            <div class="form-inline mb-3">
                                <fieldset class="form-group">
                                    <input name="uv_print" type="radio" id="uv_print_no" value="no" v-bind:value="offer.uv_print">
                                    <label for="uv_print_no">{{ lang('No') }}</label>
                                </fieldset>
                                <fieldset class="form-group">
                                    <input name="uv_print" type="radio" id="uv_print_yes" value="yes" v-bind:value="offer.uv_print">
                                    <label for="uv_print_yes">{{ lang('Yes') }}</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea id="form76" class="md-textarea" v-bind:value="offer.note"></textarea>
                <label for="form76">{{ lang('Note') }}</label>
            </div>

            <div class="page-name-l text-center">{{ lang('Download as...') }}</div>
            <div class="file-box file-box-l d-flex align-items-center mt-1">
                <a href="#.pdf" class="file-icon" v-on:click="downloadOffer(index, 'pdf')">.pdf</a>
                <a href="#.docx" class="file-icon" v-on:click="downloadOffer(index, 'docx')">.docx</a>
            </div>
        </div>
    </div>
    <footer-buttons></footer-buttons>
</div>
</template>
<script>
    import FooterButtons from './partials/FooterButtons.vue'
    import {mapState} from 'vuex'
    export default {
        data: function () {
            return {
                option_colors: ['One Colour', 'Two Colours', 'Three Colours', 'Full Colour', 'Fifth Colour'],
                circulations: this.$store.state.proposition.proposition.technical_data.circulations,
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        computed: mapState({
            offers: state => state.proposition.proposition.print.offers
        }),
        methods: {
            switchTab: function(e) {
                $(e.target).tab('show');
            },
            saveOffer: function() {
                this.offers = this.local_offers;
            },
            downloadOffer: function(index, type) {
                //TODO: make request to download offer, probably save first :)
            },
            changeInput: function(e, field, id) {
                this.$store.commit('proposition/updateOffer', {offer: id, field: field, value: e.target.value})
            }
        },
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 4});
            this.$store.dispatch('proposition/initOffers').then(function() {
                $('.mdb-select').material_select();
            });
        }
    }
</script>
