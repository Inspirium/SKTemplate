<template>
    <div class="modal fade" id="modal-comment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <div class="d-flex mx-auto">
                        <i class="fa fa-exclamation-triangle fa-4x animated flash"></i>
                        <h1 class="modal-title w-100 text-center">{{ lang('Comment') }}</h1>
                    </div>
                    <h4 class="w-100 text-center mt-5">{{ lang('Enter your comment') }}</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center mb-1">
                        <div class="row">
                            <div class="col">
                                <textarea class="md-textarea" v-model="comment" v-bind:placeholder="lang('Your comment')"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-save" v-on:click="confirm" data-dismiss="modal">{{ lang('Comment') }}</button>
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('Cancel') }}</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "comment",
        data() {
            return {
                comment: ''
            }
        },
        methods: {
            confirm() {
                this.$emit('commented', this.comment);
                this.comment = '';
            }
        }
    }
</script>