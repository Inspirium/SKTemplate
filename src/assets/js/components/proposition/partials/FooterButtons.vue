<template>
    <div>
    <div class="btn-footer mt-4 mb-5 flex-column flex-md-row d-flex p-2">
        <button class="btn btn-lg btn-save" v-on:click="saveProposition">{{ lang('Save') }}
            <i v-bind:class="['fa', 'fa-5x', 'fa-fw', 'text-white', spinnerType, isSpinnerHidden]"></i>
        </button>
        <button class="btn btn-lg btn-assign btn-assign-icon " v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
    </div>
        <assign-proposition></assign-proposition>
        <warning-modal v-on:warning="$emit('warning')"></warning-modal>
        <warning-not-saved-modal v-on:warning="$emit('warningSaved')"></warning-not-saved-modal>
    </div>
</template>
<script>
    import AssignProposition from '../../modals/AssignProposition'
    import WarningModal from '../../modals/WarningModal'
    import WarningNotSavedModal from "../../modals/WarningNotSavedModal";

    export default {
        data: function () {
            return {
                employee: '',
                e_suggestions: [],
                department: '',
                d_suggestions: [],
                employees: [],
                description: '',
                date: '',
                access: 0,
                priority: 0,
                departments: [],
                cancel: false,
                spinnerType: 'fa-refresh spinner-delay-rotate spinner-loader',
                isSpinnerHidden: 'hide'
            }
        },
        components: {
            WarningNotSavedModal,
            AssignProposition, WarningModal
        },
        methods: {
            saveProposition: function(event) {
                let saveButton = jQuery(event.target);
                saveButton.toggleClass('spinner-loading');
                this.isSpinnerHidden = '';

	            this.$store.dispatch('proposition/' + this.$route.meta.save + '/saveData', this.$route.params.id)
                    .then(() => {
                        this.spinnerType = 'fa-check spinner-success';
                        setTimeout(() => {
                            this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                            this.isSpinnerHidden  ='hide';
                            saveButton.toggleClass( "spinner-loading" );
                        }, 1000)
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$store.commit('editedFalse');
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
            },
            assignModalOpen: function() {
                jQuery('#centralModalAssign').modal('show');
            },
        },
        mounted: function() {
        },

    }
</script>