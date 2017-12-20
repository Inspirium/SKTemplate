<template>
    <div class="content">
    <div class="page-name-xl mb-4 mt-3">{{ lang('Distribution') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form input-group d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="distribution.parent.margin" v-model="distribution.margin">
                        <label for="form1" class="">{{ lang('Distribution Margin') }}</label>
                        <span class="input-group-addon">{{ lang('%') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Textarea -->
                    <div class="md-form mt-3">
                        <textarea id="form76" class="md-textarea" v-model="distribution.note"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <proposition-footer-buttons v-on:warningSaved="next"></proposition-footer-buttons>
</div>
</template>
<script>
    import FooterButtons from '../partials/FooterButtons.vue'
    export default {
        data: function () {
            return {
                next: false
            }
        },
        computed: {
            distribution() {
                return this.$deepModel('proposition.distribution_expense');
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        methods: {},
        mounted: function() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/distribution_expense/getData', {id: this.$route.params.id, type:'expense'});
            }
        },
        beforeRouteLeave(to, from, next) {
            if (this.$store.state.edited) {
                this.next = next;
                $('#modal-warning-not-saved').modal('show');
            }
            else {
                next();
            }
        }
    }
</script>