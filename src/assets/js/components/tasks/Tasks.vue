<template>
    <div class="content">
        <div class="row tabs-wrapper">
            <ul class="col nav classic-tabs tabs-cyan tab-full" role="tablist">
                <li class="nav-item">
                    <a class="nav-link position-relative active" data-toggle="tab" href="#tasks" role="tab">{{ lang('Tasks') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" data-toggle="tab" href="#sent_tasks" role="tab">{{ lang('Sent Tasks') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" data-toggle="tab" href="#completed_tasks" role="tab">{{ lang('Completed Tasks') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" data-toggle="tab" href="#rejected_tasks" role="tab">{{ lang('Rejected Tasks') }}</a>
                </li>
            </ul>
        </div>

        <!-- Tab panels -->
        <div class="tab-content">
            <div class="tab-pane fade in show active" id="tasks" role="tabpanel">
                <div class="justify-content-center mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                    <button v-on:click="$router.push('/task/edit')" class="btn btn-lg btn-blank btn-plus-icon">{{ lang('Create new') }}</button>
                </div>
                <div class="page-name-xl mb-3 mt-4">{{ lang('New Tasks') }}
                    <span class="tag tag-neutral text-white">{{ $data.new.total }}</span>
                </div>
                <datatable v-bind="$data.new"></datatable>

                <div class="page-name-xl mb-3 mt-2">{{ lang('Tasks') }}
                    <span class="tag tag-neutral text-white">{{ accepted.total }}</span>
                </div>
                <datatable v-bind="$data.accepted"></datatable>
            </div>
            <div class="tab-pane fade in show" id="sent_tasks" role="tabpanel">
                <div class="justify-content-center mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                    <button v-on:click="$router.push('/task/edit')" class="btn btn-lg btn-blank btn-plus-icon">{{ lang('Create new') }}</button>
                </div>
                <div class="page-name-xl mb-3 mt-4">{{ lang('Sent Tasks') }}
                    <span class="tag tag-neutral text-white">{{ sent.total }}</span>
                </div>
                <datatable v-bind="$data.sent"></datatable>
            </div>
            <div class="tab-pane fade in show" id="completed_tasks" role="tabpanel">
                <div class="page-name-xl mb-3 mt-4">{{ lang('Completed Tasks') }}
                    <span class="tag tag-neutral text-white">{{ completed.total }}</span>
                </div>
                <datatable v-bind="$data.completed"></datatable>
            </div>
            <div class="tab-pane fade in show" id="rejected_tasks" role="tabpanel">
                <div class="page-name-xl mb-3 mt-4">{{ lang('Rejected Tasks') }}
                    <span class="tag tag-neutral text-white">{{ rejected.total }}</span>
                </div>
                <datatable v-bind="$data.rejected"></datatable>
            </div>
        </div>

    </div>
</template>
<script>
    import draggable from 'vuedraggable'
    import components from '../table_components'
    export default {
        components,
        data: function () {
            return {
                authority: false,
                new: {
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
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                accepted: {
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
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                sent: {
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
                },
                completed: {
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
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                rejected: {
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
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                }
            }
        },
        computed: {},
        methods: {
            handleQueryChange(type) {
                axios.post('/api/tasks/employee/'+this.$store.state.employee.id+'/'+type, this[type].query)
                    .then((res) => {
                        this[type].data = res.data.rows;
                        this[type].total = res.data.total;
                    })
            }
        },
        watch: {
            'new.query': {
                handler() {
                    this.handleQueryChange('new');
                },
                deep: true
            },
            'accepted.query': {
                handler() {
                    this.handleQueryChange('accepted');
                },
                deep: true
            },
            'sent.query': {
                handler() {
                    this.handleQueryChange('sent');
                },
                deep: true
            },
            'completed.query': {
                handler() {
                    this.handleQueryChange('completed');
                },
                deep: true
            },
            'rejected.query': {
                handler() {
                    this.handleQueryChange('rejected');
                },
                deep: true
            },
        },
        mounted: function() {
           /* axios.get('/api/tasks')
                .then((res) => {
                    this.new_tasks = res.data.new_tasks;
                    this.accepted_tasks = res.data.accepted_tasks;
                    this.sent_tasks = res.data.sent_tasks;
                    this.completed_tasks = res.data.completed_tasks;
                    this.rejected_tasks = res.data.rejected_tasks;
                })*/
        }
    }
</script>