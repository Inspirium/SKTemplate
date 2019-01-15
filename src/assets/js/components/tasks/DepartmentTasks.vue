<template>
    <div class="content" v-if="department">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ department.name }}</h1>
            </div>
        </div>
        <div class="row tabs-wrapper">
            <ul class="col nav classic-tabs tabs-cyan" id="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link position-relative active" data-toggle="tab" href="#panel1" role="tab">
                        Po djelatnicima
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" data-toggle="tab" href="#panel2" role="tab">
                        Aktivnost odjela
                    </a>

                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="panel1" role="tabpanel">
                <template v-for="(employee, index) in employees">
                    <employee-tasks v-bind:employee="employee" v-on:openModal="openModalForApproval" v-on:approveOrder="approveOrder" v-on:rejectOrder="rejectOrder"></employee-tasks>
                </template>

                <task-order-approval v-on:sendForApproval="sendForApproval"></task-order-approval>
            </div>
            <div class="tab-pane fade" id="panel2" role="tabpanel">
                <datatable v-bind="$data.department_activity"></datatable>
            </div>
        </div>
    </div>
</template>
<script>
    import draggable from 'vuedraggable'
    import taskOrderApproval from '../modals/TaskOrderApprovalModal'
    import EmployeeTasks from "./EmployeeTasks";
    import components from '../table_components'
    export default {
        components: {
            EmployeeTasks,
            taskOrderApproval,
            ...components
        },
        data: function () {
            return {
                employee_index: {},
                department: false,
                employees : false,
                department_activity: {
                supportNested: true,
                    tblClass: 'table',
                    columns: [
                    {title: '#', field: 'id', sortable: true},
                    {
                        title: this.lang('Task'),
                        field: 'name',
                        sortable: true,
                        tdComp: 'TitleCell',
                        tdClass: 'table-title'
                    },
                    {
                        title: this.lang('Task Type'),
                        field: 'formatted_type',
                        sortable: true,
                        tdComp: 'TaskType'
                    },
                        {
                            title: this.lang('Assign to'),
                            field: 'assignee',
                            tdComp: 'AuthorCell'
                        },
                    {
                        title: this.lang('Assigner'),
                        field: 'assigner',
                        tdComp: 'AuthorCell'
                    },
                    {
                        title: this.lang('Created'),
                        field: 'created_at',
                        sortable: true,
                        tdComp: 'DateCell'
                    },
                    {
                        title: this.lang('Deadline'),
                        field: 'deadline',
                        sortable: true,
                        tdComp: 'DateCell'
                    },
                    {
                        title: this.lang('Waiting time'),
                        field: 'created_at',
                        sortable: true,
                        tdComp: 'WaitingTime'
                    },
                    {
                        title: this.lang('Status'),
                        field: 'status',
                        sortable: false,
                        tdComp: 'TaskStatus'
                    }
                ],
                    data: [],
                    total: 0,
                    query: {},
                HeaderSettings: false
            }
            }
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

            sendForApproval(task) {
                axios.post('/api/tasks/requestOrder', {task:task, ...this.employee_index})
                    .then((res) => {
                        this.employee_index = {};
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$eventHub.emit('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', {employee: this.employee_index.employee});
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                    })
                    .catch((err) => {
                        toastr.error(this.lang('Greška'));
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                    });
            },
            openModalForApproval(payload) {
                this.employee_index = payload;
                $('#taskOrderApprovalModal').modal('show');
            },
            approveOrder(data) {
                axios.post('/api/tasks/updateOrder', data)
                    .then((res) => {
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$eventHub.emit('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', {employee: data.employee});
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                    })
                    .catch((err) => {
                        toastr.error(this.lang('Greška'));
                        this.$eventHub.emit('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', {employee: data.employee, error:true});
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                    });
            },
            rejectOrder(data) {
                axios.post('/api/tasks/rejectOrder', data)
                    .then((res) => {
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$eventHub.emit('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', {employee: data.employee});
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                    })
                    .catch((err) => {
                        toastr.error(this.lang('Greška'));
                        this.$eventHub.emit('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', {employee: data.employee, error:true});
                        this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                    });
            }

        },
        mounted: function() {
            if ( this.can('access_all_department_tasks') || (this.can('access_department_tasks') && this.user.department_id == this.$route.params.id) ) {
                axios.get('/api/tasks/department/' + this.$route.params.id)
                    .then((res) => {
                        this.department = res.data.department;
                        this.employees = res.data.employees;
                        this.department_activity.data = res.data.activity;
                    })
            }
            else {
                window.location.href="/tasks";//TODO: fix
            }
        }
    }
</script>