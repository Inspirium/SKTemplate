<template>
    <div class="content">
        <!-- Display fileds -->
        <div class="row">
            <div class="col-md-12">
                <div class="justify-content-center mt-4 flex-column flex-md-row d-flex p-2">
                    <a href="/proposition/start" class="btn btn-lg btn-blank btn-plus-icon">{{ lang('Create new') }}</a>
                </div>
                <div class="page-name-xl mb-2 mt-4 mt-2">{{ lang('Propositions On Approval') }}
                    <span class="tag tag-neutral text-white">{{ approval.total }}</span>
                </div>
                <datatable v-bind="$data.approval"></datatable>

                <div class="page-name-xl mb-2 mt-5">{{ lang('Unfinished Propositions')}}
                    <span class="tag tag-neutral text-white">{{ unfinished.total }}</span>
                </div>
                <datatable v-bind="$data.unfinished"></datatable>

                <div class="page-name-xl mb-2 mt-5">{{ lang('Active Propositions')}}
                    <span class="tag tag-neutral text-white">{{ active.total }}</span>
                </div>
                <datatable v-bind="$data.active"></datatable>

                <div class="page-name-xl mb-2 mt-5">{{ lang('Rejected Propositions')}}
                    <span class="tag tag-neutral text-white">{{ rejected.total }}</span>
                </div>
                <datatable v-bind="$data.rejected"></datatable>

                <div class="page-name-xl mb-2 mt-5">{{ lang('Deleted Propositions')}}
                    <span class="tag tag-neutral text-white">{{ deleted.total }}</span>
                </div>
                <datatable v-bind="$data.deleted"></datatable>

                <div class="page-name-xl mb-2 mt-5">{{ lang('Proposition Archive') }}
                    <span class="tag tag-neutral text-white">{{ archive.total }}</span>
                </div>
                <datatable v-bind="$data.archive"></datatable>

            </div>
        </div>
    </div>
</template>
<script>
    import TitleCell from '../table_components/TitleCell'
    import AuthorCell from '../table_components/AuthorCell'
    import WaitingTime from '../table_components/WaitingTime'

    export default {
        components: {
            TitleCell, AuthorCell, WaitingTime
        },
        data: function () {
            return {
                approval: {
                    supportNested: true,
                    tblClass: 'table table-hover',
                    columns: [
                        { title: '#', field: 'id', sortable: true },
                        { title: this.lang('Title'), field: 'project_name', sortable: true, tdComp: TitleCell, tdClass:'table-title' },
                        { title: this.lang('Author'), field: 'owner', tdComp: AuthorCell },
                        { title: this.lang('Creation Date'), field: 'created_at', sortable: true },
                        { title: this.lang('Waiting Approval'), field: 'approved_on', sortable: true, tdComp: WaitingTime },
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                unfinished: {
                    supportNested: true,
                    tblClass: 'table table-hover',
                    columns: [
                        { title: '#', field: 'id', sortable: true },
                        { title: this.lang('Title'), field: 'project_name', sortable: true, tdComp: TitleCell, tdClass:'table-title' },
                        { title: this.lang('Author'), field: 'owner',  tdComp: AuthorCell },
                        { title: this.lang('Creation Date'), field: 'created_at', sortable: true  },
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                deleted: {
                    supportNested: true,
                    tblClass: 'table table-hover',
                    columns: [
                        { title: '#', field: 'id', sortable: true },
                        { title: this.lang('Title'), field: 'project_name', sortable: true, tdComp: TitleCell, tdClass:'table-title' },
                        { title: this.lang('Author'), field: 'owner', tdComp: AuthorCell },
                        { title: this.lang('Creation Date'), field: 'created_at', sortable: true  },
                        { title: this.lang('Deleted Date'), field: 'deleted_at', sortable: true  },
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                active: {
                    supportNested: true,
                    tblClass: 'table table-hover',
                    columns: [
                        { title: '#', field: 'id', sortable: true },
                        { title: this.lang('Title'), field: 'project_name', sortable: true, tdComp: TitleCell, tdClass:'table-title' },
                        { title: this.lang('Author'), field: 'owner', tdComp: AuthorCell },
                        { title: this.lang('Creation Date'), field: 'created_at', sortable: true  },
                        { title: this.lang('Current Status'), field: 'step', sortable: true },
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                rejected: {
                    supportNested: true,
                    tblClass: 'table table-hover',
                    columns: [
                        { title: '#', field: 'id', sortable: true },
                        { title: this.lang('Title'), field: 'project_name', sortable: true, tdComp: TitleCell, tdClass:'table-title' },
                        { title: this.lang('Author'), field: 'owner', tdComp: AuthorCell },
                        { title: this.lang('Creation Date'), field: 'created_at', sortable: true  },
                        { title: this.lang('Rejected'), field: 'approved_on', sortable: true  },
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
                archive: {
                    supportNested: true,
                    tblClass: 'table table-hover',
                    columns: [
                        { title: '#', field: 'id', sortable: true },
                        { title: this.lang('Title'), field: 'project_name', sortable: true, tdComp: TitleCell, tdClass:'table-title' },
                        { title: this.lang('Author'), field: 'owner', tdComp: AuthorCell },
                        { title: this.lang('Creation Date'), field: 'created_at', sortable: true  },
                        { title: this.lang('Completion Date'), field: 'completed_at', sortable: true  },
                    ],
                    data: [],
                    total: 0,
                    query: {},
                    HeaderSettings: false
                },
            }
        },
        watch: {
            'approval.query': {
                handler () {
                    this.handleApprovalQueryChange()
                },
                deep: true
            },
            'unfinished.query': {
                handler () {
                    this.handleUnfinishedQueryChange()
                },
                deep: true
            },
            'active.query': {
                handler () {
                    this.handleActiveQueryChange()
                },
                deep: true
            },
            'rejected.query': {
                handler () {
                    this.handleRejectedQueryChange()
                },
                deep: true
            },
            'deleted.query': {
                handler () {
                    this.handleDeletedQueryChange()
                },
                deep: true
            },
            'archive.query': {
                handler () {
                    this.handleArchiveQueryChange()
                },
                deep: true
            }
        },
        methods: {
            handleApprovalQueryChange () {
                axios.post('/api/propositions/approval', this.approval.query)
                .then((res) => {
                    this.approval.data = res.data.rows;
                    this.approval.total = res.data.total;
                })
            },
            handleUnfinishedQueryChange () {
                axios.post('/api/propositions/unfinished', this.unfinished.query)
                    .then((res) => {
                        this.unfinished.data = res.data.rows;
                        this.unfinished.total = res.data.total;
                    })
            },
            handleActiveQueryChange () {
                axios.post('/api/propositions/active', this.active.query)
                    .then((res) => {
                        this.active.data = res.data.rows;
                        this.active.total = res.data.total;
                    })
            },
            handleRejectedQueryChange () {
                axios.post('/api/propositions/rejected', this.rejected.query)
                    .then((res) => {
                        this.rejected.data = res.data.rows;
                        this.rejected.total = res.data.total;
                    })
            },
            handleDeletedQueryChange () {
                axios.post('/api/propositions/deleted', this.deleted.query)
                    .then((res) => {
                        this.deleted.data = res.data.rows;
                        this.deleted.total = res.data.total;
                    })
            },
            handleArchiveQueryChange () {
                axios.post('/api/propositions/archive', this.archive.query)
                    .then((res) => {
                        this.archive.data = res.data.rows;
                        this.archive.total = res.data.total;
                    })
            },
        }
    }
</script>