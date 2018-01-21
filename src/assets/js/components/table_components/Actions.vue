<template>
    <div>
    <a v-if="value['edit']['link']" class="color-grey" v-bind:href="value['edit']['link']" v-bind:title="lang('Edit')"><i class="fa fa-pencil"></i></a>
    <a class="color-grey" v-if="value['delete']['link']" v-bind:title="lang('Delete')" v-on:click.prevent="deleteWarning"><i class="fa fa-times"></i></a>
    </div>
</template>

<script>
    export default {
        name: "actions",
        props:['value'],
        methods: {
            deleteWarning() {
                $('#modal-warning').modal('show');
                this.$eventHub.on('warningConfirmed', this.delete);
                this.$eventHub.on('warningCanceled', this.cancel);
            },
            delete() {
                axios.delete(this.value['delete']['link'])
                    .then(() => {
                        toastr.success(this.lang('Success'));
                        this.$eventHub.emit('updateQuery');
                    })
                    .catch(() => {
                        toastr.error(this.lang('Action failed'));
                    });
                this.$eventHub.off('warningConfirmed');
                this.$eventHub.off('warningCanceled');
            },
            cancel() {
                this.$eventHub.off('warningConfirmed');
                this.$eventHub.off('warningCanceled');
            }
        }
    }
</script>