<template>
    <div>
    <div class="btn-footer mt-4 mb-5 flex-column flex-md-row d-flex p-2">
        <button class="btn btn-lg btn-save" v-on:click="saveProposition">{{ lang('Save') }}</button>
        <button class="btn btn-lg btn-assign btn-assign-icon" v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
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
                cancel: false
            }
        },
        components: {
            WarningNotSavedModal,
            AssignProposition, WarningModal
        },
        methods: {
            saveProposition: function() {
                this.$store.dispatch('proposition/' + this.$route.meta.save + '/saveData', this.$route.params.id)
                    .then(() => {
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$store.commit('editedFalse');
                    })
                    .catch(() => {
                        toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
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