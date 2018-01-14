<template>
    <div v-bind:class="value.className">{{ lang(value.title) }}</div>
</template>

<script>
    export default {
        name: "task-type",
        props: ['value'],
    }
</script>

<style scoped>

</style>