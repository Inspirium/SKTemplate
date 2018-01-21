<template>
    <div class="content">
        <div class="page-name-xl mb-2 mt-3">{{ lang( 'Employees' ) }}</div>
        <div class="md-form input-group search-big">
            <input type="search" class="form-control" v-model="query.filter" v-bind:placeholder="lang('Search...')">
        </div>

        <div class="btn-header d-flex p-2">
            <router-link to="/human_resources/employee/new" class="btn btn-lg btn-blank"><i class="fa fa-plus left"></i>{{ lang( 'Add New Employee' ) }}</router-link>
        </div>

    <datatable v-bind="$data"></datatable>
        <warning-modal></warning-modal>
    </div>
</template>

<script>
    import components from '../table_components'

    export default {
        name: "employees",
        components,
        data() {
            return {
                supportNested: true,
                tblClass: 'table',
                columns: [
                    {title: '#', field: 'id', sortable: true},
                    {
                        title: this.lang('Image'),
                        field: 'image',
                        tdComp: 'ImageCell',
                    },
                    {
                        title: this.lang('Name'),
                        field: 'name',
                        sortable: true,
                        tdComp: 'TitleCell',
                        tdClass: 'table-title'
                    },
                    {
                        title: this.lang('Department'),
                        field: 'department_name',
                    },
                    {
                        title: this.lang('Phone'),
                        field: 'phone_merged'
                    },
                    {
                        title: this.lang('Mobile'),
                        field: 'mobile_merged'
                    },
                    {
                        title: this.lang('Room'),
                        field: 'room'
                    },
                    {
                        title: this.lang('Actions'),
                        tdComp: 'Actions',
                        field: 'links'
                    }
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
                axios.post('/api/human_resources/employees', this.query)
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