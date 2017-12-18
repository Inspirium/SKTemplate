<template>
    <div class="content" v-if="department">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ department.name }}</h1>
            </div>
        </div>

        <template v-for="(employee, ei) in employees">
        <div class="page-name-xl mb-3 mt-2">
            <a v-bind:href="'/human_resources/employee/'+employee.id+'/show'">
                <img class="profile-m mr-1 my-2" v-bind:src="employee.image">
                {{ employee.first_name + ' ' + employee.last_name }}
                <span class="tag tag-neutral text-white">{{ employee.tasks.length }}</span>
            </a>
        </div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th class="w-30">#</th>
                <th data-title="Task">{{ lang('Task') }}</th>
                <th data-title="Task Type">{{ lang('Task Type') }}</th>
                <th data-title="Assigner">{{ lang('Assigner') }}}</th>
                <th data-title="Created">{{ lang('Created') }}</th>
                <th data-title="Deadline">{{ lang('Deadline') }}</th>
            </tr>
            </thead>
            <draggable v-model="employee.tasks" v-bind:element="'tbody'">
                <tr v-for="(task, index) in employee.tasks">
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30">{{ task.order }}</th>
                    <th v-bind:class="newOrderClass(task)">{{ newOrderValue(task) }}</th>
                    <td data-title="Task" class="table-title"><a>{{ task.name }}</a></td>
                    <td data-title="Task Type"><div>{{ task_types[task.type].title }}</div></td>
                    <td data-title="Assigner"><a class="text-uppercase file-box-sty"><img v-bind:src="task.assigner.image" class="profile-m mr-2">{{ task.assigner.name }}</a></td>
                    <td data-title="Created">{{ task.created_at | moment('DD.MM.') }}</td>
                    <td data-title="Deadline">{{ task | moment('DD.MM.') }}</td>
                </tr>
            </draggable>
        </table>
        <div class="d-flex justify-content-end">
            <button v-on:click="openModalForApproval(ei)" type="button" class="btn btn-neutral btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Save tasks priority') }}</button>
            <button v-on:click="approveOrder(ei)" type="button" class="btn btn-success btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Approve task priority') }}</button>
            <button v-on:click="approveOrder(ei)" type="button" class="btn btn-danger btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Reject task priority') }}</button>
        </div>
        </template>

        <task-order-approval v-on:sendForApproval="sendForApproval"></task-order-approval>
    </div>
</template>
<script>
    import draggable from 'vuedraggable'
    import taskOrderApproval from '../modals/TaskOrderApprovalModal'
    export default {
        components: {
            draggable,
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
                        title: 'Assignment',
                        className: 'tasktype-2'
                    }
                }
            }
        },
        methods: {
            newOrderValue(task) {
                if (task.new_order) {
                    return Number(task.new_order) - Number(task.order);
                }
                return '';
            },
            newOrderClass(task) {
                if (task.new_order) {
                    let number = Number(task.new_order) - Number(task.order);
                    if (number === 0) {
                        return 'new-order';
                    }
                    return (number > 0) ? 'new-order new-order--up' : 'new-order new-order--down';
                }
                return '';
            },
            openModalForApproval(ei) {
                this.employee_index = ei;
                $('#taskOrderApprovalModal').modal('show');
            },
            sendForApproval(task) {
                let data = _.map(this.employees[this.employee_index].tasks, (o) => {
                    return o.id;
                });
                axios.post('/api/tasks/requestOrder', {tasks: data, task: task})
                    .then((res) => {
                        this.employee_index = 0;
                    })
                    .catch((err) => {});
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
            }
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