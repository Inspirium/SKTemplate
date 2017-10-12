<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Marketing materials') }}</div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Cover - PDF format') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file,index) in cover">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/show/'+file.owner.id"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(index, 'cover')">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('cover-pdf')">{{ lang('Upload') }}</button>
        </div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Leaflet') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file, index) in leaflet">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/show/'+file.owner.id"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(index, 'leaflet')">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('leaflet')">{{ lang('Upload') }}</button>
        </div>
        <div class="modal-footer btn-footer">
            <button type="button" class="btn btn-lg btn-save" v-on:click="saveFiles">{{ lang('Save') }}</button>
        </div>

        <upload-modal id="cover-pdf" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" dir="marketing.cover" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <upload-modal id="leaflet" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" dir="marketing.leaflet" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" v-bind:isFinal="true"></upload-modal>
    </div>

</template>
<script>
    import uploadModal from '../general/UploadModal.vue';
    export default {
        data: function () {
            return {
                cover: [],
                leaflet: []
            }
        },
        components: {
            'upload-modal' : uploadModal
        },
        computed: {},
        methods: {
            documentAdd: function(modal) {
                jQuery('#'+modal).modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileDelete: function (index, type) {
                this[type].splice(index, 1);
            },
            fileAdd: function(data) {
                if (data.isFinal) {
                    this.leaflet.push(data.file);
                }
                else {
                    this.cover.push(data.file);
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
                axios.post('/api/proposition/' + this.$route.params.id + '/files/marketing', {cover:this.cover, leaflet: this.leaflet})
                    .then((res) => {

                    });
            }
        },
        mounted() {
            axios.get('/api/proposition/' + this.$route.params.id + '/files/marketing')
                .then((res) => {
                    this.cover = res.data.cover;
                    this.leaflet = res.data.leaflet;
                })
        }
    }
</script>