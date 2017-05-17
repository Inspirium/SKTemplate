<template>
    <div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4 class="modal-title w-100">{{ lang('Upload File') }}</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
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
                    <div class="progress" v-if="progress">
                        <div class="progress-bar bg-success" role="progressbar" v-bind:style="{width: progress+'%'}"></div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ lang('Close') }}</button>
                    <button type="button" class="btn btn-primary" v-on:click="fileUpload">{{ lang('Upload') }}</button>
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
                progress: 0,
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
