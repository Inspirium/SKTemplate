<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Circulation') }}</div>

        <!-- First column -->
        <div class="row">
            <div class="col-md-6">
                <div class="page-name-l mb-4">{{ lang('0-12 Months') }}</div>

                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="retail" class="form-control" name="retail" v-model="price_definition.price_first_year.retail">
                    <label for="retail" class="">{{ lang('Retail') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="wholesale" class="form-control" name="wholesale" v-model="price_definition.price_first_year.wholesale">
                    <label for="wholesale" class="">{{ lang('Wholesale') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="field" class="form-control" name="field" v-model="price_definition.price_first_year.field">
                    <label for="field" class="">{{ lang('Field sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="direct" class="form-control" name="direct" v-model="price_definition.price_first_year.direct">
                    <label for="direct" class="">{{ lang('Direct sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="promotors" class="form-control" name="promotors" v-model="price_definition.price_first_year.promotors">
                    <label for="promotors" class="">{{ lang('Promotors') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="export" class="form-control" name="export" v-model="price_definition.price_first_year.export">
                    <label for="export" class="">{{ lang('Export') }}</label>
                </div>
                <!-- Checkbox -->
                <div class="page-name-m mt-4">{{ lang('Total') }}</div>
                <div class="form-inline mb-3 display-4">{{ total }}</div>
            </div>



            <!-- Second column -->
            <div class="col-md-6">
                <div class="page-name-l mb-4">{{ lang('12-24 Months') }}</div>

                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="retail2" class="form-control" name="retail_24" v-model="price_definition.price_second_year.retail">
                    <label for="retail2" class="">{{ lang('Retail') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="wholesale2" class="form-control" name="wholesale_24" v-model="price_definition.price_second_year.wholesale">
                    <label for="wholesale2" class="">{{ lang('Wholesale') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="field2" class="form-control" name="field_24" v-model="price_definition.price_second_year.field">
                    <label for="field2" class="">{{ lang('Field Sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="direct2" class="form-control" name="direct_24" v-model="price_definition.price_second_year.direct">
                    <label for="direct2" class="">{{ lang('Direct Sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="promotors2" class="form-control" name="promotors_24" v-model="price_definition.price_second_year.promotors">
                    <label for="promotors2" class="">{{ lang('Promotors') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="export2" class="form-control" name="export_24" v-model="price_definition.price_second_year.export">
                    <label for="export2" class="">{{ lang('Export') }}</label>
                </div>
                <!-- Checkbox -->
                <div class="page-name-m mt-4">{{ lang('Total') }}</div>
                <div class="form-inline mb-3 display-4">{{ total2 }}</div>
            </div>
        </div>

        <!-- Circulation -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-name-l mt-4 mb-3">{{ lang('Circulation') }}</div>
                <div class="mb-3">
                    <fieldset class="form-group" v-for="(title, id) in price_definition.offers">
                        <input type="radio" v-bind:id="'cir-' + id" name="circulations" v-bind:value="id" v-model="price_definition.selected_circulation">
                        <label v-bind:for="'cir-' + id">{{ title }}</label>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="page-name-xl mb-4 mt-3">{{ lang('Retail price definition') }}</div>
        <div class="md-form">
            <input type="text" id="form15" class="form-control" name="final_price" v-model="price_definition.retail_price">
            <label for="form15" class="">{{ lang('Retail Price') }}</label>
        </div>
        <proposition-footer-buttons v-on:warningSaved="next"></proposition-footer-buttons>
    </div>

</template>
<script>
    export default {
        data: function () {
            return {
                next: false
            }
        },
        computed: {
            price_definition() {
                return this.$deepModel('proposition.price_definition');
            },
            total() {
                return Number(this.price_definition.price_first_year.retail) + Number(this.price_definition.price_first_year.wholesale) + Number(this.price_definition.price_first_year.direct) + Number(this.price_definition.price_first_year.field) + Number(this.price_definition.price_first_year.promotors) + Number(this.price_definition.price_first_year.export)
            },
            total2() {
                return Number(this.price_definition.price_second_year.retail) + Number(this.price_definition.price_second_year.wholesale) + Number(this.price_definition.price_second_year.direct) + Number(this.price_definition.price_second_year.field) + Number(this.price_definition.price_second_year.promotors) + Number(this.price_definition.price_second_year.export)
            }
        },
        methods: {

        },
        mounted() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/price_definition/getData', {id: this.$route.params.id});
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