<template>
<div>
    <div class="profile-head row pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-white text-center">{{ lang('Layout and Design') }}</h1>
    </div>

    <!-- Display fileds -->
        <div class="profile-head pb-2 row">
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Number of Pages') }}</h6>
                <h3 class="mb-1 text-white">{{ technical['number_of_pages'] }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Photos') }}</h6>
                <h3 class="mb-1 text-white">{{ production['photos_amount'] }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Illustrations') }}</h6>
                <h3 class="mb-1 text-white">{{ production['illustrations_amount'] }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Tehnical Drawings') }}</h6>
                <h3 class="mb-1 text-white">{{ production['technical_drawings_amount'] }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Category') }}</h6>
                <h3 class="mb-1 text-white">{{ supergroup_text }}</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Group') }}</h6>
                <h3 class="mb-1 text-white">{{ group_text }}</h3>
            </div>
        </div>

        <!-- Circulation Number -->
        <div class="row">
            <div class="col-md-6 mt-2">
                <h6 class="text-center no-border display-e">{{ lang('Layout Expense') }}</h6>
                <h1 class="text-center display-2">{{ layout_total | flexCurrency(' kn', 2) }}</h1>
                <div class="col-md-6 mx-auto mt-3">
                    <!-- Dropdown menu -->
                    <div class="pos-rel">
                        <select class="mdb-select" v-model="layout['layout_complexity']">
                            <option disabled >{{ lang('Choose') }}</option>
                            <option value="1">{{ lang('1 - Very Easy') }}</option>
                            <option value="2">{{ lang('2 - Easy') }}</option>
                            <option value="3">{{ lang('3 - Medium') }}</option>
                            <option value="4">{{ lang('4 - Demanding') }}</option>
                            <option value="5">{{ lang('5 - Very Demanding') }}</option>
                        </select>
                        <label>{{ lang('Layout Complexity') }}</label>
                    </div>
                    <!--/. Checkbox -->
                    <div class="page-name-m mt-2">{{ lang('Include Layout Expense') }}</div>
                    <div class="form-inline mb-3 ">
                        <fieldset class="form-group">
                            <input name="layout-expense" type="radio" id="layout-expense-y" value="yes" v-model="layout['layout_include']">
                            <label for="layout-expense-y">{{ lang('Yes') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="layout-expense" type="radio" id="layout-expense-n" value="no" v-model="layout['layout_include']">
                            <label for="layout-expense-n">{{ lang('No') }}</label>
                        </fieldset>
                    </div>
                </div>
                <!-- TeAxtarea -->
                <div class="md-form">
                    <textarea class="md-textarea" v-model="layout['layout_note']"></textarea>
                    <label>{{ lang('Note') }}</label>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <h6 class="text-center no-border display-e">{{ lang('Design Expense') }}</h6>
                <h1 class="text-center display-2">{{ design_total | flexCurrency(' kn', 2) }}</h1>
                <div class="col-md-6 mx-auto mt-3">
                    <!-- Dropdown menu -->
                    <div class="pos-rel">
                        <select class="mdb-select" name="department_id" v-model="layout['design_complexity']">
                            <option disabled >{{ lang('Choose') }}</option>
                            <option value="1">{{ lang('1 - Very Easy') }}</option>
                            <option value="2">{{ lang('2 - Easy') }}</option>
                            <option value="3">{{ lang('3 - Medium') }}</option>
                            <option value="4">{{ lang('4 - Demanding') }}</option>
                            <option value="5">{{ lang('5 - Very Demanding') }}</option>
                        </select>
                        <label>{{ lang('Design Complexity') }}</label>
                    </div>
                    <!--/. Checkbox -->
                    <div class="page-name-m mt-2">{{ lang('Include Design Expense') }}</div>
                    <div class="form-inline mb-3 ">
                        <fieldset class="form-group">
                            <input name="design-expense" type="radio" id="design-expense-y" value="yes" v-model="layout['design_include']">
                            <label for="design-expense-y">{{ lang('Yes') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="design-expense" type="radio" id="design-expense-n"  value="no" v-model="layout['design_include']">
                            <label for="design-expense-n">{{ lang('No') }}</label>
                        </fieldset>
                    </div>
                </div>
                <!-- Textarea -->
                <div class="md-form">
                    <textarea v-model="layout['design_note']"   class="md-textarea"></textarea>
                    <label>{{ lang('Note') }}</label>
                </div>
            </div>
        </div>

    <footer-buttons></footer-buttons>
</div>
</template>
<script>
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function () {
            return {}
        },
        computed: {
            supergroup_text() {
                  return this.$store.state.proposition.proposition.categorization.supergroup_text;
            },
            group_text() {
                return this.$store.state.proposition.proposition.categorization.group_text;
            },
            technical() {
                return this.$deepModel('proposition.proposition.technical_data');
            },
            production() {
                return this.$deepModel('proposition.proposition.production_expense');
            },
            layout() {
                return this.$deepModel('proposition.proposition.layout_expense');
            },
            number_of_hours() {
                let category = this.$store.state.proposition.proposition.categorization.upgroup_coef / 60,
                    pages = this.technical.number_of_pages,
                    photos = this.production.photos_amount / 30,
                    illustrations = this.production.illustrations_amount / 30,
                    drawings = this.production.technical_drawings_amount / 30;
                const complexity = {
                    1: 0.65,
                    2: 0.8,
                    3: 1,
                    4: 1.2,
                    5: 1.35
                };
                return (category * pages + photos + illustrations + drawings) * complexity[this.layout.layout_complexity];
            },
            layout_total() {
                let price = 8000 / 175;
                return this.number_of_hours * price;
            },
            design_total() {
                let price = 15000 / 175;
                const complexity = {
                    1: 0.4,
                    2: 0.7,
                    3: 1,
                    4: 1.3,
                    5: 1.6
                };
                return this.number_of_hours * price * complexity[this.layout.design_complexity] / 2;
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        methods: {},
        mounted: function() {
            $('.mdb-select').material_select();
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 9});
        }
    }
</script>