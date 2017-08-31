<template>
    <div class="content">
    <div class="page-name-xl mb-3">{{ lang('Distribution') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form input-group d-flex addon">
                        <input type="text" id="form1" class="form-control" v-model="distribution.margin">
                        <label for="form1" class="">{{ lang('Distribution Margin') }}</label>
                        <span class="input-group-addon">{{ lang('%') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Textarea -->
                    <div class="md-form mt-1">
                        <textarea id="form76" class="md-textarea" v-model="distribution.note"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
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
            distribution() {
                return this.$deepModel('proposition.proposition.distribution_expense');
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        methods: {},
        mounted: function() {
            if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id});
            }
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 8});
        }
    }
</script>