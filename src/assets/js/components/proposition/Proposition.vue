<template>
    <div>
        <template v-if="loading">
            <div class="loading-motion">
                <div class="spinner"></div>
            </div>
        </template>
        <template v-else-if="notAvailable">
            <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                <i class="fa fa-exclamation-triangle fa-5x mb-3 color-nav-sub" aria-hidden="true"></i>
                <h1 class="text-center mt-5">{{ lang('This page in not available because there is data missing.') }}</h1>
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

            <footer-buttons v-bind="buttons" v-on:warningSaved="continueNavigation"></footer-buttons>
        </template>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                loading: true,
                authorized: true,
                next: null,
                notAvailable: false
            }
        },
        computed: {
            buttons() {
                if (!this.$route.meta.save) {
                    return {}
                }
                if (this.$route.meta.save === 'start') {
                    return {
                        save: true,
                        assign: true,
                        deleteRestore: true,
                        approval: true,
                        forceDelete: true
                    }
                }
                if (this.$route.meta.dir) {
                    return {
                        save: true,
                        assignDocuments: true
                    }
                }
                return {
                    save: true,
                    assign: true
                }
            }
        },
        methods: {
            continueNavigation() {
                this.$store.commit('editedFalse');
            },
            loadStep() {
                this.loading = true;
                //we are moving to other step
                //load step data
                this.$store.dispatch('proposition/getData')
                    .then(() => {
                        this.loading = false;
                        this.authorized = true;
                        this.notAvailable = false;
                        //for screen that need special loading
                        setTimeout(() => {
                            $('.mdb-select').material_select('destroy');
                            $('.mdb-select').material_select();
                            $('.datepicker1').pickadate({
                                format: 'dd. mm. yyyy.',
                                onSet: (context) => {
                                    let date = new Date(context.select);
                                    date = this.$options.filters.moment(date, 'DD. MM. YYYY.');
                                    this.$store.commit('proposition/deadline/saveDate', date);
                                }
                            });
                        }, 200);
                    })
                    .catch((err) => {
                        if (err === 403) {
                            this.loading = false;
                            this.authorized = false;
                            this.notAvailable = false;
                        }
                        else {
                            this.loading = false;
                            this.authorized = true;
                            this.notAvailable = true;
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
            if (this.$route.path === '/proposition/start') {
                this.$store.dispatch(('proposition/initClear'))
                    .then(() => {
                        this.loading = false;
                    });
            }
            else if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/initData')
                    .then(this.loadStep());
            }
            else {
                this.$router.push({path: '/proposition/start'})
            }
        },
    }
</script>