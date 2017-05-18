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
                    <div class="d-flex">
                        <i class="fa fa-cloud-upload fa-4x animated rubberBand"></i>
                        <h1 class="modal-title w-100 text-center">Upload Files</h1>
                    </div>
                    <h6 class="w-100 text-center mt-1">{{ lang('Upload documents using upload button, or use drag and drop') }}</h6>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <!-- File/document table -->
                    <div class="files mt-2 mb-2" v-if="files.length">
                        <template v-for="(file, index) in files">
                        <div class="file-box file-box-s d-flex align-items-center">
                            <template v-if="file.edit">
                                <input type="text" class="form-control" v-model="file.title">
                                <div class="file-box-sty icon icon-approval-yes" v-on:click="fileNameSave(index, $event)">{{ lang( 'Save' ) }}</div>
                            </template>
                            <template v-else>
                                <a v-bind:href="file.link" class="file-icon mr-auto" v-on:click="fileNameEdit(index, $event)">{{ file.title }}</a>
                                <div class="file-box-sty icon icon-edit" v-on:click="fileNameEdit(index)">{{ lang( 'Edit' ) }}</div>
                            </template>
                            <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(index)">{{ lang('Delete') }}</div>
                        </div>
                        <div class="progress" v-if="file.progress">
                            <div class="progress-bar info-color" role="progressbar" v-bind:style="{width: file.progress+'%'}"></div>
                        </div>
                        </template>
                    </div>
                    <div class="text-center mb-1">
                        <button type="button" class="btn btn-addon info-color" v-on:click="addFiles">{{ lang('Add files') }}</button>
                        <input ref="fileInput" type="file" style="display:none;" multiple v-on:change="fileInputChange" v-bind:accept="accept">
                    </div>

                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Close') }}</button>
                    <button type="button" class="btn btn-lg btn-save" v-on:click="fileUpload">{{ lang('Upload') }}</button>
                </div>

                <!--Drag and Drop Overlay-->
                <!--<div class="dragdrop">
                    <div class="dragdrop-area d-flex justify-content-center align-items-center">
                        <div class="dragdrop-content file-box-sty text-white">{{ lang('Drop files here') }}
                        </div>
                    </div>
                </div>-->

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
                files: []
            }
        },
        methods: {
            addFiles: function() {
                this.$refs.fileInput.click();
            },
            fileNameEdit: function(index, event) {
                if (event) event.preventDefault();
                if (this.files[index].id) {
                    this.files[index].edit = true;
                }
            },
            fileNameSave: function(index, event) {
                if (event) event.preventDefault();
                let data = {
                    title : this.files[index].title
                };
                axios.patch(this.action + '/'+this.files[index].id, data)
                    .then(function(res) {
                        this.files[index].message = res.message;
                    }.bind(this))
                    .catch(function(err){
                        this.files[index].message = err.message;
                    }.bind(this));
                this.files[index].edit = false;
            },
            fileDelete: function(index) {
                this.files.splice(index, 1);
            },
            fileInputChange: function() {
                _.forEach(this.$refs.fileInput.files, function(file) {
                    this.files.push({
                        title: file.name,
                        link: file.name,
                        file: file,
                        progress: 0,
                        edit: false,
                        message: '',
                        id: 0
                    });

                    this.fileUpload(file, this.files.length-1);
                }.bind(this));
            },
            fileUpload: function(file, index) {
                let data = new FormData();
                data.append('title', file.name);
                data.append('file', file);
                let config = {
                    onUploadProgress : function (progressEvent) {
                        this.files[index].progress = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                    }.bind(this)
                };
                axios.post(this.action, data, config)
                    .then(function (res) {
                        this.files[index].id = res.data.id;
                    }.bind(this))
                    .catch(function (err) {
                        this.files[index].message = err.message;
                        //TODO: more error stuff
                    }.bind(this));
            }
        }
    }
</script>
