<template>
    <div>
        <template v-if="loading">
            <div class="loading-motion">
                <div class="spinner"></div>
            </div>
        </template>
        <template v-else-if="!authorized">
            Not authorized
        </template>
        <template v-else>
            <router-view :key="$route.fullPath"></router-view>
        </template>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                loading: true,
                authorized: true
            }
        },
        computed: {},
        methods: {
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
        }
    }
</script>