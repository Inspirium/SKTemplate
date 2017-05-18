<template>
    <div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h1 class="modal-title w-100 text-center">{{ lang('Upload Files') }}</h1>
                    <h6 class="w-100 text-center mt-1">{{ lang('Upload documents using upload button, or use drag and drop') }}</h6>
                </div>
                <!--Body-->
                <div class="modal-body">
                
                <!-- File/document table -->
                <div class="files mt-2 mb-2">
                    <div class="file-box file-box-s d-flex align-items-center">
                        <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon mr-auto">Fizika i društvo.doc</a>
                        <div class="file-box-sty icon icon-edit">Uredi</div>
                        <div class="file-box-sty icon icon-cancel">Obriši</div>
                    </div>
                    <div class="progress" v-if="progress">
                        <div class="progress-bar info-color" role="progressbar" v-bind:style="{width: progress+'%'}"></div>
                    </div>
                    
                    <div class="file-box file-box-s d-flex align-items-center">
                        <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon mr-auto">Fizika i društvo.doc</a>
                        <div class="file-box-sty icon icon-edit">Uredi</div>
                        <div class="file-box-sty icon icon-cancel">Obriši</div>
                    </div>
                    <div class="progress" v-if="progress">
                        <div class="progress-bar info-color" role="progressbar" v-bind:style="{width: progress+'%'}"></div>
                    </div>
                </div>
                <div class="text-center mb-1">
                    <button type="button" class="btn btn-addon info-color" v-on:click="fileUpload">{{ lang('Add files') }}</button>
                </div>
                
<!--
                    <div v-if="message">{{ message }}</div>
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm">
                            <span>{{ lang('Choose file') }}</span>
                            <input type="file" v-on:change="fileInputChange" v-bind:accept="accept">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" v-bind:placeholder="lang('Upload your file')">
                        </div>
                    </div>
                    <div class="md-form">
                        <input type="text" id="file_name" class="form-control" v-model="title" v-bind:placeholder="lang('File Title')">
                        <label for="file_name">{{ lang('File Title') }}</label>
                    </div>
-->
                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Close') }}</button>
                    <button type="button" class="btn btn-lg btn-save" v-on:click="fileUpload">{{ lang('Upload') }}</button>
                </div>
                
                <!--Drag and Drop Overlay-->
                <div class="dragdrop">
                    <div class="dragdrop-area d-flex justify-content-center align-items-center">
                        <div class="dragdrop-content file-box-sty text-white">{{ lang('Drop files here') }}  
                        </div>
                    </div>
                </div>
                
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            action: {
                type: String,
                required: true
            },
            accept: String
        },
        data: function() {
            return {
                file: '',
                title: '',
                progress: 40,
                message: ''
            }
        },
        methods: {
            fileInputChange: function(event) {
               this.file = event.target.files[0];
            },
            fileUpload: function() {
                let data = new FormData();
                data.append('title', this.title);
                data.append('file', this.file);
                let config = {
                    onUploadProgress: function(progressEvent) {
                        this.progress = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                    }
                };
                axios.put(this.action, data, config)
                    .then(function (res) {
                        message = res.data;
                    })
                    .catch(function (err) {
                        message = err.message;
                    });
            }
        }
    }
</script>
