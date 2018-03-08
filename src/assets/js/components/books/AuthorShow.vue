<template>
    <div class="content">
        <div class="page-name-xl mb-2 mt-3">{{ lang( 'Authors' ) }}</div>

    </div>
</template>

<script>
    export default {
        name: "AuthorShow",
        data() {
            return {
                user: false
            }
        },
        mounted() {
            axios.get('/api/author/'+this.$route.params.id)
                .then((res) => {
                    this.user = res.data;
                });
        }
    }
</script>