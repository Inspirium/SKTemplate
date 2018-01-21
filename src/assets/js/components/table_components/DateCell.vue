<template>
    <span>{{ time }}</span>
</template>

<script>
    export default {
        name: "date-cell",
        props:['value'],
        computed: {
            time() {
                if (!this.value) {
                    return '';
                }
                return this.$options.filters.moment(this.value, "DD.MM.YYYY.");
            }
        }
    }
</script>

<style scoped>

</style>