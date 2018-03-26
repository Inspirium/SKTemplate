<template>
    <div class="content">
        <template v-if="Object.keys(offers).length">
    <div class="row tabs-wrapper">
        <ul class="col nav classic-tabs tabs-cyan" id="tabs" role="tablist">
            <li class="nav-item" v-for="(offer, key, index) in offers">
                <a v-bind:class="['nav-link', 'position-relative', !index?'active':'']" data-toggle="tab" v-bind:href="'#panel'+index" v-bind:key="key" v-bind:data-index="key" role="tab" v-on:click="switchTab($event)">{{ offer.title }}</a>
            </li>
        </ul>
    </div>
    <div class="page-name-xl mb-2 mt-3 mt-2">{{ lang('Print Offers') }}</div>
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
                                    <input type="number" class="form-control" v-bind:placeholder="lang('In Kn')" v-model="offer.print_offer">
                                    <label>{{ lang('Print offer') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- First column -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-name-l mb-4">{{ lang('Book Block') }}</div>

                            <!-- Input fileds -->
                            <div class="md-form">
                                <input type="text" class="form-control" v-model="offer.paper_type">
                                <label>{{ lang('Paper Type') }}</label>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-model="offer.book_binding">
                                        <option disabled >{{ lang('Book binding') }}</option>
                                        <option value="none">{{ lang('None') }}</option>
                                        <option value="stitch">{{ lang('Stitch Binding') }}</option>
                                        <option value="glue">{{ lang('Glue Binding') }}</option>
                                        <option value="clasp">{{ lang('Clasp Binding') }}</option>
                                    </select>
                                    <label>{{ lang('Book binding') }}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-model="offer.colors">
                                        <option disabled >{{ lang('Choose Colors') }}</option>
                                        <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                    </select>
                                    <label>{{ lang('Colors') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-model="offer.colors_first_page">
                                        <option disabled >{{ lang('Colors - First Pages') }}</option>
                                        <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                    </select>
                                    <label>{{ lang('Colors - First Pages') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="mdb-select" v-model="offer.colors_last_page">
                                        <option disabled >{{ lang('Colors - Last Pages') }}</option>
                                        <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                    </select>
                                    <label>{{ lang('Colors - Last Pages') }}</label>
                                </div>
                            </div>
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" v-model="offer.additional_work">
                                <label for="form1" class="">{{ lang('Additional Work') }}</label>
                            </div>
                        </div>
                    </div>
                        <!-- Second column -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="page-name-l mb-4">{{ lang('Cover') }}</div>

                                    <!-- Dropdown menu -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="mdb-select" v-model="offer.cover_type">
                                                <option disabled >{{ lang('Hard/Soft Cover') }}</option>
                                                <option value="none" >{{ lang('None') }}</option>
                                                <option value="hard" >{{ lang('Hard Cover') }}</option>
                                                <option value="soft" >{{ lang('Soft Cover') }}</option>
                                                <option value="both" >{{ lang('Hard and Soft Cover') }}</option>
                                                <option value="flex">{{ lang('Flex Cover') }}</option>
                                            </select>
                                            <label>{{ lang('Hard/Soft Cover') }}</label>
                                        </div>
                                    </div>

                                    <!-- Show depent on selection above -->
                                    <!-- Input fileds -->
                                    <div class="row">
                                        <div class="col-md-6" v-if="offer.cover_type === 'both'" >
                                            <div class="md-form">
                                                <input type="text" class="form-control" v-model="offer.soft_cover_circulation">
                                                <label >{{ lang('Soft Cover Circulation') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6" v-if="offer.cover_type === 'both'">
                                            <div class="md-form">
                                                <input type="text" class="form-control" v-model="offer.hard_cover_circulation">
                                                <label>{{ lang('Hard Cover Circulation') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Show depent on selection above -->

                                    <!-- Input fileds -->
                                    <div class="md-form">
                                        <input type="text" class="form-control" v-model="offer.cover_paper_type">
                                        <label>{{ lang('Paper Type') }}</label>
                                    </div>

                                    <!-- Input fileds -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="mdb-select" v-model="offer.cover_colors">
                                                <option disabled >{{ lang('Choose Colors') }}</option>
                                                <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                            </select>
                                            <label>{{ lang('Colors') }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="mdb-select" v-model="offer.cover_plastification">
                                                <option disabled >{{ lang('Plastification') }}</option>
                                                <option value="none">{{ lang('None') }}</option>
                                                <option value="glossy">{{ lang('Glossy plastification') }}</option>
                                                <option value="mat">{{ lang('Mat plastification') }}</option>
                                            </select>
                                            <label>{{ lang('Plastification') }}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="mdb-select" v-model="offer.uv_print">
                                                <option disabled >{{ lang('Varnishe') }}</option>
                                                <option value="none">{{ lang('None') }}</option>
                                                <option value="glossy">{{ lang('Glossy Varnishe') }}</option>
                                                <option value="mat">{{ lang('Mat Varnishe') }}</option>
                                            </select>
                                            <label>{{ lang('Varnishe') }}</label>
                                        </div>
                                    </div>

                                    <!--/. Checkbox -->
                                    <div class="page-name-m">{{ lang('Film Print') }}</div>
                                    <div class="form-inline mb-3">
                                        <fieldset class="form-group">
                                            <input v-bind:name="'film_print'+index" type="radio" v-bind:id="'film_print_no'+index" value="no" v-model="offer.film_print">
                                            <label v-bind:for="'film_print_no'+index">{{ lang('No') }}</label>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <input v-bind:name="'film_print'+index" type="radio" v-bind:id="'film_print_yes'+index" value="yes" v-model="offer.film_print">
                                            <label v-bind:for="'film_print_yes'+index">{{ lang('Yes') }}</label>
                                        </fieldset>
                                    </div>

                                    <div class="page-name-m">{{ lang('Blind Print') }}</div>
                                    <div class="form-inline mb-3">
                                        <fieldset class="form-group">
                                            <input v-bind:name="'blind_print'+index" type="radio" v-bind:id="'blind_print_no'+index" value="no" v-model="offer.blind_print">
                                            <label v-bind:for="'blind_print_no'+index">{{ lang('No') }}</label>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <input v-bind:name="'blind_print'+index" type="radio" v-bind:id="'blind_print_yes'+index" value="yes" v-model="offer.blind_print">
                                            <label v-bind:for="'blind_print_yes'+index">{{ lang('Yes') }}</label>
                                        </fieldset>
                                    </div>
                                 </div>  
                                      
                                <div class="col-md-6">
                                <div class="page-name-l mb-4">{{ lang('Cover Paper') }}</div>
                                <!-- Input fileds -->
                                <div class="md-form">
                                    <input type="text" id="form8" class="form-control" v-model="offer.coverpaper_paper_type">
                                    <label for="form8" class="">{{ lang('Paper Type') }}</label>
                                </div>

                                <!-- Input fileds -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" v-model="offer.coverpaper_colors">
                                            <option disabled >{{ lang('Choose Colors') }}</option>
                                            <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                        </select>
                                        <label>{{ lang('Colors') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" v-model="offer.coverpaper_plastification">
                                            <option disabled >{{ lang('Plastification') }}</option>
                                            <option value="none">{{ lang('None') }}</option>
                                            <option value="glossy">{{ lang('Glossy plastification') }}</option>
                                            <option value="mat">{{ lang('Mat plastification') }}</option>
                                        </select>
                                        <label>{{ lang('Plastification') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" v-model="offer.coverpaper_uv_print">
                                            <option disabled >{{ lang('Varnishe') }}</option>
                                            <option value="none">{{ lang('None') }}</option>
                                            <option value="glossy">{{ lang('Glossy Varnishe') }}</option>
                                            <option value="mat">{{ lang('Mat Varnishe') }}</option>
                                        </select>
                                        <label>{{ lang('Varnishe') }}</label>
                                    </div>
                                </div>

                                <!--/. Checkbox -->
                                <div class="page-name-m">{{ lang('Film Print') }}</div>
                                <div class="form-inline mb-3">
                                    <fieldset class="form-group">
                                        <input name="film_coverpaper" type="radio" id="film12" value="no" v-model="offer.coverpaper_film_print">
                                        <label for="film12">{{ lang('No') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input name="film_coverpaper" type="radio" id="film22" value="yes" v-model="offer.coverpaper_film_print">
                                        <label for="film22">{{ lang('Yes') }}</label>
                                    </fieldset>
                                </div>

                                <div class="page-name-m">{{ lang('Blind Print') }}</div>
                                <div class="form-inline mb-3">
                                    <fieldset class="form-group">
                                        <input name="blind_coverpaper" type="radio" id="blind12" value="no" v-model="offer.coverpaper_blind_print">
                                        <label for="blind12">{{ lang('No') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input name="blind_coverpaper" type="radio" id="blind22" value="yes" v-model="offer.coverpaper_blind_print">
                                        <label for="blind22">{{ lang('Yes') }}</label>
                                    </fieldset>
                                </div>
 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-name-xl mb-4 mt-3">{{ lang('Add Print Offers') }}</div>
            <!-- File/document table -->
            <div class="files mt-2 mb-2">
                <div class="file-box file-box-l d-flex align-items-center" v-for="(file, index) in offer.files">
                    <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                    </div>
                    <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                    <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning(file.id, offer.id)">Obriši</div>
                </div>
            </div>

            <div class="justify-content-center d-flex mb-4">
                <button type="button" class="btn btn-neutral" v-on:click="documentAdd('initial-documents')">{{ lang('Upload') }}</button>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea id="form76" class="md-textarea" v-model="offer.note"></textarea>
                <label for="form76">{{ lang('Note') }}</label>
            </div>

            <div class="page-name-l text-center">{{ lang('Download as...') }}</div>
            <div class="download-box d-flex align-items-center mt-1">
                <a href="#.docx" class="file-icon" v-on:click.prevent="downloadOffer(offer.id, 'docx')">{{ lang('Word document') }}</a>
            </div>
        </div>
    </div>
            <upload-modal action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" dir="print" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        </template>
        <template v-else>
            <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                <i class="fa fa-exclamation-triangle fa-5x mb-3 color-nav-sub" aria-hidden="true"></i>
                <h1 class="text-center mt-2">{{ lang('No print offers created') }}</h1>
            </div>
        </template>
</div>
</template>
<script>
    import {mapState} from 'vuex'
    export default {
        data: function () {
            return {
                option_colors: ['No Colour', 'One Colour', 'Two Colours', 'Three Colours', 'Full Colour', 'Only One Color', 'Only Two Color', 'Only Three Color', 'Only Four Color', 'Fifth Colour'],
            }
        },
        computed: {
            print() {
                return this.$deepModel('proposition.print')
            },
            offers() {
                return this.$deepModel('proposition.print.offers');
            }
        },
        methods: {
            switchTab: function(e) {
                this.print.active_offer = $(e.target).data('index');
                $(e.target).tab('show');
            },
            downloadOffer: function(id, type) {
                window.open('/proposition/'+this.$route.params.id+'/edit/print/'+id+'/'+type,'_blank');
            },
            documentAdd: function() {
                jQuery('#upload-modal').modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileWarning(id, offer) {
                this.$store.dispatch('proposition/listenForWarning', {vue: this, data: {id: id, offer: offer}});
                jQuery('#modal-warning').modal('show');
            },
            fileAdd: function(data) {
                this.$store.commit('proposition/print/addFile', {file:data.file});
            },
            fileNameSave: function(data) {
                this.$store.dispatch('proposition/basic_data/filenameSave', {id:data.file.id, title:data.file.title});
            },
        }
    }
</script>
