<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Multimedia') }}</div>

        <!-- Textarea -->
        <div class="md-form mt-5">
            <textarea id="note" name="note" class="md-textarea" v-model="webshop"></textarea>
            <label for="note">{{ lang('Webshop Description') }}</label>
        </div>

        <div class="page-name-l mb-3 mt-1">{{ lang('Cover - JPG format') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file,index) in jpg">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show/'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(index, 'jpg')">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('cover-jpg')">{{ lang('Upload') }}</button>
        </div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Cover 3D - PSD format') }}</div>
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="(file,index) in psd">
                <a v-bind:href="file.link" v-on:click.prevent="documentDownload(file.link)" class="file-icon">{{ file.title }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <a v-bind:href="'human_resources/employee/'+file.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="file.owner.image">{{ file.owner.name }}</a>
                </div>
                <div class="file-box-sty">{{ file.created_at.date | moment('DD.MM.YYYY.') }}</div>
                <div class="file-box-sty icon icon-download" v-on:click="documentDownload(file.link)">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(index, 'psd')">Obriši</div>
            </div>
        </div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" v-on:click="documentAdd('cover-psd')">{{ lang('Upload') }}</button>
        </div>
        <div class="modal-footer btn-footer">
            <button type="button" class="btn btn-lg btn-save" v-on:click="saveFiles">{{ lang('Save') }}
                <i v-bind:class="['fa', 'fa-5x', 'fa-fw', 'text-white', spinnerType, isSpinnerHidden]"></i>
            </button>
        </div>

        <upload-modal id="cover-jpg" action="/api/file" accept=".jpg, .jpeg" disk="proposition" dir="multimedia.jpg" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <upload-modal id="cover-psd" action="/api/file" accept=".psd" disk="proposition" dir="multimedia.psd" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" v-bind:isFinal="true"></upload-modal>
    </div>

</template>
<script>
    import uploadModal from '../general/UploadModal.vue';
    export default {
        data: function () {
            return {
                webshop: '',
                jpg: [],
                psd: [],
                spinnerType: 'fa-refresh spinner-delay-rotate spinner-loader',
                isSpinnerHidden: 'hide'
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
                this[type].splice(index, 1)
            },
            fileAdd: function(data) {
                if (data.isFinal) {
                    this.psd.push(data.file);
                }
                else {
                    this.jpg.push(data.file);
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
                let saveButton = jQuery(event.target);
                saveButton.toggleClass('spinner-loading');
                this.isSpinnerHidden = '';
                axios.post('/api/proposition/' + this.$route.params.id + '/files/multimedia', {jpg:this.jpg, psd: this.psd, webshop: this.webshop})
                    .then((res) => {
                        this.spinnerType = 'fa-check spinner-success';
                        setTimeout(() => {
                            this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                            this.isSpinnerHidden  ='hide';
                            saveButton.toggleClass( "spinner-loading" );
                        }, 1000)
                        toastr.success(this.lang('Uspješno spremljeno'));
                    })
                    .catch(() => {
                        toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                        this.spinnerType = 'fa-times spinner-fail';
                        setTimeout(() => {
                            this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                            this.isSpinnerHidden  ='hide';
                            saveButton.toggleClass( "spinner-loading" );
                        }, 1000)
                    });
            }
        },
        mounted() {
            //TODO: move to store
            axios.get('/api/proposition/' + this.$route.params.id + '/files/multimedia')
                .then((res) => {
                    this.jpg = res.data.jpg;
                    this.psd = res.data.psd;
                    this.webshop = res.data.webshop;
                })
        }
    }
</script>