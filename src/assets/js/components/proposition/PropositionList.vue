<template>
    <datatable v-bind:source="rows" v-bind:filterable="false">
        <datatable-column v-for="c in columns" v-bind:id="c.id" v-bind:label="c.label" v-bind:key="c.id"></datatable-column>
    </datatable>
</template>
<script>


    export default {
        data: function () {
            return {
                columns: [
                    {label:'id', id:'id'}
                ],
                rows: [
                    {id:1}
                ]
            }
        },
        computed: {},
        methods: {}
    }
</script>