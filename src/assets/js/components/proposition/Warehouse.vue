<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Završni dokument') }}</div>
        <div class="justify-content-center d-flex mb-4" v-if="validated">
            <spinner-button v-on:button_clicked="sendToWarehouse" v-on:button_cleanup_success="redirect" v-bind:title="'Recieved in Warehouse'" v-bind:classes="'btn btn-l btn-neutral'"></spinner-button>
        </div>
        <div class="justify-content-center d-flex mb-4" v-else>
            <ul>
                <li v-for="field in fields"><router-link v-bind:to="field.link">{{ lang(field.title )}}</router-link></li>
            </ul>
        </div>
    </div>

</template>
<script>
    export default {
        data: function () {
            return {
                validated: false,
                fields: []
            }
        },
        computed: {},
        methods: {
            sendToWarehouse() {
                axios.post('/api/proposition/'+this.$route.params.id+'/warehouse')
                    .then((res)=>{
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                        toastr.success(this.lang('Uspješno obavljeno'));
                    })
                    .catch(() => {
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                        toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                    })
            },
            redirect() {
                this.$router.push('/propositions');
            }
        },
        mounted() {
            axios.get('/api/proposition/'+this.$route.params.id+'/warehouse')
                .then((res) => {
                    this.validated = true;
                })
                .catch((err) => {
                    this.validated = false;
                    this.fields = err.response.data.validated
                })
        }
    }
</script>