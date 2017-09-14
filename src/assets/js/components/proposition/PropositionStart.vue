<template>
    <div>
        <!-- Header -->
        <div class="profile-head pb-2 row">
            <div class="col-md-4">
                <a href="#" v-if="proposition.owner">
                    <img class="profile-m-2 mr-1 float-left" v-bind:src="proposition.owner.image">
                    <h6 class="white-label">{{ lang('Assigner') }}</h6>
                    <h3 class="mb-1 text-white">{{ proposition.owner.name }}</h3>
                </a>
            </div>
            <div class="col-md-4">
                <h6 class="white-label">{{ lang('Starting Date') }}</h6>
                <h3 class="mb-1 text-white">{{ proposition.created_at.date | moment('DD.MM.YYYY.') }}</h3>
            </div>
            <div class="col-md-4">
                <h6 class="white-label">{{ lang('Total Time') }}</h6>
                <h3 class="mb-1 text-white">{{ proposition.created_at.date | moment("from", true)  }}</h3>
            </div>
        </div>

        <!-- Notification -->
       <div class="notification-bar btn-attention d-flex flex-md-row flex-column justify-content-start align-items-center mt-2">
            <div class="file-box-sty text-white btn-clock-icon">{{ lang('Task Sent') }}</div>
            <div class="file-box-sty text-white">{{ lang('Publisher Director') }}</div>
            <div class="file-box-sty text-white">{{ lang('25.11.2017.') }}</div>
            <div class="file-box-sty text-white">{{ lang('Waiting time') }} : 2 days 15 hours</div>
        </div>

        <!-- Buttons -->
        <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
            <button data-toggle="tooltip" v-bind:title="lang('You need to finish your proposition first')" type="submit" class="btn btn-lg btn-save" disabled>{{ lang('Send on Approval') }}</button>
            <template v-if="proposition.deleted_at">
                <button type="button" class="btn btn-lg btn-cancel" v-on:click="propRestore">{{ lang('Restore') }}</button>
            </template>
            <template v-else>
                <button type="button" class="btn btn-lg btn-cancel" v-on:click="propDelete">{{ lang('Delete') }}</button>
            </template>


        </div>
        <!--/. Footer buttons -->
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
            }
        },
        computed: {
            proposition() {
                return this.$deepModel('proposition.proposition');
            }
        },
        methods: {
            propDelete: function() {
                axios.delete('/api/proposition/'+this.proposition.id)
                    .then((res) => {
                        window.location.href = '/propositions';
                    });
            },
            propRestore: function() {
                axios.post('/api/proposition/restore/'+this.proposition.id)
                    .then((res) => {
                        window.location.href = '/proposition/'+this.proposition.id+'/start';
                    });
            }
        },
        mounted: function() {
            /*if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id});
            }*/
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 10});
        }
    }
</script>