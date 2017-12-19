<template>
    <div class="content">
        <div class="row tabs-wrapper">
            <ul class="col nav classic-tabs tabs-cyan tab-full" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tasks" role="tab">{{ lang('Tasks') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#sent_tasks" role="tab">{{ lang('Sent Tasks') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#completed_tasks" role="tab">{{ lang('Completed Tasks') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#rejected_tasks" role="tab">{{ lang('Rejected Tasks') }}</a>
                </li>
            </ul>
        </div>

        <!-- Tab panels -->
        <div class="tab-content">
            <div class="tab-pane fade in show active" id="tasks" role="tabpanel">
                <div class="justify-content-center mt-1 mb-2 flex-column flex-md-row d-flex p-2">
                    <button v-on:click="$router.push('/task/edit')" class="btn btn-lg btn-blank btn-plus-icon">{{ lang('Create new') }}</button>
                </div>
                <div class="page-name-xl mb-3 mt-2">{{ lang('New Tasks') }}
                    <span class="tag tag-neutral text-white">{{ new_tasks.length }}</span>
                </div>
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th class="w-30"></th>
                        <th class="w-30">#</th>
                        <th data-title="Task">{{ lang('Task') }}</th>
                        <th data-title="Task Type">{{ lang('Task Type') }}</th>
                        <th data-title="Assigner">{{ lang('Assigner') }}</th>
                        <th data-title="Created">{{ lang('Created') }}</th>
                        <th data-title="Deadline">{{ lang('Deadline') }}</th>
                        <th data-title="Assign to" v-if="authority" class="text-right">{{ lang('Assign to') }}</th>
                    </tr>
                    </thead>
                    <draggable v-model="new_tasks" v-bind:element="'tbody'" v-bind:options="{handle:'.icon-handler'}">
                        <tr v-for="(element, index) in new_tasks" v-bind:key="element.id">
                            <td><div class="icon icon-handler"></div></td>
                            <th class="display-e w-30">{{ index+1 }}</th>
                            <td data-title="Task" class="table-title"><a v-bind:href="'/task/show/'+element.id">{{ element.name }}</a></td>
                            <td data-title="Task Type"><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                            <td data-title="Assigner"><a v-bind:href="'/human_resources/employee/'+element.assigner.id+'/show'" class="text-uppercase file-box-sty"><img class="profile-m mr-2" v-bind:src="element.assigner.image">{{ element.assigner.name }}</a></td>
                            <td data-title="Created">{{ element.created_at | moment('DD.MM.') }}</td>
                            <td data-title="Deadline">{{ element.deadline | moment('DD.MM.') }}</td>
                            <td data-title="Assign to" v-if="authority" class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                        </tr>
                    </draggable>
                </table>

                <div class="page-name-xl mb-3 mt-2">{{ lang('Tasks') }}
                    <span class="tag tag-neutral text-white">{{ accepted_tasks.length }}</span>
                </div>
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th class="w-30"></th>
                        <th class="w-30">#</th>
                        <th data-title="Task">{{ lang('Task') }}</th>
                        <th data-title="Task Type">{{ lang('Task Type') }}</th>
                        <th data-title="Assigner">{{ lang('Assigner') }}</th>
                        <th data-title="Created">{{ lang('Created') }}</th>
                        <th data-title="Deadline">{{ lang('Deadline') }}</th>
                        <th data-title="Assign to" v-if="authority" class="text-right">{{ lang('Assign to') }}</th>
                    </tr>
                    </thead>
                    <draggable v-model="accepted_tasks" v-bind:element="'tbody'" v-bind:options="{handle:'.icon-handler'}">
                        <tr v-for="(element, index) in accepted_tasks" v-bind:key="element.id">
                            <td><div class="icon icon-handler"></div></td>
                            <th class="display-e w-30">{{ index+1 }}</th>
                            <td data-title="Task" class="table-title"><a v-bind:href="'/task/show/'+element.id">{{ element.name }}</a></td>
                            <td data-title="Task Type"><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                            <td data-title="Assigner"><a v-bind:href="'/human_resources/employee/'+element.assigner.id+'/show'" class="text-uppercase file-box-sty"><img class="profile-m mr-2" v-bind:src="element.assigner.image">{{ element.assigner.name }}</a></td>
                            <td data-title="Created">{{ element.created_at | moment('DD.MM.') }}</td>
                            <td data-title="Deadline">{{ element.deadline | moment('DD.MM.') }}</td>
                            <td data-title="Assign to" v-if="authority" class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                        </tr>
                    </draggable>
                </table>
            </div>
            <div class="tab-pane fade in show" id="sent_tasks" role="tabpanel">
                <div class="page-name-xl mb-3 mt-2">{{ lang('Sent Tasks') }}
                    <span class="tag tag-neutral text-white">{{ sent_tasks.length }}</span>
                </div>
                <div class="justify-content-center mt-1 mb-2 flex-column flex-md-row d-flex p-2">
                    <button v-on:click="$router.push('/task/edit')" class="btn btn-lg btn-blank btn-plus-icon">{{ lang('Create new') }}</button>
                </div>
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th class="w-30">#</th>
                        <th data-title="Task">{{ lang('Task') }}</th>
                        <th data-title="Task Type">{{ lang('Task Type') }}</th>
                        <th data-title="Assigner">{{ lang('Assign to') }}</th>
                        <th data-title="Created">{{ lang('Created') }}</th>
                        <th data-title="Deadline">{{ lang('Deadline') }}</th>
                        <th data-title="Assign to" v-if="authority" class="text-right">{{ lang('Assign to') }}</th>
                        <th data-title="Status">{{ lang('Status') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(element, index) in sent_tasks" v-bind:key="element.id">
                            <th class="display-e w-30">{{ index+1 }}</th>
                            <td data-title="Task" class="table-title"><a v-bind:href="'/task/show/'+element.id">{{ element.name }}</a></td>
                            <td data-title="Task Type"><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                            <td data-title="Assign to"><a v-bind:href="'/human_resources/employee/'+element.assigner.id+'/show'" class="text-uppercase file-box-sty"><img class="profile-m mr-2" v-bind:src="element.assigner.image">{{ element.assigner.name }}</a></td>
                            <td data-title="Created">{{ element.created_at | moment('DD.MM.') }}</td>
                            <td data-title="Deadline">{{ element.deadline | moment('DD.MM.') }}</td>
                            <td data-title="Assign to" v-if="authority" class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                            <template v-if="element.status==='completed'">
                            <td data-title="Status" class="icon icon-cost-approved">{{ lang('Finished') }}</td>
                            </template>
                            <template v-else>
                                <td data-title="Status"></td>
                            </template>
                        </tr>
                    <tbody>
                </table>
            </div>
            <div class="tab-pane fade in show" id="completed_tasks" role="tabpanel">
                <div class="page-name-xl mb-3 mt-2">{{ lang('Completed Tasks') }}
                    <span class="tag tag-neutral text-white">{{ completed_tasks.length }}</span>
                </div>
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th class="w-30">#</th>
                        <th data-title="Task">{{ lang('Task') }}</th>
                        <th data-title="Task Type">{{ lang('Task Type') }}</th>
                        <th data-title="Assigner">{{ lang('Assigner') }}</th>
                        <th data-title="Created">{{ lang('Created') }}</th>
                        <th data-title="Deadline">{{ lang('Deadline') }}</th>
                        <th data-title="Assign to" v-if="authority" class="text-right">{{ lang('Assign to') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(element, index) in completed_tasks" v-bind:key="element.id">
                            <th class="display-e w-30">{{ index+1 }}</th>
                            <td data-title="Task" class="table-title"><a v-bind:href="'/task/show/'+element.id">{{ element.name }}</a></td>
                            <td data-title="Task Type"><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                            <td data-title="Assigner"><a v-bind:href="'/human_resources/employee/'+element.assigner.id+'/show'" class="text-uppercase file-box-sty"><img class="profile-m mr-2" v-bind:src="element.assigner.image">{{ element.assigner.name }}</a></td>
                            <td data-title="Created">{{ element.created_at | moment('DD.MM.') }}</td>
                            <td data-title="Deadline">{{ element.deadline | moment('DD.MM.') }}</td>
                            <td data-title="Assign to" v-if="authority" class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade in show" id="rejected_tasks" role="tabpanel">
                <div class="page-name-xl mb-3 mt-2">{{ lang('Rejected Tasks') }}
                    <span class="tag tag-neutral text-white">{{ rejected_tasks.length }}</span>
                </div>
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th class="w-30">#</th>
                        <th data-title="Task">{{ lang('Task') }}</th>
                        <th data-title="Task Type">{{ lang('Task Type') }}</th>
                        <th data-title="Assigner">{{ lang('Assigner') }}</th>
                        <th data-title="Created">{{ lang('Created') }}</th>
                        <th data-title="Deadline">{{ lang('Deadline') }}</th>
                        <th data-title="Assign to" v-if="authority" class="text-right">{{ lang('Assign to') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(element, index) in rejected_tasks" v-bind:key="element.id">
                            <th class="display-e w-30">{{ index+1 }}</th>
                            <td data-title="Task" class="table-title"><a v-bind:href="'/task/show/'+element.id">{{ element.name }}</a></td>
                            <td data-title="Task Type"><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                            <td data-title="Assigner"><a v-bind:href="'/human_resources/employee/'+element.assigner.id+'/show'" class="text-uppercase file-box-sty"><img class="profile-m mr-2" v-bind:src="element.assigner.image">{{ element.assigner.name }}</a></td>
                            <td data-title="Created">{{ element.created_at | moment('DD.MM.') }}</td>
                            <td data-title="Deadline">{{ element.deadline | moment('DD.MM.') }}</td>
                            <td data-title="Assign to" v-if="authority" class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

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
                    },
                    3: {
                        title: 'Approval Request',
                        className: 'tasktype-2'
                    },
                    4: {
                        title: 'Assignment',
                        className: 'tasktype-2'
                    },
                    5: {
                        title: 'Approval Request',
                        className: 'tasktype-2'
                    },
                    6: {
                        title: 'Task Order Request',
                        className: 'tasktype-2'
                    },
                },
                new_tasks: [
                ],
                accepted_tasks: [],
                sent_tasks: [
                ],
                completed_tasks: [
                ],
                rejected_tasks: []
            }
        },
        computed: {},
        methods: {
        },
        mounted: function() {
            axios.get('/api/tasks')
                .then((res) => {
                    this.new_tasks = res.data.new_tasks;
                    this.accepted_tasks = res.data.accepted_tasks;
                    this.sent_tasks = res.data.sent_tasks;
                    this.completed_tasks = res.data.completed_tasks;
                    this.rejected_tasks = res.data.rejected_tasks;
                })
        }
    }
</script>