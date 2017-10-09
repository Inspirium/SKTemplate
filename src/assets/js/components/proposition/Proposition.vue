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
            if (this.$route.params.id) {
                this.$store.dispatch('proposition/initData', {id: this.$route.params.id});
            }
        }
    }
</script>