<template>
    <span>{{ time }}</span>
</template>

<script>
    export default {
        name: "deadline",
        props:['value'],
        computed: {
            time() {
                if (!this.value) {
                    return '';
                }

                return this.$options.filters.moment(this.value, "from", "now");
            }
        }
    }
</script>