<template>
    <div>
        <template v-if="loading">
            <div class="loading-motion">
                <div class="spinner"></div>
            </div>
        </template>
        <template v-else-if="!authorized">
            <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                <i class="fa fa-exclamation-triangle fa-5x mb-3 color-nav-sub" aria-hidden="true"></i>
                <h1 class="text-center mt-5">{{ lang('You are not authorized to view this page') }}</h1>
                <h5 class="text-center mt-2">{{ lang("Contact proposition's author to gain access") }}</h5>
            </div>
        </template>
        <template v-else>
            <router-view :key="$route.fullPath"></router-view>

            <proposition-footer-buttons v-on:warning="fileDelete(false)" v-on:warningSaved="continueNavigation"></proposition-footer-buttons>
        </template>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                loading: true,
                authorized: true,
                next: null
            }
        },
        computed: {},
        methods: {
            continueNavigation() {
                this.$store.commit('editedFalse');
                //this.$store.state.next();
            },
            loadStep() {
                this.loading = true;
                //we are moving to other step
                //load step data
                this.$store.dispatch('proposition/getData')
                    .then(() => {
                        this.loading = false;
                        this.authorized = true;
                        //for screen that need special loading
                        setTimeout(() => {
                            $('.mdb-select').material_select('destroy');
                            $('.mdb-select').material_select();
                        }, 200);
                    })
                    .catch((err) => {
                        if (err === 403) {
                            this.loading = false;
                            this.authorized = false;
                        }
                    });
            }
        },
        watch: {
            '$route' (to, from) {
                if (to.matched[0].name === 'proposition') {
                    this.loadStep();
                }
            }
        },
        mounted() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/initData')
                    .then(this.loadStep());
            }
            else {
                this.$router.push({path: '/proposition/start'})
            }
        },
    }
</script>