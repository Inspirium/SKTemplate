<template>
    <div>
        <div class="page-name-xl mb-3 mt-2" v-bind:id="'employee-'+employee.id">
            <a v-bind:href="'/human_resources/employee/'+employee.id+'/show'">
                <img class="profile-m mr-1 my-2" v-bind:src="employee.image">
                {{ employee.first_name + ' ' + employee.last_name }}
                <span class="tag tag-neutral text-white">{{ total }}</span>
            </a>
        </div>

    <datatable v-bind="$data"></datatable>
        <button v-if="can('department_tasks_order_edit')" v-on:click="openModalForApproval(ei)" type="button" class="btn btn-neutral btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Save tasks priority') }}</button>
        <button v-if="can('department_tasks_order_approve')" v-on:click="approveOrder(ei)" type="button" class="btn btn-success btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Reject task priority') }}</button>
        <button v-if="can('department_tasks_order_approve')" v-on:click="approveOrder(ei)" type="button" class="btn btn-danger btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Approve task priority') }}</button>
    </div>
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
                tblClass: 'table table-draggable',
                columns: [
                    { title: '', field: '', sortable: false, tdComp: Handle },
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
                        field: 'assigner',
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
                    handle: '.icon-handler'
                }
            }
        },
        watch: {
            'query': {
                handler (val) {
                    axios.post('/api/tasks/employee/'+this.employee.id, val)
                        .then((res) => {
                            this.data = res.data.tasks;
                            this.total = res.data.total;
                        })
                },
                deep: true
            },
        },
        computed: {
            user() {
                return this.$store.state.employee;
            }
        },
        methods: {
            can(role) {
                return _.find(this.user.roles, (o) => {
                    return o.name === role;
                });
            },
            openModalForApproval(ei) {
                this.employee_index = ei;
                $('#taskOrderApprovalModal').modal('show');
            },
            approveOrder(ei) {
                let data = _.map(this.employees[ei].tasks, (o) => {
                    return o.id;
                });
                axios.post('/api/tasks/updateOrder', {employee: this.employees[ei].id, tasks: data})
                    .then((res) => {
                        this.employee_index = 0;
                    })
                    .catch((err) => {});
            },
        }
    }
</script>

<style scoped>

</style>