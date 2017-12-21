<template>
    <a v-bind:href="row.link">{{ value?value:lang('untitled') }}</a>
</template>

<script>
    export default {
        props: ['row', 'nested', 'field', 'value'],
    }
</script>

<style scoped>

</style>