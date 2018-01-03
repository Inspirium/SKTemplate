<template>
    <div class="content" v-if="department">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ department.name }}</h1>
            </div>
        </div>

        <template v-for="(employee, ei) in employees">
            <employee-tasks v-bind:employee="employee"></employee-tasks>
        </template>

        <task-order-approval v-on:sendForApproval="sendForApproval"></task-order-approval>
    </div>
</template>
<script>
    import draggable from 'vuedraggable'
    import taskOrderApproval from '../modals/TaskOrderApprovalModal'
    import EmployeeTasks from "./EmployeeTasks";

    export default {
        components: {
            EmployeeTasks,
            taskOrderApproval
        },
        data: function () {
            return {
                employee_index:0,
                department: false,
                employees : false,
                authority: true,
                task_types: {
                    1: {
                        title: 'Project',
                        className: 'tasktype-1'
                    },
                    2: {
                        title: 'Assignment',
                        className: 'tasktype-2'
                    },
                    3: {
                        title: 'Project',
                        className: 'tasktype-1'
                    },
                    4: {
                        title: 'Assignment',
                        className: 'tasktype-2'
                    },
                    5: {
                        title: 'Project',
                        className: 'tasktype-1'
                    },
                    6: {
                        title: 'Task order',
                        className: 'tasktype-2'
                    }
                },
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
            newOrderValue(task, index) {
                let val = task.new_order;
                if (!val) {
                    val = index+1;
                }

                let r =-(Number(val) - Number(task.order));
                if (!r) {
                    return '';
                }
                return r;
            },
            newOrderClass(task, index) {
                let val = task.new_order;
                if (!val) {
                    val = index+1;
                }
                let number = Number(val) - Number(task.order);
                if (number === 0) {
                    return 'new-order';
                }
                return (number > 0) ? 'new-order new-order--down' : 'new-order new-order--up';

            },

            sendForApproval(task) {
                let data = _.map(this.employees[this.employee_index].tasks, (o) => {
                    return o.id;
                });
                axios.post('/api/tasks/requestOrder', {tasks: data, task: task, employee: this.employees[this.employee_index].id})
                    .then((res) => {
                        this.employee_index = 0;
                    })
                    .catch((err) => {});
            },

        },
        mounted: function() {
            axios.get('/api/tasks/department/'+this.$route.params.id)
                .then((res) => {
                    this.department = res.data.department;
                    this.employees = res.data.employees;
                })
        }
    }
</script>