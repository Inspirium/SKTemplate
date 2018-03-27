<template>
    <div v-if="video">
        <!--Help-->
        <a href="#help-content" class="help"><i class="fa fa-3x fa-question-circle"></i> Trebaš pomoć</a>
        <div id="help-content">
            <iframe width="630" height="394" v-bind:src="video" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VideoTutorial",
        data() {
            return {
                videos: {
                    'edit/basic_data': 'https://www.useloom.com/embed/7c0434f775b8417ca19a932f65cf3a5c'
                }
            }
        },
        computed: {
            video() {
                let path = this.$route.path.split('/');
                let length = path.length;
                path = path[length-2] + '/' + path[length-1];
                if (this.videos[path]) {
                    return this.videos[path];
                }
                return false;
            }
        }
    }
</script>

<style scoped>

</style>