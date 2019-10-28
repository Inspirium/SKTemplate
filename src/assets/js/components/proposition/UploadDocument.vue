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
                    <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning({id:file.id, isFinal: 'initial'})">Obriši</div>
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
                <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning({id:file.id, isFinal: 'final'})">Obriši</div>
            </div>
        </div>
                <div class="justify-content-center d-flex mb-4">
                    <button type="button" class="btn btn-neutral" v-on:click="documentAdd('final-document')">{{ lang('Upload') }}</button>
                </div>

        <div class="justify-content-center steps-notif d-flex">
            {{ lang(status) }}
        </div>

        <upload-modal id="initial-documents" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx, .zip" disk="proposition" v-bind:dir="$route.meta.dir" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <upload-modal id="final-document" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx, .zip" disk="proposition" v-bind:dir="$route.meta.dir" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" isFinal="final"></upload-modal>

    </div>


</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {
            files() {
                return this.$deepModel('proposition.files.files');
            },
            final() {
                return this.$deepModel('proposition.files.final');
            },
            status() {
                switch (this.$store.state.proposition.files.step_status) {
                    case 'skipped':
                        return 'User has skipped this step';
                    case 'finished':
                        return 'User has finished this step';
                    default:
                        return '';
                }
            }
        },
        methods: {
            assignModalOpen: function () {
                jQuery('#assign-documents').modal('show');
            },
            documentAdd: function (modal) {
                jQuery('#' + modal).modal('show');
            },
            documentDownload: function (link) {
                window.open(link, "_blank");
                return false;
            },
            fileAdd: function (data) {
                this.$store.commit('proposition/files/addFile', data);
            },
            fileNameSave: function (data) {
                this.$store.dispatch('proposition/files/filenameSave', data);
            },
            fileWarning(data) {
                this.$store.dispatch('proposition/listenForWarning', {vue: this, data: data});
                jQuery('#modal-warning').modal('show');
            }
        }
    }
</script>