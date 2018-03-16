<template>
    <div class="modal fade" id="centralModalAuthors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                    <div class="d-flex mx-auto">
                        <i class="fa fa-user-circle-o fa-4x mb-1 animated rotateInDownLeft"></i>
                        <h1 class="modal-title w-100 text-center">{{ lang('Add New Author') }}</h1>
                    </div>
                    <h6 class="w-100 text-center">{{ lang('Enter basic information about new Author') }}</h6>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_name" class="form-control" required v-model="first_name">
                                        <label for="form_author_name" class="">{{ lang('First Name') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_lastname" class="form-control" required v-model="last_name">
                                        <label for="form_author_lastname" class="">{{ lang('Last Name') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_title" class="form-control" required v-model="title">
                                        <label for="form_author_title" class="">{{ lang('Formal title') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <input type="text" id="form_author_occupation" class="form-control" required v-model="occupation">
                                        <label for="form_author_occupation" class="">{{ lang('Occupation') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="md-form">
                                <input type="text" id="form_author_work" class="form-control" required v-model="work">
                                <label for="form_author_work" class="">{{ lang('Working in') }}</label>
                            </div>
                            <!-- Textarea -->
                            <div class="md-form mt-3">
                                <textarea id="categorization_note" class="md-textarea" v-model="categorization.note"></textarea>
                                <label for="categorization_note">{{ lang('Note') }}</label>
                            </div>
                            <button class="btn btn-neutral btn-addon mb-2" type="button">{{ lang('Add Additional Information') }}</button>
                        </div>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <spinner-button v-on:button_clicked="saveAuthor" v-on:button_cleanup_success="hideModal"></spinner-button>
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                first_name : '',
                last_name : '',
                occupation : '',
                title : '',
                work : ''
            }
        },
        computed: {},
        methods: {
            saveAuthor() {
                axios.post('/api/author', {
                    first_name : this.first_name,
                    last_name : this.last_name,
                    title : this.title,
                    occupation: this.occupation,
                    work: this.work
                })
                    .then((res) => {
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                        //emit event upstream
                        this.$emit('authorAdded', res.data);
                        //clear data
                        this.first_name = '';
                        this.last_name = '';
                        this.occupation = '';
                        this.title = '';
                        this.work = '';

                    })
                    .catch((err) => {
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                    })
            },
            hideModal() {
                jQuery('#centralModalAuthors').modal('hide');
            }
        }
    }
</script>