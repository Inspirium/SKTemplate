<template>
    <div class="content">
        <div class="page-name-xl mb-2 mt-3">{{ lang( 'Authors' ) }}</div>
        <div class="md-form input-group search-big">
            <input type="search" class="form-control" v-model="query.filter" v-bind:placeholder="lang('Search...')">
        </div>

    <datatable v-bind="$data"></datatable>
        <warning-modal></warning-modal>
    </div>
</template>

<script>
    import components from '../table_components'

    export default {
        name: "authors-related",
        components,
        data() {
            return {
                supportNested: true,
                tblClass: 'table',
                columns: [
                    {title: '#', field: 'id', sortable: true},
                    {
                        title: this.lang('Proposition'),
                        field: 'project_name',
                        sortable: true,
                        tdComp: 'TitleCell',
                    },
                ],
                data: [],
                total: 0,
                PageSizeSelect: [50],
                query: {filter: '', limit: 50},
                HeaderSettings: false
            }
        },
        watch: {
            'query': {
                handler() {
                    this.queryHandler();
                },
                deep: true
            }
        },
        methods: {
            queryHandler() {
                axios.post('/api/authors/'+this.$route.params.id+'/related/propositions', this.query)
                    .then((res) => {
                        this.data = res.data.rows;
                        this.total = res.data.total;
                    })
            }
        },
        created() {
            this.$eventHub.on('updateQuery', this.queryHandler);
        },
        beforeDestroy() {
            this.$eventHub.off('updateQuery', this.queryHandler);
        }
    }
</script>
