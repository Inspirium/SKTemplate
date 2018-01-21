<template>
    <div class="modal fade" id="modal-warning" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h1 class="modal-title w-100 text-center">{{ lang('Warning') }}</h1>
                    </div>
                    <h4 class="w-100 text-center mt-5">{{ lang('Are you sure you want to proceed?') }}</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center mb-1">
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-save" v-on:click="emitWarningConfirmation" data-dismiss="modal">{{ lang('Yes') }}</button>
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal" v-on:click="emitWarningCancel">{{ lang('No') }}</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "warning-modal",
        methods: {
            emitWarningConfirmation() {
                this.$eventHub.emit('warningConfirmed');
                this.$emit('warningConfirmed')
            },
            emitWarningCancel() {
                this.$emit('warningCanceled');
                this.$eventHub.emit('warningCanceled');
            }
        }
    }
</script>
