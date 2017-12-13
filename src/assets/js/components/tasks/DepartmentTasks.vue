<template>
    <div class="content" v-if="department">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ department.name }}</h1>
            </div>
        </div>

        <template v-for="employee in employees">
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
                <th data-title="Task">Task</th>
                <th data-title="Task Type">Task Type</th>
                <th data-title="Assigner">Assigner</th>
                <th data-title="Created">Created</th>
                <th data-title="Deadline">Deadline</th>
            </tr>
            </thead>
            <draggable v-model="employee.tasks" v-bind:element="'tbody'">
                <tr v-for="(task, index) in employee.tasks">
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30">{{ index+1 }}</th>
                    <td data-title="Task" class="table-title"><a>{{ task.name }}</a></td>
                    <td data-title="Task Type"><div>{{ task_types[task.type].title }}</div></td>
                    <td data-title="Assigner"><a class="text-uppercase file-box-sty"><img v-bind:src="task.assigner.image" class="profile-m mr-2">{{ task.assigner.name }}</a></td>
                    <td data-title="Created">{{ task.created_at | moment('DD.MM.') }}</td>
                    <td data-title="Deadline">{{ task | moment('DD.MM.') }}</td>
                </tr>
            </draggable>
        </table>
        <button type="button" class="btn btn-neutral btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Save tasks priority') }}</button>
        </template>


    </div>
</template>
<script>
    import draggable from 'vuedraggable'
    export default {
        components: {
            draggable
        },
        data: function () {
            return {
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
                    }
                }
            }
        },
        computed: {},
        methods: {
            is_assigned: function(task) {
                return (this.authority && task.employees.length)
            },
            endDrag: function(event) {
                let data = _.map(this.employee.tasks, (o) => {
                    return o.id;
                });
                axios.post('/api/tasks/updateOrder', {tasks: data})
                    .then((res) => {})
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