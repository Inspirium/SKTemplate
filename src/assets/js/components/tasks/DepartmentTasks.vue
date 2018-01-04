<template>
    <div class="content" v-if="department">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ department.name }}</h1>
            </div>
        </div>

        <template v-for="(employee, index) in employees">
            <employee-tasks v-bind:employee="employee" v-on:openModal="openModalForApproval" v-on:approveOrder="approveOrder" v-on:rejectOrder="rejectOrder"></employee-tasks>
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
                employee_index: {},
                department: false,
                employees : false,
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
                    })
                    .catch((err) => {
                        toastr.error(this.lang('Greška'));
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
                        this.$eventHub.$emit('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', {employee: data.employee});
                    })
                    .catch((err) => {
                        toastr.error(this.lang('Greška'));
                    });
            },
            rejectOrder(data) {
                axios.post('/api/tasks/rejectOrder', data)
                    .then((res) => {
                        toastr.success(this.lang('Uspješno obavljeno'));
                        this.$eventHub.emit('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', {employee: data.employee});
                    })
                    .catch((err) => {
                        toastr.error(this.lang('Greška'));
                    });
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