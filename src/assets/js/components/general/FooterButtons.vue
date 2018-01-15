<template>
    <div v-if="save || assign || assignDocuments || approval || deleteRestore">
    <div class="btn-footer mt-4 mb-5 flex-column flex-md-row d-flex p-2">
        <spinner-button v-if="save" v-on:button_clicked="saveProposition"></spinner-button>
        <button v-if="assign" class="btn btn-lg btn-assign btn-assign-icon " v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
        <button v-if="assignDocuments" class="btn btn-lg btn-assign btn-assign-icon" v-on:click="assignDocumentModalOpen">{{ lang('Assign to...') }}</button>
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

        <proposition-approval-modal v-if="approval"></proposition-approval-modal>
        <assign-proposition v-if="assign"></assign-proposition>
        <warning-modal></warning-modal>
        <warning-not-saved-modal v-on:warning="$emit('warningSaved')"></warning-not-saved-modal>
        <assign-documents v-if="assignDocuments"></assign-documents>
    </div>
</template>
<script>
    export default {
        name: "proposition-footerbuttons",
        props: {
            save: {
                type: Boolean,
                default: false
            },
            assign: {
                type: Boolean,
                default: false
            },
            assignDocuments: {
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
                cancel: false
            }
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
	            this.$store.dispatch('proposition/' + this.$route.meta.save + '/saveData', this.$route.params.id)
                    .then(() => {
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$store.commit('editedFalse');
                    })
                    .catch((err) => {
                        toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                    });
            },
            assignModalOpen: function() {
                jQuery('#centralModalAssign').modal('show');
            },
            assignDocumentModalOpen: function() {
                jQuery('#assign-documents').modal('show');
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