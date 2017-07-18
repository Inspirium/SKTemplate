<template>
    <div class="content">
        <div class="justify-content-center mt-1 mb-2 flex-column flex-md-row d-flex p-2">
            <button type="submit" v-on:click="$router.push('/task/edit')" class="btn btn-lg btn-blank btn-plus-icon">{{ lang('Create new') }}</button>
        </div>
        <div class="page-name-xl mb-1 mt-2">{{ lang('New Task') }}
            <span class="tag tag-neutral text-white">154</span>
        </div>
        <!-- Table -->
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th>{{ lang('Task') }}</th>
                <th>{{ lang('Task Type') }}</th>
                <th>{{ lang('Assiger') }}</th>
                <th>{{ lang('Created') }}</th>
                <th>{{ lang('Deadline') }}</th>
                <th class="text-right">{{ lang('Assign to') }}</th>
            </tr>
            </thead>
            <draggable class="white" v-model="new_tasks" v-bind:element="'tbody'">
                <tr v-for="(element, index) in new_tasks" :key="element.id">
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30" scope="row">{{ element.id }}</th>
                    <td class="table-title">{{ element.title }}</td>
                    <td><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="/images/profile.jpg">Jelena Lončarić</a></td>
                    <td>21.09.</td>
                    <td>25.09.</td>
                    <td class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                </tr>
            </draggable>
        </table>

        <!-- Table -->
        <div class="page-name-xl mb-1 mt-2">{{ lang('Task') }}
            <span class="tag tag-neutral text-white">154</span>
        </div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th>{{ lang('Task') }}</th>
                <th>{{ lang('Task Type') }}</th>
                <th>{{ lang('Assiger') }}</th>
                <th>{{ lang('Created') }}</th>
                <th>{{ lang('Deadline') }}</th>
                <th>{{ lang('TCT') }}</th>
                <th class="">{{ lang('Assign to') }}</th>
            </tr>
            </thead>
            <draggable class="white" v-model="old_tasks" v-bind:element="'tbody'">
                <tr v-for="(element, index) in old_tasks" :key="element.id">
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30" scope="row">{{ element.id }}</th>
                    <td class="table-title">{{ element.title }}</td>
                    <td><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="/images/profile.jpg">Jelena Lončarić</a></td>
                    <td>21.09.</td>
                    <td>25.09.</td>
                    <td>4 h</td>
                    <td class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                </tr>
            </draggable>
        </table>
        <button class="btn btn-neutral d-block mx-auto btn-addon" type="button">{{ lang('Show all') }}</button>

        <!-- Table -->
        <div class="page-name-xl mb-1 mt-2">{{ lang('Waiting For Approval') }}
            <span class="tag tag-neutral text-white">9</span>
        </div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th>{{ lang('Task') }}</th>
                <th>{{ lang('Task Type') }}</th>
                <th>{{ lang('Assiger') }}</th>
                <th>{{ lang('Created') }}</th>
                <th>{{ lang('Deadline') }}</th>
                <th>{{ lang('Waiting') }}</th>
                <th class="">{{ lang('Assign to') }}</th>
            </tr>
            </thead>
            <draggable class="white" v-model="waiting_tasks" v-bind:element="'tbody'">
                <tr v-for="(element, index) in waiting_tasks" :key="element.id">
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30" scope="row">{{ element.id }}</th>
                    <td class="table-title">{{ element.title }}</td>
                    <td><div v-bind:class="task_types[element.type].className">{{ task_types[element.type].title }}</div></td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="/images/profile.jpg">Jelena Lončarić</a></td>
                    <td>21.09.</td>
                    <td>25.09.</td>
                    <td>2d : 4h</td>
                    <td class="text-right"><div class="file-box-sty icon icon-assign">{{ lang('Assign') }}</div></td>
                </tr>
            </draggable>
        </table>

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
                    { id: 1, title: 'Fizika', type: 1 },
                    { id: 2, title: 'Kemija', type: 2 },
                    { id: 3, title: 'Biologija', type: 1 },
                ],
                old_tasks: [
                    { id: 1, title: 'Fizika', type: 1 },
                    { id: 2, title: 'Kemija', type: 2 },
                    { id: 3, title: 'Biologija', type: 1 },
                ],
                waiting_tasks: [
                    { id: 1, title: 'Fizika', type: 1 },
                    { id: 2, title: 'Kemija', type: 2 },
                    { id: 3, title: 'Biologija', type: 1 },
                ]
            }
        },
        computed: {},
        methods: {}
    }
</script>