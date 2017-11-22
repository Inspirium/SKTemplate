<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Circulation') }}</div>

        <!-- First column -->
        <div class="row">
            <div class="col-md-6">
                <div class="page-name-l mb-4">{{ lang('0-12 Months') }}</div>

                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="retail" class="form-control" name="retail" v-model="first.retail">
                    <label for="retail" class="">{{ lang('Retail') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="wholesale" class="form-control" name="wholesale" v-model="first.wholesale">
                    <label for="wholesale" class="">{{ lang('Wholesale') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="field" class="form-control" name="field" v-model="first.field">
                    <label for="field" class="">{{ lang('Field sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="direct" class="form-control" name="direct" v-model="first.direct">
                    <label for="direct" class="">{{ lang('Direct sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="promotors" class="form-control" name="promotors" v-model="first.promotors">
                    <label for="promotors" class="">{{ lang('Promotors') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="export" class="form-control" name="export" v-model="first.export">
                    <label for="export" class="">{{ lang('Export') }}</label>
                </div>
                <!-- Checkbox -->
                <div class="page-name-m mt-4">{{ lang('Total') }}</div>
                <div class="form-inline mb-3 display-4">{{ total | flexCurrency(' kn', 2) }}</div>
            </div>



            <!-- Second column -->
            <div class="col-md-6">
                <div class="page-name-l mb-4">{{ lang('12-24 Months') }}</div>

                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="retail2" class="form-control" name="retail_24" v-model="second.retail">
                    <label for="retail2" class="">{{ lang('Retail') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="wholesale2" class="form-control" name="wholesale_24" v-model="second.wholesale">
                    <label for="wholesale2" class="">{{ lang('Wholesale') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="field2" class="form-control" name="field_24" v-model="second.field">
                    <label for="field2" class="">{{ lang('Field Sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="direct2" class="form-control" name="direct_24" v-model="second.direct">
                    <label for="direct2" class="">{{ lang('Direct Sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="promotors2" class="form-control" name="promotors_24" v-model="second.promotors">
                    <label for="promotors2" class="">{{ lang('Promotors') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="export2" class="form-control" name="export_24" v-model="second.export">
                    <label for="export2" class="">{{ lang('Export') }}</label>
                </div>
                <!-- Checkbox -->
                <div class="page-name-m mt-4">{{ lang('Total') }}</div>
                <div class="form-inline mb-3 display-4">{{ total2 | flexCurrency(' kn', 2) }}</div>
            </div>
        </div>

        <!-- Circulation -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-name-l mt-4 mb-3">{{ lang('Circulation') }}</div>
                <div class="mb-3">
                    <fieldset class="form-group" v-for="(offer, index) in offers">
                        <input type="radio" v-bind:id="'cir-' + index" name="circulations" value="1" v-model="offer.is_final">
                        <label v-bind:for="'cir-' + index">{{ offer.title }}</label>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="page-name-xl mb-4 mt-3">{{ lang('Retail price definition') }}</div>
        <div class="md-form">
            <input type="text" id="form15" class="form-control" name="final_price" v-model="">
            <label for="form15" class="">{{ lang('Retail Price') }}</label>
        </div>
        <footer-buttons></footer-buttons>
    </div>

</template>
<script>
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function () {
            return {
                first: {
                    retail: 0,
                    wholesale: 0,
                    direct: 0,
                    field:0,
                    promotors:0,
                    export: 0
                },
                second: {
                    retail: 0,
                    wholesale: 0,
                    direct: 0,
                    field:0,
                    promotors:0,
                    export: 0
                }
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        computed: {
            offers() {
                return this.$deepModel('proposition.print.offers');
            },
            total() {
                return Number(this.first.retail) + Number(this.first.wholesale) + Number(this.first.direct) + Number(this.first.field) + Number(this.first.promotors) + Number(this.first.export)
            },
            total2() {
                return Number(this.second.retail) + Number(this.second.wholesale) + Number(this.second.direct) + Number(this.second.field) + Number(this.second.promotors) + Number(this.second.export)
            }
        },
        methods: {

        },
        mounted() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/print/getData', {id: this.$route.params.id})
                    .then(() => {
                    });
            }
        }
    }
</script>