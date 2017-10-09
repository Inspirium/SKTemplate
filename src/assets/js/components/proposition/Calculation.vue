<template>
    <div class="content">
    <div class="row tabs-wrapper">
        <ul class="col nav classic-tabs tabs-cyan" id="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#panel0" role="tab" v-on:click="switchTab($event)">{{ lang('Precalculation') }}</a>
            </li>
            <li class="nav-item" v-for="(option, key, index) in options">
                <a class="nav-link" data-toggle="tab" v-bind:href="'#panel'+(index+1)" v-bind:key="key"  role="tab" v-on:click="switchTab($event)">{{ option.title }}</a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in show" id="panel0" role="tabpanel">
            <div class="page-name-xl mb-1 mt-3">{{ lang('Precalculation') }}</div>
            <template v-for="(option, key, index) in options">
                <div class="page-name-l mb-1 mt-2">{{ lang('Option '+(index+1)) }}</div>
                <a v-bind:href="'#panel'+(index+1)" class="hoverable d-block" data-toggle="tab" v-on:click="switchTab($event)">
                    <div class="row text-white btn-sub2 d-flex py-2">
                        <div class="col-md-2">
                            <h6 class="no-border display-b text-white">{{ lang('Circulation') }}</h6>
                            <h1 class="mb-1 text-white weight-700">{{ option.title }}</h1>
                        </div>
                        <div class="col-md-3">
                            <h6 class="no-border display-b text-white">{{ lang('Total Cost') }}</h6>
                            <h1 class="mb-1 text-white">{{ totals[option.id].total_cost | flexCurrency(' kn', 2) }}</h1>
                        </div>
                        <div class="col-md-3">
                            <div class=" page-name-l-white border-white">{{ lang('Direct Cost Cover') }}</div>
                            <div>
                                <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                                <h3>{{ totals[option.id].direct_cost / option.price_proposal | flexCurrency('', 0) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class=" page-name-l-white">{{ lang('Complete Cost Cover') }}</div>
                            <div>
                                <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                                <h3>{{ totals[option.id].cost_coverage / option.price_proposal | flexCurrency('', 0) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-angle-right display-3 text-right float-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </template>
        </div>
        <div class="tab-pane fade" v-bind:id="'panel'+(index+1)" role="tabpanel" v-for="(option, key, index) in options" v-bind:key="key">
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
                            <h3 class="mb-2">{{ totals[option.id].direct_cost / option.price_proposal | flexCurrency('', 0) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="page-name-l-white text-center">{{ lang('Complete Cost Cover') }}</div>
                        <div>
                            <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                            <h3 class="mb-2">{{ totals[option.id].cost_coverage / option.price_proposal | flexCurrency('', 0) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <!-- Table -->
                <div class="page-name-xl mb-3 mt-4">{{ lang('Calculation') }}</div>
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>{{ lang('Expense') }}</th>
                        <th>{{ lang('Precentage') }}</th>
                        <th>{{ lang('Expense Total') }}</th>
                        <th>{{ lang('Expense Per Unit') }}</th>
                    </tr>
                    </thead>
                    <tbody class="white">
                    <tr class="table-display-1">
                        <th scope="row">1</th>
                        <td>Autorski honorar ukupno</td>
                        <td></td>
                        <td>{{ authors_total | flexCurrency('', 2) }}</td>
                        <td>{{ authors_total / option.title | flexCurrency(' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">1.1</th>
                        <td>Akontacija</td>
                        <td></td>
                        <td>{{ authors_advance | flexCurrency('', 2) }}</td>
                        <td>{{ authors_advance / option.title | flexCurrency(' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">1.2</th>
                        <td>Ostali autorski ugovori</td>
                        <td></td>
                        <td>{{ authors_other | flexCurrency('', 2) }}</td>
                        <td>{{ authors_other | flexCurrency(' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">2</th>
                        <td>Tiskarski troškovi</td>
                        <td></td>
                        <td>{{ option.print_offer | flexCurrency( '', 2) }}</td>
                        <td>{{ option.print_offer/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>

                    <tr class="table-display-1">
                        <th scope="row">3</th>
                        <td>Marketinški trošak</td>
                        <td></td>
                        <td>{{ marketing_expense | flexCurrency( '', 2) }}</td>
                        <td>{{ marketing_expense/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">4</th>
                        <td>Produkcijski trošak</td>
                        <td></td>
                        <td>{{ production_expense | flexCurrency( '', 2) }}</td>
                        <td>{{ production_expense/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">5</th>
                        <td>Trošak prijeloma i dizajna</td>
                        <td></td>
                        <td>{{ design_layout_expense | flexCurrency( '', 2) }}</td>
                        <td>{{ design_layout_expense/option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>

                    <tr class="table-display-2">
                        <th scope="row">6</th>
                        <td>Ukupno 1, 2, 3, 4, 5</td>
                        <td></td>
                        <td>{{ Number(authors_total) + Number(option.print_offer) + Number(marketing_expense) + Number(production_expense) + Number(design_layout_expense) | flexCurrency( '', 2) }}</td>
                        <td>{{ (Number(authors_total) + Number(option.print_offer) + Number(marketing_expense) + Number(production_expense) + Number(design_layout_expense)) / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Plaće izdavačkog sektora</td>
                        <td></td>
                        <template v-if="currentEdit('compensation')">
                            <td><input type="text" class="form-control" v-model="options[key].compensation" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-center" v-on:click="editField('compensation')">{{ option.compensation | flexCurrency('', 2) }}</td>
                        </template>
                        <td>{{ option.compensation / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">8</th>
                        <td>Direktni troškovi</td>
                        <td></td>
                        <td>{{ totals[option.id].direct_cost | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].direct_cost / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">9</th>
                        <td>Indirektni troškovi</td>
                        <td></td>
                        <template v-if="currentEdit('indirect_expenses')">
                            <td><input type="text" size="3" class="form-control" v-model="options[key].indirect_expenses" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-center" v-on:click="editField('indirect_expenses')">{{ option.indirect_expenses | flexCurrency( '', 2) }}</td>
                        </template>
                        <td>{{ option.indirect_expenses / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-2">
                        <th scope="row">10</th>
                        <td>Direktni + Indirektni</td>
                        <td></td>
                        <td>{{ Number(totals[option.id].direct_cost) + Number(option.indirect_expenses) | flexCurrency( '', 2) }}</td>
                        <td>{{ (Number(totals[option.id].direct_cost) + Number(option.indirect_expenses)) / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>Ostatak AH ugovorenog po prodaji</td>
                        <td></td>
                        <td>{{ totals[option.id].remainder_after_sales | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].remainder_after_sales / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-2">
                        <th scope="row">12</th>
                        <td>Ukupno pokrivanje troška</td>
                        <td></td>
                        <td>{{ totals[option.id].complete_expense | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].complete_expense / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>Dotacija</td>
                        <td></td>
                        <td>{{ dotation | flexCurrency( '', 2) }}</td>
                        <td>{{ dotation / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr class="table-display-1">
                        <th scope="row">14</th>
                        <td>Ukupno pokrivanje troška - dotacije</td>
                        <td></td>
                        <td>{{ totals[option.id].cost_coverage | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].cost_coverage / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>Ukalkulirana dobit</td>
                        <template v-if="currentEdit('calculated_profit_percent')">
                            <td><input type="text" size="3" class="form-control" v-model="options[key].calculated_profit_percent" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-center" v-on:click="editField('calculated_profit_percent')">{{ option.calculated_profit_percent | percent }}</td>
                        </template>
                        <td>{{ totals[option.id].cost_coverage * (option.calculated_profit_percent) / 100 | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].cost_coverage * (option.calculated_profit_percent) / 100 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">16</th>
                        <td>Prodajna cijena proizvođača</td>
                        <td></td>
                        <td>{{ totals[option.id].manufacturer_price | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].manufacturer_price / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">17</th>
                        <td>Udio trgovine</td>
                        <template v-if="currentEdit('shop_percent')">
                            <td><input type="text" size="3" class="form-control" v-model="options[key+'[shop_percent]']" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-center" v-on:click="editField('shop_percent')">{{ option.shop_percent | percent }}</td>
                        </template>
                        <td>{{ totals[option.id].manufacturer_price * option.shop_percent / 100  | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].manufacturer_price * option.shop_percent / 100 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">18</th>
                        <td>Maloprodajna cijena</td>
                        <td></td>
                        <td>{{ totals[option.id].price | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].price / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                        <th scope="row">19</th>
                        <td>PDV</td>
                        <template v-if="currentEdit('vat_percent')">
                            <td><input type="text" size="3" class="form-control" v-model="option.vat_percent" v-on:keyup.enter="closeEdit" autofocus></td>
                        </template>
                        <template v-else>
                            <td class="table-editable text-center" v-on:click="editField('vat_percent')">{{ option.vat_percent | percent }}</td>
                        </template>
                        <td>{{ totals[option.id].price * option.vat_percent / 100 | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].price * option.vat_percent / 100 / option.title | flexCurrency( ' kn', 2) }}</td>
                    </tr>
                    <tr>
                    <tr class="table-display-3">
                        <th scope="row">20</th>
                        <td>MPC + PDV</td>
                        <td></td>
                        <td>{{ totals[option.id].price * (100 + Number(option.vat_percent)) / 100 | flexCurrency( '', 2) }}</td>
                        <td>{{ totals[option.id].price * (100 + Number(option.vat_percent)) / 100 / option.title | flexCurrency( ' kn', 2) }}</td>
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

    <footer-buttons></footer-buttons>
</div>
</template>
<script>
    import FooterButtons from './partials/FooterButtons.vue';
    import { directive as onClickaway } from 'vue-clickaway';

    export default {
        data: function () {
            return {
                option_colors: ['One Colour', 'Two Colours', 'Three Colours', 'Full Colour', 'Fifth Colour'],
                dotation: this.$store.state.proposition.proposition.basic_data.dotation_amount,
                activeEdit: '',
            }
        },
        computed: {
            authors_total() {
                return _.sumBy(Object.keys(this.$store.state.proposition.proposition.authors_expense.expenses), (key) => {
                    let e = this.$store.state.proposition.proposition.authors_expense.expenses[key];
                    let additional = _.sumBy(e.additional_expenses, (a) => {
                        return Number(a.amount);
                    });
                    return Number(e.amount) + Number(additional);
                }) + _.sumBy(this.$store.state.proposition.proposition.authors_expense.other, (o) => {return Number(o.amount)});
            },
            authors_advance() {
                return _.sumBy(Object.keys(this.$store.state.proposition.proposition.authors_expense.expenses), (key) => {
                    return this.$store.state.proposition.proposition.authors_expense.expenses[key].accontation;
                })
            },
            authors_other() {
                _.sumBy(Object.keys(this.$store.state.proposition.proposition.authors_expense.expenses), (key) => {
                    return _.sumBy(this.$store.state.proposition.proposition.authors_expense.expenses[key].additional_expenses, (a) => {
                        return a.amount;
                    });
                })
            },
            options() {
                return this.$deepModel('proposition.proposition.print.offers');
            },
            marketing_expense() {
                return Number(this.$store.state.proposition.proposition.marketing_expense.expense) +  _.sumBy(this.$store.state.proposition.proposition.marketing_expense.additional_expense, function(o) { return Number(o.amount) });
            },
            production_expense() {
                let expense = this.$store.state.proposition.proposition.production_expense;
                let sum = ( Number(expense.text_price) * Number(expense.text_price_amount) ) +
                    ( Number(expense.lecture) * Number(expense.lecture_amount) ) +
                    ( Number(expense.correction) * Number(expense.correction_amount) ) +
                    ( Number(expense.proofreading) * Number(expense.proofreading_amount) )  +
                    ( Number(expense.translation) * Number(expense.translation_amount) ) +
                    ( Number(expense.index) * Number(expense.index_amount) ) +
                    ( Number(expense.photos) * Number(expense.photos_amount) ) +
                    ( Number(expense.illustrations) * Number(expense.illustrations_amount) ) +
                    ( Number(expense.technical_drawings) * Number(expense.technical_drawings_amount) )  +
                    Number(expense.accontation) + Number(expense.reviews) + Number(expense.epilogue) +
                    Number(expense.expert_report) + Number(expense.copyright) +
                    Number(expense.copyright_mediator) + Number(expense.methodical_instrumentarium) +
                    Number(expense.selection) + Number(expense.powerpoint_presentation);
                let additional = _.sumBy(expense.additional_expense, (o) => {return Number(o.amount)});
                return sum + additional;
            },
            design_layout_expense() {
                let category = this.$store.state.proposition.proposition.categorization.upgroup_coef / 60,
                    pages = this.$store.state.proposition.proposition.technical_data.number_of_pages,
                    photos = this.$store.state.proposition.proposition.production_expense.photos_amount / 30,
                    illustrations = this.$store.state.proposition.proposition.production_expense.illustrations_amount / 30,
                    drawings = this.$store.state.proposition.proposition.production_expense.technical_drawings_amount / 30;
                const lcomplexity = {
                    1: 0.65,
                    2: 0.8,
                    3: 1,
                    4: 1.2,
                    5: 1.35
                };
                let number_of_hours = (category * pages + photos + illustrations + drawings) * lcomplexity[this.$store.state.proposition.proposition.layout_expense.layout_complexity];
                let layout_price = number_of_hours * 8000 / 175;
                const rcomplexity = {
                    1: 0.4,
                    2: 0.7,
                    3: 1,
                    4: 1.3,
                    5: 1.6
                };
                let design_price = number_of_hours * 15000 / 175 * rcomplexity[this.$store.state.proposition.proposition.layout_expense.design_complexity] / 2;
                return layout_price + design_price;
            },
            totals() {
                let options = {};
                _.forEach(this.options, (option) => {
                    let remainder = _.sumBy(Object.keys(this.$store.state.proposition.proposition.authors_expense.expenses), (key) => {
                        let e = this.$store.state.proposition.proposition.authors_expense.expenses[key];
                            return e.percentage * option.title * option.price_proposal / 100;
                        }),
                        complete = (Number(this.authors_total) + Number(option.print_offer) + Number(option.compensation) + Number(option.indirect_expenses) + Number(remainder) + Number(this.marketing_expense) + Number(this.production_expense) + Number(this.design_layout_expense)),
                        mprice = (Number(complete) - Number(this.dotation)) * (100 + Number(option.calculated_profit_percent)) / 100,
                        price = mprice * (100 + Number(option.shop_percent)) / 100;

                    options[option.id] = {
                        direct_cost : Number(this.authors_total) + Number(option.print_offer) + Number(option.compensation)+Number(this.marketing_expense) + Number(this.production_expense) + Number(this.design_layout_expense),
                        remainder_after_sales: remainder,
                        complete_expense: complete,
                        cost_coverage: (Number(complete) - Number(this.dotation)),
                        manufacturer_price: mprice,
                        price: price,
                        total_cost: price * (100 + Number(option.vat_percent)) / 100
                    };
                });
                return options;
            }
        },
        components: {
            'footer-buttons' : FooterButtons
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
                $(e.target).tab('show');
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
        },
        mounted: function() {
            if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id})
                    .then(() => {
                        $('.mdb-select').material_select('destroy');
                        $('.mdb-select').material_select();
                    });
            }
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 11});
            $('.mdb-select').material_select('destroy');
            $('.mdb-select').material_select();
        }
    }
</script>