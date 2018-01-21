<template>
    <img class="profile-m mr-2" v-bind:src="value">
</template>

<script>
    import _ from 'lodash'

    export default {
        name: "image-cell",
        props: ['value']
    }
</script>

<style scoped>

</style>