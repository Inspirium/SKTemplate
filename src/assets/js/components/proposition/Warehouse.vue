<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Završni dokument') }}</div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-l btn-neutral" v-on:click="sendToWarehouse">{{ lang('Recieved in Warehouse') }}
                <i v-bind:class="['fa', 'fa-5x', 'fa-fw', 'text-white', spinnerType, isSpinnerHidden]"></i>
            </button>
        </div>
    </div>

</template>
<script>
    export default {
        data: function () {
            return {
                spinnerType: 'fa-refresh spinner-delay-rotate spinner-loader',
                isSpinnerHidden: 'hide'
            }
        },
        computed: {},
        methods: {
            sendToWarehouse() {
                let saveButton = jQuery(event.target);
                saveButton.toggleClass('spinner-loading-blue');
                this.isSpinnerHidden = '';
                axios.post('/api/proposition/'+this.$router.params.id+'/warehouse')
                    .then((res)=>{
                        this.spinnerType = 'fa-check spinner-success';
                        setTimeout(() => {
                            this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                            this.isSpinnerHidden  ='hide';
                            saveButton.toggleClass( "spinner-loading-blue" );
                            window.location.href = res.data.link;
                        }, 1000)
                        toastr.success(this.lang('Uspješno obavljeno'));

                    })
                    .catch(() => {
                        this.spinnerType = 'fa-times spinner-fail';
                        toastr.success(this.lang('Došlo je do problema. Pokušajte ponovno'));
                        setTimeout(() => {
                            this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                            this.isSpinnerHidden  ='hide';
                            saveButton.toggleClass( "spinner-loading-blue" );
                        }, 1000)
                    })
            }
        }
    }
</script>