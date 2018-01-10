<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Initial Document') }}</div>
            <!-- File/document table -->
            <div class="files mt-2 mb-2">
                <div class="file-box file-box-l d-flex align-items-center" v-for="(file, index) in files">
                    <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                    </div>
                    <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                    <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(index, 'files')">Obriši</div>
                </div>
            </div>

            <div class="justify-content-center d-flex mb-4">
                <button type="button" class="btn btn-neutral" v-on:click="documentAdd('initial-documents')">{{ lang('Upload') }}</button>
            </div>

            <div class="page-name-xl mb-4 mt-5">{{ lang('Final Document') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file, index) in final">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(index, 'final')">Obriši</div>
            </div>
        </div>
                <div class="justify-content-center d-flex mb-4">
                    <button type="button" class="btn btn-neutral" v-on:click="documentAdd('final-document')">{{ lang('Upload') }}</button>
                </div>
            <div class="modal-footer btn-footer">
                <button id="save-btn" type="button" class="btn btn-lg btn-save" v-on:click="saveFiles">{{ lang('Save') }}
                    <i class="fa fa-refresh fa-5x fa-fw spinner-delay-rotate spinner-loader text-white hide"></i>
                </button>
                <button class="btn btn-lg btn-assign btn-assign-icon" v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
            </div>
        <upload-modal id="initial-documents" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" v-bind:dir="$route.meta.dir" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <upload-modal id="final-document" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" v-bind:dir="$route.meta.dir" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" v-bind:isFinal="true"></upload-modal>
        <assign-documents></assign-documents>
    </div>
</template>
<script>
    import uploadModal from '../general/UploadModal.vue'
    import assignDocuments from '../modals/AssignDocuments'
    export default {
        data: function () {
            return {
                files: [],
                final: []
            }
        },
        components: {
            uploadModal,
            assignDocuments
        },
        computed: {},
        methods: {
            assignModalOpen: function() {
                jQuery('#assign-documents').modal('show');
            },
            documentAdd: function(modal) {
                jQuery('#'+modal).modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileDelete: function (id, isFinal) {
                if (isFinal) {
                    this.final = _.filter(this.final, (file) => {
                        return file.id !== id;
                    })
                }
                else {
                    this.files = _.filter(this.files, (file) => {
                        return file.id !== id;
                    })
                }
            },
            fileAdd: function(data) {
                if (data.isFinal) {
                    this.final.push(data.file);
                }
                else {
                    this.files.push(data.file);
                }
            },
            fileNameSave: function(data) {
                let files = this.files;
                if (data.isFinal) {
                    files = this.final;
                }
                _.forEach(files, (o) => {
                    if (o.id === payload.id) {
                        o.title = data.file.title;
                    }
                });
            },
            saveFiles: function() {
                let saveButton = document.getElementById('save-btn');
                saveButton.setAttribute('style', 'color: #92C100 !important; position: relative');
                $( "i.spinner-loader" ).toggleClass( "hide" );

                axios.post('/api/proposition/' + this.$route.params.id + '/files/' + this.$route.meta.dir, {initial:this.files, final: this.final})
                    .then((res) => {
                        saveButton.setAttribute('style', 'color: #FFFFFF !important');
                        $( "i.spinner-loader" ).addClass( "hide" );
                        toastr.success(this.lang('Uspješno obavljeno'));
                    })
                    .catch(() => {
                        toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                        $( "i.spinner-loader" ).addClass( "hide" );
                    });
            }
        },
        mounted() {
            axios.get('/api/proposition/' + this.$route.params.id + '/files/' + this.$route.meta.dir)
                .then((res) => {
                this.files = res.data.files;
                this.final = res.data.final;
                })
                .catch((err) => {
                    if (err.response.status === 403) {
                        window.location.href='/propositions';
                    }
                })
        }
    }
</script>