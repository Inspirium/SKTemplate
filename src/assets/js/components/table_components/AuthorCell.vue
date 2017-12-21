<template>
    <a v-bind:href="row[field].link" class="text-uppercase file-box-sty"><img class="profile-m mr-2" v-bind:src="row[field].image">{{ row[field].name }}</a>
</template>

<script>
    export default {
        name: "author-cell",
        props: ['row', 'field'],
    }
</script>

<style scoped>

</style>