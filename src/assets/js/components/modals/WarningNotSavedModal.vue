<template>
    <div class="modal fade" id="modal-warning-not-saved" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <h4 class="w-100 text-center mt-5">{{ lang('Data not saved, do you want to continue?') }}</h4>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="text-center mb-1">
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-save" v-on:click="$emit('warning')" data-dismiss="modal">{{ lang('Yes') }}</button>
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">{{ lang('No') }}</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "warning-not-saved-modal"
    }
</script>