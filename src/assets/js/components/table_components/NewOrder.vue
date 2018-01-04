<template>
    <div :class="newOrderClass">{{ newOrderValue }}</div>
</template>

<script>
    export default {
        name: "new-order",
        props:['row', 'nested'],
        computed: {
            newOrderValue() {
                let val = this.row.new_order;

                let r =-(Number(val) - Number(this.row.order));
                if (!r) {
                    return '';
                }
                return r;
            },
            newOrderClass() {
                let val = this.row.new_order;
                let number = Number(val) - Number(this.row.order);
                if (number === 0) {
                    return 'new-order';
                }
                return (number > 0) ? 'new-order new-order--down' : 'new-order new-order--up';

            },
        }
    }
</script>

<style scoped>

</style>