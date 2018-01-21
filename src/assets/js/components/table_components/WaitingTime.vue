<template>
    <span>{{ time }}</span>
</template>

<script>
    export default {
        name: "waiting-time",
        props:['value', 'row'],
        computed: {
            time() {
                if (!this.value) {
                    return '';
                }
                if (this.row.status === 'completed') {
                    return this.$options.filters.moment(this.value, "from", this.row.updated_at, true);
                }
                else {
                    return this.$options.filters.moment(this.value, "from", true);
                }
            }
        }
    }
</script>