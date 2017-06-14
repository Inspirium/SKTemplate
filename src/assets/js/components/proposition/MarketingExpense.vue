<template>
<div>
    <div class="page-name-xl mb-1">{{ lang('Marketing Budget') }}</div>
    <div class="row">
        <div class="col-md-12">
            <!-- Circulation Number -->
            <div class="col-md-12 mb-3">
                <h6 class="text-center no-border display-e">{{ lang('Total') }}</h6>
                <h1 class="text-center display-2">0 kn</h1>
            </div>

            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">{{ lang('Marketing Budget') }}</div>
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form input-group d-flex addon">
                        <input type="text" id="form1" class="form-control">
                        <label for="form1" class="">{{ lang('Expense') }}</label>
                        <span class="input-group-addon">{{ lang('Kn') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Textarea -->
                    <div class="md-form mt-1">
                        <textarea type="text" id="form76" class="md-textarea"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Input field -->
    <div class="page-name-l mb-1">{{ lang('Add Expenses') }}</div>
    <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add New Expense') }}</button>

    <footer-buttons></footer-buttons>
</div>
</template>
<script>
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function () {
            return {}
        },
        computed: {},
        components: {
            'footer-buttons' : FooterButtons
        },
        methods: {},
        mounted: function() {
            $('.mdb-select').material_select();
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 7});
        }
    }
</script>