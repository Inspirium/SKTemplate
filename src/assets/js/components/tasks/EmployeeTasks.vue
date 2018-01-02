<template>
    <datatable v-bind="$data"></datatable>
</template>

<script>
    import TitleCell from '../table_components/TitleCell'
    import AuthorCell from '../table_components/AuthorCell'
    import WaitingTime from '../table_components/WaitingTime'
    import Handle from '../table_components/Handle'
    export default {
        name: "employee-tasks",
        props: ['employee'],
        data() {
            return {
                supportNested: true,
                tblClass: 'table',
                columns: [
                    {
                        title: '',
                        field: '',
                        sortable: false,
                        tdComp: Handle
                    },
                    {title: '#', field: 'order', sortable: true},
                    {title: 'new', field: 'new_order', sortable: true},
                    {
                        title: this.lang('Task'),
                        field: 'name',
                        sortable: true,
                        tdComp: TitleCell,
                        tdClass: 'table-title'
                    },
                    {
                        title: this.lang('Task Type'),
                        field: 'type',
                        sortable: true
                    },
                    {
                        title: this.lang('Assigner'),
                        field: 'owner',
                        tdComp: AuthorCell
                    },
                    {
                        title: this.lang('Created'),
                        field: 'created_at',
                        sortable: true
                    },
                    {
                        title: this.lang('Deadline'),
                        field: 'deadline',
                        sortable: true
                    },
                ],
                data: [],
                total: 0,
                query: {},
                HeaderSettings: false,
                draggableOptions: {
                    disabled: false,
                    handle: '.icon-handle'
                }
            }
        },
        watch: {
            'query': {
                handler () {
                    axios.post('/api/tasks/employee/'+this.employee.id)
                        .then((res) => {
                            this.data = res.data.tasks;
                            this.total = res.data.total;
                        })
                },
                deep: true
            },
        }
    }
</script>

<style scoped>

</style>