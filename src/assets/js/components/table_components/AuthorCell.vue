<template>
    <a v-bind:href="path_link" class="text-uppercase file-box-sty"><img class="profile-m mr-2" v-bind:src="path_image">{{ path_name }}</a>
</template>

<script>
    import _ from 'lodash'

    export default {
        name: "author-cell",
        props: ['row', 'field'],
        computed: {
            path_link() {
                return _.get(this.row, _.toPath('['+this.field+'].link'));
            },
            path_image() {
                return _.get(this.row, _.toPath('['+this.field+'].image'));
            },
            path_name() {
                return _.get(this.row, _.toPath('['+this.field+'].name'));
            }
        }
    }
</script>

<style scoped>

</style>