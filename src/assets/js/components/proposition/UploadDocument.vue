<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Initial Document') }}</div>
            <!-- File/document table -->
            <div class="files mt-2 mb-2">
                <div class="file-box file-box-l d-flex align-items-center" v-for="file in files">
                    <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a v-bind:href="'human_resources/employee/show/'+file.owner.id"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                    </div>
                    <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                    <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(file.id)">Obriši</div>
                </div>
            </div>

            <div class="justify-content-center d-flex mb-4">
                <button type="button" class="btn btn-neutral" v-on:click="documentAdd">{{ lang('Upload') }}</button>
            </div>
            <div class="modal-footer btn-footer">
                <button type="button" class="btn btn-lg btn-save" v-on:click="saveFiles">{{ lang('Save') }}</button>
            </div>
            <div class="page-name-xl mb-4 mt-5">{{ lang('Final Document') }}</div>
                <div class="justify-content-center d-flex mb-4">
                    <button type="button" class="btn btn-neutral" v-on:click="documentAdd">{{ lang('Upload') }}</button>
                </div>
            <div class="modal-footer btn-footer">
                <button type="button" class="btn btn-lg btn-save" v-on:click="saveFiles">{{ lang('Save') }}</button>
            </div>
        <upload-modal action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" v-bind:dir="$route.meta.dir" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
    </div>
</template>
<script>
    import uploadModal from '../general/UploadModal.vue';
    export default {
        data: function () {
            return {
                files: []
            }
        },
        components: {
            'upload-modal' : uploadModal
        },
        computed: {},
        methods: {
            documentAdd: function() {
                jQuery('#upload-modal').modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileDelete: function (id) {
                this.$store.dispatch('proposition/deleteFile', {group:'basic_data', key:'manuscript_documents', id: id});
            },
            fileAdd: function(file) {
                this.files.push(file);
            },
            fileNameSave: function(f) {
                _.forEach(this.files, (o) => {
                    if (o.id === payload.id) {
                        o.title = f.title;
                    }
                });
            },
            saveFiles: function() {
                axios.post('/api/proposition/' + this.$route.params.id + '/files/' + this.$route.meta.dir, {files:this.files})
                    .then((res) => {

                    });
            }
        },
        mounted() {
            axios.get('/api/proposition/' + this.$route.params.id + '/files/' + this.$route.meta.dir)
                .then((res) => {
                this.files = res.data.files;
                })
        }
    }
</script>