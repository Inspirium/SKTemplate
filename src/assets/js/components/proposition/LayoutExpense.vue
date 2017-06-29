<template>
<div>
    <div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-white text-center">{{ lang('Layout and Design') }}</h1>
    </div>

    <!-- Display fileds -->
        <div class="profile-head pb-2 row">
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Number of Pages') }}</h6>
                <h3 class="mb-1 text-white">110</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Photos') }}</h6>
                <h3 class="mb-1 text-white">553</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Illustrations') }}</h6>
                <h3 class="mb-1 text-white">21</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Tehnical Drawings') }}</h6>
                <h3 class="mb-1 text-white">—</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Category') }}</h6>
                <h3 class="mb-1 text-white">Udžbenik</h3>
            </div>
            <div class="col-md-2">
                <h6 class="white-label">{{ lang('Što još...') }}</h6>
                <h3 class="mb-1 text-white">ime</h3>
            </div>
        </div>

        <!-- Circulation Number -->
        <div class="row">
            <div class="col-md-6 mt-2">
                <h6 class="text-center no-border display-e">{{ lang('Layout Expense') }}</h6>
                <h1 class="text-center display-2">9.700 kn</h1>
                <div class="col-md-6 mx-auto mt-3">
                    <!-- Dropdown menu -->
                    <div class="pos-rel">
                        <select class="mdb-select" name="department_id" required>
                            <option disabled >{{ lang('Choose') }}</option>
                            <option>{{ lang('1 - Very Easy') }}</option>
                            <option>{{ lang('2 - Easy') }}</option>
                            <option>{{ lang('3 - Medium') }}</option>
                            <option>{{ lang('4 - Demanding') }}</option>
                            <option>{{ lang('5 - Very Demanding') }}</option>
                        </select>
                        <label>{{ lang('Layout Complexity') }}</label>
                    </div>
                    <!--/. Checkbox -->
                    <div class="page-name-m mt-2">{{ lang('Include Layout Expense') }}</div>
                    <div class="form-inline mb-3 ">
                        <fieldset class="form-group">
                            <input name="layout-expense-1" type="radio" id="layout-expense-y" value="M" required>
                            <label for="layout-expense-y">{{ lang('Yes') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="layout-expense-1" type="radio" id="layout-expense-n" value="F" required>
                            <label for="layout-expense-n">{{ lang('No') }}</label>
                        </fieldset>
                    </div>
                </div>
                <!-- TeAxtarea -->
                <div class="md-form">
                    <textarea id="form76" class="md-textarea"></textarea>
                    <label for="form76">{{ lang('Note') }}</label>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <h6 class="text-center no-border display-e">{{ lang('Design Expense') }}</h6>
                <h1 class="text-center display-2">6.250 kn</h1>
                <div class="col-md-6 mx-auto mt-3">
                    <!-- Dropdown menu -->
                    <div class="pos-rel">
                        <select class="mdb-select" name="department_id" required>
                            <option disabled >{{ lang('Choose') }}</option>
                            <option>{{ lang('1 - Very Easy') }}</option>
                            <option>{{ lang('2 - Easy') }}</option>
                            <option>{{ lang('3 - Medium') }}</option>
                            <option>{{ lang('4 - Demanding') }}</option>
                            <option>{{ lang('5 - Very Demanding') }}</option>
                        </select>
                        <label>{{ lang('Design Complexity') }}</label>
                    </div>
                    <!--/. Checkbox -->
                    <div class="page-name-m mt-2">{{ lang('Include Design Expense') }}</div>
                    <div class="form-inline mb-3 ">
                        <fieldset class="form-group">
                            <input name="layout-expense-2" type="radio" id="design-expense-y" value="M" required>
                            <label for="design-expense-y">{{ lang('Yes') }}</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="layout-expense-2" type="radio" id="design-expense-n" value="F" required>
                            <label for="design-expense-n">{{ lang('No') }}</label>
                        </fieldset>
                    </div>
                </div>
                <!-- Textarea -->
                <div class="md-form">
                    <textarea id="form76" class="md-textarea"></textarea>
                    <label for="form76">{{ lang('Note') }}</label>
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
            layout() {
                return this.$deepModel('proposition.proposition.layout_expense');
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