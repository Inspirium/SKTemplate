<template>
    <div>
        <div class="page-name-xl mb-2 mt-3">{{ lang( 'Books' ) }}</div>

    <datatable v-bind="$data"></datatable>
    </div>
</template>

<script>
    import components from '../table_components'

    export default {
        name: "books",
        components,
        data() {
            return {
                supportNested: true,
                tblClass: 'table',
                columns: [
                    {title: '#', field: 'id', sortable: true},
                    {
                        title: this.lang('Title'),
                        field: 'title',
                        sortable: true,
                        tdComp: 'TitleCell',
                        tdClass: 'table-title'
                    },
                    {
                        title: this.lang('Editor'),
                        field: 'proposition.owner',
                        sortable: true,
                        tdComp: 'AuthorCell'
                    },
                    {
                        title: this.lang('Printed'),
                        field: 'created_at',
                        tdComp: 'DateCell'
                    }
                ],
                data: [],
                total: 0,
                PageSizeSelect: [50],
                query: {},
                HeaderSettings: false
            }
        },
            watch: {
                'query': {
                    handler() {
                        axios.post('/api/books', this.query)
                            .then((res) => {
                                this.data = res.data.rows;
                                this.total = res.data.total;
                            })
                    },
                    deep: true
                }
            }

    }
</script>

<style scoped>

</style>