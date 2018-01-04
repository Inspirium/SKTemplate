<template>
    <span>{{ value | moment('DD.MM.YYYY.') }}</span>
</template>

<script>
    export default {
        name: "date-cell",
        props:['value']
    }
</script>

<style scoped>

</style>