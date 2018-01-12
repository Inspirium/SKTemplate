<template>
    <div class="content">
    <div class="row tabs-wrapper">
        <ul class="col nav classic-tabs tabs-cyan" id="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link position-relative active" href="#panel0" id="tab0" role="tab" v-on:click.prevent="switchTab('#tab0')">{{ lang('Precalculation') }}</a>
            </li>
            <li class="nav-item" v-for="(option, key, index) in offers">
                <a class="nav-link position-relative" v-bind:id="'tab'+(index+1)" v-bind:href="'#panel'+(index+1)" v-bind:key="key" role="tab" v-on:click.prevent="switchTab('#tab'+(index+1))">{{ option.title }}</a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade active in show" id="panel0" role="tabpanel">
            <div class="page-name-xl mb-1 mt-3">{{ lang('Precalculation') }}</div>
            <div v-for="(option, key, index) in offers" v-on:click.prevent="switchTab('#tab'+(index+1))">
                <div class="page-name-l mb-1 mt-2">{{ lang('Option '+(index+1)) }}</div>
                <a  class="hoverable d-block" >
                    <div class="row text-white btn-sub2 d-flex py-2">
                        <div class="col-md-2">
                            <h6 class="no-border display-b text-white">{{ lang('Circulation') }}</h6>
                            <h1 class="mb-1 text-white weight-700">{{ option.title }}</h1>
                        </div>
                        <div class="col-md-3">
                            <h6 class="no-border display-b text-white">{{ lang('Total Cost') }}</h6>
                            <h1 class="mb-1 text-white">{{ totals[option.id].x20 | flexCurrency(' kn', 2) }}</h1>
                        </div>
                        <div class="col-md-3">
                            <div class=" page-name-l-white border-white">{{ lang('Direct Cost Cover') }}</div>
                            <div>
                                <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                                <h3>{{ totals[option.id].direct_cost_cover | flexCurrency('', 0) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class=" page-name-l-white">{{ lang('Complete Cost Cover') }}</div>
                            <div>
                                <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                                <h3>{{ totals[option.id].complete_cost_cover | flexCurrency('', 0) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-angle-right display-3 text-right float-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="tab-pane fade" v-bind:id="'panel'+(index+1)" role="tabpanel" v-for="(option, key, index) in offers" v-bind:key="key">
            <div class="profile-head-clear mt-3">
                <div class="row justify-content-center pt-4">
                    <div class="col-md-4 col-sm-10">
                        <div class=" page-name-l-white border-white text-white mb-3 text-center">{{ lang('Price Proposal') }}</div>
                        <div class="md-form">
                            <input type="text" class="form-control" v-model="option.price_proposal">
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-head-clear">
                <div class="row text-white d-flex justify-content-center text-center">
                    <div class="col-md-4">
                        <div class="page-name-l-white text-center border-white">{{ lang('Direct Cost Cover') }}</div>
                        <div>
                            <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                            <h3 class="mb-2">{{ totals[option.id].direct_cost_cover | flexCurrency('', 0) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="page-name-l-white text-center">{{ lang('Complete Cost Cover') }}</div>
                        <div>
                            <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                            <h3 class="mb-2">{{ totals[option.id].complete_cost_cover | flexCurrency('', 0) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <!-- Table -->
                <div class="page-name-xl mb-3 mt-4">{{ lang('Calculation') }}</div>
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>{{ lang('Expense') }}</th>
                        <th class="text-right">{{ lang('Precentage') }}</th>
                        <th class="text-right">{{ lang('Expense Total') }}</th>
                        <th class="text-right">{{ lang('Expense Per Unit') }}</th>
                    </tr>
                    </thead>
                    <tbody class="white">
                    <tr class="table-display-1">
                        <th scope="row">1</th>
                        <td>Autorski honorar ukupno</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ authors_total | flexCurrency('', 2) }}</td>
                        <td class="text-right">{{ authors_total / option.title | flexCurrency(' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">1.1</th>
                        <td>Akontacija</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ authors_advance | flexCurrency('', 2) }}</td>
                        <td class="text-right">{{ authors_advance / option.title | flexCurrency(' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">1.2</th>
                        <td>Ostali autorski ugovori</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ authors_other | flexCurrency('', 2) }}</td>
                        <td class="text-right">{{ authors_other / option.title | flexCurrency(' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">2</th>
                        <td>Tiskarski troškovi</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ option.print_offer | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ option.print_offer/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>

                    <tr class="table-display-1">
                        <th scope="row">3</th>
                        <td>Marketinški trošak</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ marketing_expense | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ marketing_expense/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">4</th>
                        <td>Produkcijski trošak</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ production_expense | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ production_expense/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">5</th>
                        <td>Trošak prijeloma i dizajna</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ design_layout_expense | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ design_layout_expense/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>

                    <tr class="table-display-2">
                        <th scope="row">6</th>
                        <td>Ukupno 1, 2, 3, 4, 5</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ totals[option.id].x6 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x6 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Plaće izdavačkog sektora</td>
                        <template v-if="currentEdit('compensation')">
                            <td class="text-right"><input type="text" size="3" class="form-control" v-model="option.compensation" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-right" v-on:click="editField('compensation')">{{ option.compensation | percent }}</td>
                        </template>
                        <td class="text-right">{{ totals[option.id].x7 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x7 / option.title | flexCurrency( ' kn', 2) }}</td>

                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">8</th>
                        <td>Direktni troškovi</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ totals[option.id].x8 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x8 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">9</th>
                        <td>Indirektni troškovi</td>

                        <template v-if="currentEdit('indirect_expenses')">
                            <td class="text-right"><input type="text" size="3" class="form-control" v-model="option.indirect_expenses" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-right" v-on:click="editField('indirect_expenses')">{{ option.indirect_expenses | percent }}</td>
                        </template>
                        <td class="text-right">{{ totals[option.id].x9 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x9 / option.title | flexCurrency( ' kn', 2) }}</td>

                    </tr>
                    <tr class="table-display-2">
                        <th scope="row">10</th>
                        <td>Direktni + Indirektni</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ Number(totals[option.id].x10) | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ Number(totals[option.id].x10) / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>Ostatak AH ugovorenog po prodaji</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ totals[option.id].x11 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x11 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-2">
                        <th scope="row">12</th>
                        <td>Ukupno pokrivanje troška</td>
                        <td></td>
                        <td class="text-right">{{ totals[option.id].x12 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x12 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>Dotacija</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ dotation | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ dotation / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">14</th>
                        <td>Ukupno pokrivanje troška - dotacije</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ totals[option.id].x14 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x14 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>Ukalkulirana dobit</td>
                        <template v-if="currentEdit('calculated_profit_percent')">
                            <td class="text-right"><input type="text" size="3" class="form-control" v-model="option.calculated_profit_percent" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-right" v-on:click="editField('calculated_profit_percent')">{{ option.calculated_profit_percent | percent }}</td>
                        </template>
                        <td class="text-right">{{ totals[option.id].x15 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x15 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">16</th>
                        <td>Prodajna cijena proizvođača</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ totals[option.id].x16 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x16 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">17</th>
                        <td>Udio trgovine</td>
                        <template v-if="currentEdit('shop_percent')">
                            <td class="text-right"><input type="text" size="3" class="form-control" v-model="option.shop_percent" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-right" v-on:click="editField('shop_percent')">{{ option.shop_percent | percent }}</td>
                        </template>
                        <td class="text-right">{{ totals[option.id].x17  | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x17 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">18</th>
                        <td>Maloprodajna cijena</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ totals[option.id].x18 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x18 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">19</th>
                        <td>PDV</td>
                        <template v-if="currentEdit('vat_percent')">
                            <td class="text-right"><input type="text" size="3" class="form-control" v-model="option.vat_percent" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-right" v-on:click="editField('vat_percent')">{{ option.vat_percent | percent }}</td>
                        </template>
                        <td class="text-right">{{ totals[option.id].x19 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x19 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                    <tr class="table-display-3">
                        <th scope="row">20</th>
                        <td>MPC + PDV</td>
                        <td class="text-right"></td>
                        <td class="text-right">{{ totals[option.id].x20 | flexCurrency( '', 2) }}</td>
                        <td class="text-right">{{ totals[option.id].x20 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>

                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <div class="page-name-xl mb-3 mt-3 mt-2">{{ lang('Circulation — ') }}{{ option.title }}</div>

                        <!-- First column -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="page-name-l mb-4">{{ lang('Book Block') }}</div>

                                <!-- Dropdown menu -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" disabled>
                                            <option disabled >{{ lang('Hard/Soft Cover') }}</option>
                                            <option value="none" >{{ lang('None') }}</option>
                                            <option value="hard" >{{ lang('Hard Cover') }}</option>
                                            <option value="soft" >{{ lang('Soft Cover') }}</option>
                                            <option value="both" >{{ lang('Hard and Soft Cover') }}</option>
                                        </select>
                                        <label>{{ lang('Hard/Soft Cover') }}</label>
                                    </div>
                                </div>

                                <!-- Input fileds -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" class="form-control" id="soft-cover" disabled v-bind:value="option.soft_cover_circulation">
                                            <label for="soft-cover" class="">{{ lang('Soft Cover Circulation') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" class="form-control" id="hard-cover" disabled v-bind:value="option.hard_cover_circulation">
                                            <label for="hard-cover" class="">{{ lang('Hard Cover Circulation') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" disabled v-bind:value="option.colors">
                                            <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                        </select>
                                        <label>{{ lang('Colors') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" disabled v-bind:value="option.colors_first_page">
                                            <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                        </select>
                                        <label>{{ lang('Colors - First Pages') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" disabled v-bind:value="option.colors_last_page">
                                            <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                        </select>
                                        <label>{{ lang('Colors - Last Pages') }}</label>
                                    </div>
                                </div>
                                <div class="md-form">
                                    <input type="text" class="form-control" disabled v-bind:value="option.additional_work">
                                    <label class="">{{ lang('Additional Work') }}</label>
                                </div>
                            </div>

                            <!-- Second column -->
                            <div class="col-md-6">
                                <div class="page-name-l mb-4">{{ lang('Cover') }}</div>

                                <!-- Dropdown menu -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                        <input type="text" class="form-control" disabled v-bind:value="option.cover_paper_type">
                                        <label>{{ lang('Paper Type') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Input fileds -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" disabled v-bind:value="option.cover_colors">
                                            <option v-for="(color, index) in option_colors" v-bind:value="index+1">{{ lang(color) }}</option>
                                        </select>
                                        <label>{{ lang('Colors') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select class="mdb-select" disabled v-bind:value="option.cover_plastification">
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
                                    {{  }}
                                    <fieldset class="form-group">
                                        <input v-bind:name="'film_print'+index" type="radio" v-bind:id="'film_print_no'+index" value="no" disabled v-model="option.film_print">
                                        <label v-bind:for="'film_print_no'+index">{{ lang('No') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input v-bind:name="'film_print'+index" type="radio" v-bind:id="'film_print_yes'+index" value="yes" disabled v-model="option.film_print">
                                        <label v-bind:for="'film_print_yes'+index">{{ lang('Yes') }}</label>
                                    </fieldset>
                                </div>

                                <div class="page-name-m">{{ lang('Blind Print') }}</div>
                                <div class="form-inline mb-3">
                                    <fieldset class="form-group">
                                        <input v-bind:name="'blind_print'+index" type="radio" v-bind:id="'blind_print_no'+index" value="no" disabled v-model="option.blind_print">
                                        <label v-bind:for="'blind_print_no'+index">{{ lang('No') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input v-bind:name="'blind_print'+index" type="radio" v-bind:id="'blind_print_yes'+index" value="yes" disabled v-model="option.blind_print">
                                        <label v-bind:for="'blind_print_yes'+index">{{ lang('Yes') }}</label>
                                    </fieldset>
                                </div>

                                <div class="page-name-m">{{ lang('UV Film') }}</div>
                                <div class="form-inline mb-3">
                                    <fieldset class="form-group">
                                        <input v-bind:name="'uv_print'+index" type="radio" v-bind:id="'uv_film_no'+index" value="no" disabled v-model="option.uv_print">
                                        <label v-bind:for="'uv_film_no'+index">{{ lang('No') }}</label>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <input v-bind:name="'uv_print'+index" type="radio" v-bind:id="'uv_film_yes'+index" value="yes" disabled v-model="option.uv_print">
                                        <label v-bind:for="'uv_film_yes'+index">{{ lang('Yes') }}</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            </div>
    </div>
</div>
</template>
<script>
    import { directive as onClickaway } from 'vue-clickaway';
    import { mapState, mapGetters } from 'vuex'

    export default {
        data: function () {
            return {
                option_colors: ['One Colour', 'Two Colours', 'Three Colours', 'Full Colour', 'Fifth Colour'],
                activeEdit: ''
            }
        },
        computed: {
            ...mapGetters('proposition/calculation', {
                totals: 'totals'
            }),
            ...mapState( 'proposition/calculation', {
                authors_total: 'authors_total',
                authors_advance: 'authors_advance',
                authors_other: 'authors_other',
                author_expenses: 'author_expenses',
                marketing_expense: 'marketing_expense',
                production_expense: 'production_expense',
                design_layout_expense: 'design_layout_expense',
                dotation: 'dotation',
                offers: 'offers'
            })
        },
        filters: {
            percent: function(value) {
                if (!isFinite(value) || (!value && value !== 0)) return '0 %';
                return parseFloat(value) + ' %';
            }
        },
        directives: {
            onClickaway: onClickaway,
        },
        methods: {
            switchTab: function(e) {
                $(e).tab('show');
                $('.mdb-select').material_select('destroy');
                $('.mdb-select').material_select();
            },
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