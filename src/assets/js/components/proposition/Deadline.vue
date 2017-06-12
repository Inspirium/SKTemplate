<template>

</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {},
        methods: {},
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 9});
        }
    }
</script>