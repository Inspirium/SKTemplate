<template>
    <div>
    <div class="btn-footer mt-4 mb-5 flex-column flex-md-row d-flex p-2">
        <button v-if="save" class="btn btn-lg btn-save" v-on:click="saveProposition">{{ lang('Save') }}
            <i v-bind:class="['fa', 'fa-5x', 'fa-fw', 'text-white', spinnerType, isSpinnerHidden]"></i>
        </button>
        <button v-if="assign" class="btn btn-lg btn-assign btn-assign-icon " v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
        <button v-if="approval && canSendForApproval" class="btn btn-lg btn-save" v-on:click="sendForApproval" >{{ lang('Send on Approval') }}</button>
        <template v-if="deleteRestore">
            <template v-if="$store.state.proposition.deleted_at">
                <button type="button" class="btn btn-lg btn-cancel" v-on:click="propRestore">{{ lang('Restore') }}</button>
            </template>
            <template v-else>
                <button type="button" class="btn btn-lg btn-cancel" v-on:click="warningModalOpen">{{ lang('Delete') }}</button>
            </template>
        </template>
    </div>

        <proposition-approval-modal></proposition-approval-modal>
        <assign-proposition></assign-proposition>
        <warning-modal></warning-modal>
        <warning-not-saved-modal v-on:warning="$emit('warningSaved')"></warning-not-saved-modal>
    </div>
</template>
<script>
    import AssignProposition from '../../modals/AssignProposition'
    import WarningModal from '../../modals/WarningModal'
    import WarningNotSavedModal from "../../modals/WarningNotSavedModal";
    import PropositionApprovalModal from '../../modals/PropositionApprovalModal'

    export default {
        props: {
            save: {
                type: Boolean,
                default: false
            },
            assign: {
                type: Boolean,
                default: false
            },
            approval: {
                type: Boolean,
                default: false
            },
            deleteRestore: {
                type: Boolean,
                default: false
            }
        },
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
            AssignProposition, WarningModal, PropositionApprovalModal
        },
        computed: {
            canSendForApproval() {
                return this.$store.state.proposition.start.status !== 'requested' && this.$store.state.proposition.start.status !== 'approved' && !this.$store.state.proposition.deleted_at;
            }
        },
        methods: {
            //TODO: move to store
            propDelete: function() {
                axios.delete('/api/proposition/'+this.$route.params.id)
                    .then((res) => {
                        this.$router.push('/propositions');
                    });
            },
            propRestore: function() {
                axios.post('/api/proposition/'+this.$route.params.id+'/restore')
                    .then((res) => {
                        this.$router.push('/propositions');
                    });
            },
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
                        }, 1000);
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$store.commit('editedFalse');
                    })
                    .catch((err) => {
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
            sendForApproval() {
                jQuery('#propositionApprovalModal').modal('show')
            },
            warningModalOpen() {
                this.$store.dispatch('proposition/listenForWarning', {vue: this, data: {}});
                jQuery('#modal-warning').modal('show');
            }
        }
    }
</script>