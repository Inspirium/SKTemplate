<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Multimedia') }}</div>

        <!-- Textarea -->
        <div class="md-form mt-5">
            <textarea id="note" name="note" class="md-textarea" v-model="multimedia.webshop"></textarea>
            <label for="note">{{ lang('Webshop Description') }}</label>
        </div>

        <div class="page-name-l mb-3 mt-1">{{ lang('Cover - JPG format') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file,index) in multimedia.jpg">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show/'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning({id: file.id, type: 'jpg'})">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('cover-jpg')">{{ lang('Upload') }}</button>
        </div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Cover 3D - PSD format') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file,index) in multimedia.psd">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning({id: file.id, type: 'psd'})">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('cover-psd')">{{ lang('Upload') }}</button>
        </div>

        <upload-modal id="cover-jpg" action="/api/file" accept=".jpg, .jpeg" disk="proposition" dir="multimedia.jpg" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <upload-modal id="cover-psd" action="/api/file" accept=".psd" disk="proposition" dir="multimedia.psd" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" v-bind:isFinal="true"></upload-modal>
    </div>

</template>
<script>
    import uploadModal from '../general/UploadModal.vue';
    export default {
        data: function () {
            return {}
        },
        components: {
            'upload-modal' : uploadModal
        },
        computed: {
            multimedia() {
                return this.$deepModel('proposition.multimedia');
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
                this.$store.commit('proposition/multimedia/addFile', data);
            },
            fileNameSave: function (data) {
                this.$store.dispatch('proposition/multimedia/filenameSave', data);
            },
        }
    }
</script>