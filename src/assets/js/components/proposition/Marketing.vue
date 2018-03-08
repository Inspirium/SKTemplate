<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Marketing materials') }}</div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Cover - PDF format') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file,index) in marketing.cover">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning({id: file.id, isFinal: 'initial'})">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('cover-pdf')">{{ lang('Upload') }}</button>
        </div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Leaflet') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file, index) in marketing.leaflet">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning({id: file.id, isFinal: 'final'})">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('leaflet')">{{ lang('Upload') }}</button>
        </div>

        <upload-modal id="cover-pdf" action="/api/file" accept=".pdf" disk="proposition" dir="marketing.cover" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <upload-modal id="leaflet" action="/api/file" accept=".pdf, .doc, .docx" disk="proposition" dir="marketing.leaflet" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" isFinal="final"></upload-modal>
    </div>

</template>
<script>
    export default {
        data: function () {
            return {
            }
        },
        computed: {
            marketing() {
                return this.$deepModel('proposition.marketing')
            }
        },
        methods: {
            documentAdd: function(modal) {
                jQuery('#'+modal).modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileWarning(data) {
                this.$store.dispatch('proposition/listenForWarning', {vue: this, data: data});
                jQuery('#modal-warning').modal('show');
            },
            fileAdd: function (data) {
                this.$store.commit('proposition/marketing/addFile', data);
            },
            fileNameSave: function (data) {
                this.$store.dispatch('proposition/marketing/filenameSave', data);
            },
        }
    }
</script>