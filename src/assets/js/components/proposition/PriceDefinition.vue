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
                    <label for="field" class="">{{ lang('Field Sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="direct" class="form-control" name="direct" v-model="price_definition.price_first_year.direct">
                    <label for="direct" class="">{{ lang('Direct Sales') }}</label>
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

        <div class="page-name-xl mb-4 mt-3">{{ lang('Final Circulation') }}</div>
        <div class="md-form">
            <input type="text" class="form-control" v-model="price_definition.retail_price">
            <label class="">{{ lang('Retail Price') }}</label>
        </div>
        <div class="md-form">
            <input type="text" class="form-control" v-model="price_definition.final_circulation">
            <label class="">{{ lang('Final Circulation') }}</label>
        </div>
        <div class="md-form">
            <input type="text" class="form-control" v-model="price_definition.final_print_price">
            <label  class="">{{ lang('Final Print Price') }}</label>
        </div>


        <div class="page-name-xl mb-4 mt-3">{{ lang('Add Print Offers') }}</div>
        <!-- File/document table -->
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="file in price_definition.print_offers">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning(file.id, 'print_offers')">Obriši</div>
            </div>
        </div>

        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('print_offers')">{{ lang('Upload') }}</button>
        </div>

        <upload-modal id="print_offers" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" dir="print_offers" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" isFinal="print_offers"></upload-modal>
    </div>

</template>
<script>
    export default {
        data: function () {
            return {}
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
            documentAdd: function(id) {
                jQuery('#'+id).modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileWarning(id, isFinal) {
                this.$store.dispatch('proposition/listenForWarning', {vue: this, data: {id: id, isFinal: isFinal}});
                jQuery('#modal-warning').modal('show');
            },
            fileAdd: function(data) {
                this.$store.commit('proposition/price_definition/addFile', data);
            },
            fileNameSave: function(data) {
                this.$store.dispatch('proposition/price_definition/filenameSave', {id:data.file.id, title:data.file.title});
            },
        }
    }
</script>