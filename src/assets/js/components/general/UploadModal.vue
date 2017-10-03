<template>
    <div class="modal fade" v-bind:id="id" tabindex="-1" role="dialog" aria-hidden="true" v-on:dragenter.prevent="fileDragEnter" v-on:drop.prevent="fileDrop($event)">
        <div class="modal-dialog" role="document" v-on:dragenter.prevent="fileDragEnter">
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
                        <div v-for="(file, index) in files" v-bind:key="file.id">
                        <div class="file-box file-box-s d-flex align-items-center">
                            <template v-if="file.edit">
                                <input type="text" class="form-control" v-model="file.title">
                                <div class="file-box-sty icon icon-approval-yes" v-on:click="fileNameSave(file.id, $event)">{{ lang( 'Save' ) }}</div>
                            </template>
                            <template v-else>
                                <a v-bind:href="file.link" class="file-icon mr-auto" v-on:click="fileNameEdit(file.id, $event)">{{ file.title }}</a>
                                <div class="file-box-sty icon icon-edit" v-on:click="fileNameEdit(file.id)">{{ lang( 'Edit' ) }}</div>
                            </template>
                            <div class="file-box-sty icon icon-cancel" v-on:click="fileDelete(file.id)">{{ lang('Delete') }}</div>
                        </div>
                        <div class="progress" v-if="file.progress">
                            <div class="progress-bar info-color" role="progressbar" v-bind:style="{width: file.progress+'%'}"></div>
                        </div>
                        </div>
                    </div>
                    <div class="text-center mb-1">
                        <button type="button" class="btn btn-addon info-color" v-on:click="addFiles">{{ lang('Add files') }}</button>
                        <input ref="fileInput" type="file" style="display:none;" multiple v-on:change="fileInputChange" v-bind:accept="accept">
                    </div>

                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-cancel" v-on:click="closeModal">{{ lang('Close') }}</button>
                </div>

                <!--Drag and Drop Overlay-->
                <div class="dragdrop" v-if="showOverlay" v-on:dragover.prevent>
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
            disk: String,
            dir: String,
            accept: String,
            isFinal: {
                type: Boolean,
                default: false
            },
            id: {
                type: String,
                default: 'upload-modal'
            }
        },
        data: function() {
            return {
                files: [],
                showOverlay: false
            }
        },
        methods: {
            addFiles: function() {
                this.$refs.fileInput.click();
            },
            fileNameEdit: function(id, event) {
                if (event) event.preventDefault();
                _.forEach(this.files, (f, index) => {
                    if (f.id === id) {
                        this.$set(this.files[index], 'edit', true);
                    }
                })
            },
            fileNameSave: function(id, event) {
                if (event) event.preventDefault();
                _.forEach(this.files, (f, index) => {
                    if (f.id === id) {
                        this.$emit('fileNameSave', { file: f, isFinal: this.isFinal });
                        this.$set(this.files[index], 'edit', false);
                    }
                });

            },
            fileDelete: function(index) {
                this.$emit('fileDelete', this.files[index].id);
                this.files.splice(index, 1);
            },
            fileInputChange: function() {
                _.forEach(this.$refs.fileInput.files, (file, index) => {
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
                    if (index === this.$refs.fileInput.files.length-1) {
                        this.$refs.fileInput.value = [];
                    }
                });
            },
            fileUpload: function(file, index) {
                let data = new FormData();
                data.append('title', file.name);
                data.append('file', file);
                data.append('disk', this.disk);
                data.append('dir', this.dir);
                let config = {
                    onUploadProgress : function (progressEvent) {
                        this.files[index].progress = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                    }.bind(this)
                };
                axios.post(this.action, data, config)
                    .then((res) => {
                        this.$emit('fileAdd', { file: res.data.data, isFinal: this.isFinal });
                        this.$set(this.files, index, res.data.data);
                    })
                    .catch( (err) => {
                        this.files[index].message = err.message;
                        //TODO: more error stuff
                    });
            },
            fileDragEnter: function() {
                this.showOverlay = true;
            },
            fileDragLeave: function () {
                this.showOverlay = false;
            },
            fileDrop: function(event) {
                _.forEach(event.dataTransfer.files, function(file) {
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
                this.showOverlay = false;
            },
            closeModal() {
                this.files = [];
                jQuery('#'+id).modal('hide');
            }
        }
    }
</script>
