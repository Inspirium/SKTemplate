<template>
    <div>
        <router-view :key="$route.fullPath"></router-view>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {},
        methods: {},
        mounted() {
            if (this.$route.params.id != 0) {
                this.$store.dispatch('proposition/initData', {id: this.$route.params.id});
            }
            else {
                this.$router.push({path: '/proposition/start'})
            }
        }
    }
</script>