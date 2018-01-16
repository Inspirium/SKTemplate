<template>
    <div :class="newOrderClass">{{ newOrderValue }}</div>
</template>

<script>
    export default {
        name: "new-order",
        props:['row', 'index'],
        computed: {
            newOrderValue() {
                let val = Number(this.row.new_order);
                console.log(this.row.order + ' ' + val + ' ' + this.index);
                if (val !== (this.index+1)) {
                    val = this.index+1;
                }
                let r =-(Number(val) - Number(this.row.order));
                if (!r) {
                    return '';
                }
                return r;
            },
            newOrderClass() {
                let val = Number(this.row.new_order);
                if (val !== this.index+1) {
                    val = this.index+1;
                }
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