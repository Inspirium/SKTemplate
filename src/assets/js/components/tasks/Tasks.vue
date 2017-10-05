<template>
    <div class="content">
        <div class="justify-content-center mt-1 mb-2 flex-column flex-md-row d-flex p-2">
            <button v-on:click="$router.push('/task/edit')" class="btn btn-lg btn-blank btn-plus-icon">{{ lang('Create new') }}</button>
        </div>
        <template v-if="new_tasks.length">
        <div class="page-name-xl mb-3 mt-2">{{ lang('New Task') }}
            <span class="tag tag-neutral text-white">{{ new_tasks.length }}</span>
        </div>
        <!-- Table -->
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th>{{ lang('Task') }}</th>
                <th>{{ lang('Task Type') }}</th>
                <th>{{ lang('Assigner') }}</th>
                <th>{{ lang('Created') }}</th>
                <th>{{ lang('Deadline') }}</th>
                <th v-if="authority" class="text-right">{{ lang('Assign to') }}</th>
            </tr>
            </thead>
            <draggable class="white" v-model="new_tasks" v-bind:element="'tbody'">
                <tr v-for="(element, index) in new_tasks" v-bind:key="element.id">
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30">{{ index+1 }}</th>
                    <td class="table-title"><a v-bind:href="'/task/show/'+element.id">{{ element.name }}</a></td>
                    <td><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" v-bind:src="element.assigner.image">{{ element.assigner.name }}</a></td>
                    <td>{{ element.created_at | moment('DD.MM.') }}</td>
                    <td>{{ element.deadline | moment('DD.MM.') }}</td>
                    <td v-if="authority" class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                </tr>
            </draggable>
        </table>
        </template>

        <template v-if="old_tasks.length">
        <div class="page-name-xl mb-1 mt-2">{{ lang('Task') }}
            <span class="tag tag-neutral text-white">{{ old_tasks.length }}</span>
        </div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th>{{ lang('Task') }}</th>
                <th>{{ lang('Task Type') }}</th>
                <th>{{ lang('Assigner') }}</th>
                <th>{{ lang('Created') }}</th>
                <th>{{ lang('Deadline') }}</th>
                <th>{{ lang('TCT') }}</th>
                <th v-if="authority">{{ lang('Assign to') }}</th>
            </tr>
            </thead>
            <draggable class="white" v-model="old_tasks" v-bind:element="'tbody'" v-on:end="endDrag">
                <tr v-for="(element, index) in old_tasks" v-bind:key="element.id">
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30">{{ index+1 }}</th>
                    <td class="table-title"><a v-bind:href="'/task/show/'+element.id">{{ element.name }}</a></td>
                    <td><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" v-bind:src="element.assigner.image">{{ element.assigner.name }}</a></td>
                    <td>{{ element.created_at | moment('DD.MM.') }}</td>
                    <td>{{ element.deadline | moment('DD.MM.') }}</td>
                    <td>4 h</td>
                    <td v-if="authority" class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                </tr>
            </draggable>
        </table>
        <button class="btn btn-neutral d-block mx-auto btn-addon" type="button">{{ lang('Show all') }}</button>
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
                authority: false,
                task_types: {
                    1: {
                        title: 'Project',
                        className: 'tasktype-1'
                    },
                    2: {
                        title: 'Assignment',
                        className: 'tasktype-2'
                    }
                },
                new_tasks: [
                ],
                old_tasks: [
                ],
                waiting_tasks: [
                ]
            }
        },
        computed: {},
        methods: {
            endDrag: function(event) {
                let data = _.map(this.old_tasks, (o) => {
                    return o.id;
                });
                axios.post('/api/tasks/updateOrder', {tasks: data})
                    .then((res) => {})
                    .catch((err) => {});
            }
        },
        mounted: function() {
            axios.get('/api/tasks')
                .then((res) => {
                    this.new_tasks = res.data.new_tasks;
                    this.old_tasks = res.data.old_tasks;
                })
        }
    }
</script>