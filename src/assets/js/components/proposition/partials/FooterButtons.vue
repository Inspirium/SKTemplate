<template>
    <div>
    <div class="btn-footer mt-4 mb-5 flex-column flex-md-row d-flex p-2">
        <button id="save-btn" class="btn btn-lg btn-save" v-on:click="saveProposition">{{ lang('Save') }}
            <i class="fa fa-refresh fa-5x fa-fw spinner-delay-rotate spinner-loader text-white hide"></i>
            <i class="fa fa-check fa-5x fa-fw text-white spinner-success hide"></i>
            <i class="fa fa-times fa-5x fa-fw text-white spinner-fail hide"></i>
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
                cancel: false
            }
        },
        components: {
            WarningNotSavedModal,
            AssignProposition, WarningModal
        },
        methods: {
            saveProposition: function() {
                let saveButton = document.getElementById('save-btn');
                saveButton.setAttribute('style', 'color: #92C100 !important; position: relative');
                $( "i.spinner-loader" ).toggleClass( "hide" );
                
	            this.$store.dispatch('proposition/' + this.$route.meta.save + '/saveData', this.$route.params.id)
                    .then(() => {
                        saveButton.setAttribute('style', 'color: #FFFFFF !important');
                        $( "i.spinner-loader" ).removeClass( "spinner-delay-in" ).addClass( "spinner-delay-out" );
                        $( "i.spinner-success" ).toggleClass( "hide" );

                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$store.commit('editedFalse');
                    })
                    .catch(() => {
                        toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                        $( "i.spinner-loader" ).removeClass( "spinner-delay-in" ).addClass( "spinner-delay-out" );
                        $( "i.spinner-fail" ).toggleClass( "hide" );
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