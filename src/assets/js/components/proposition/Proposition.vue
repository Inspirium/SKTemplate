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
            if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id});
            }
        }
    }
</script>