<template>
    <button type="button" :class="bClasses" v-on:click="click">{{ lang(title) }}
        <i :class="sClasses"></i>
    </button>
</template>

<script>
    export default {
        name: "spinner-button",
        data() {
            return {
                spinnerType: ' fa-refresh spinner-delay-rotate spinner-loader',
                isSpinnerHidden: ' hide',
                spinnerLoading: ''
            }
        },
        props: {
            classes: {
                type: String,
                default: 'btn btn-lg btn-save'
            },
            title: {
                type: String,
                default: 'Save'
            },
            spinnerClasses: {
                type: String,
                default: 'fa fa-5x fa-fw text-white'
            },
            enabled: {
                type: Boolean,
                default: true
            }
        },
        computed: {
            bClasses() {
                return this.classes + this.spinnerLoading;
            },
            sClasses() {
                return this.spinnerClasses + this.spinnerType + this.isSpinnerHidden;
            }
        },
        methods: {
            click() {
                if (this.enabled) {
                    this.spinnerLoading = ' spinner-loading';
                    this.isSpinnerHidden = '';
                    this.$eventHub.on('BUTTON_LISTEN_FOR_SUCCESS', this.success);
                    this.$eventHub.on('BUTTON_LISTEN_FOR_FAILURE', this.failure);
                    this.$emit('button_clicked');
                }
                else {
                    this.$emit('button_not_enabled')
                }
            },
            success() {

                this.spinnerType = ' fa-check spinner-success';
                setTimeout(() => {
                    this.spinnerType = ' fa-refresh spinner-delay-rotate spinner-loader';
                    this.isSpinnerHidden = ' hide';
                    this.spinnerLoading = '';
                    this.$emit('button_cleanup_success');
                }, 1000);
                this.$eventHub.off('BUTTON_LISTEN_FOR_SUCCESS', this.success);
                this.$eventHub.off('BUTTON_LISTEN_FOR_FAILURE', this.failure);
            },
            failure() {
                this.spinnerType = 'fa-times spinner-fail';
                setTimeout(() => {
                    this.spinnerType = ' fa-refresh spinner-delay-rotate spinner-loader';
                    this.isSpinnerHidden = ' hide';
                    this.spinnerLoading = '';
                    this.$emit('button_cleanup_failure');
                }, 1000);
                this.$eventHub.off('BUTTON_LISTEN_FOR_SUCCESS', this.success);
                this.$eventHub.off('BUTTON_LISTEN_FOR_FAILURE', this.failure);
            }
        }
    }
</script>

<style scoped>

</style>