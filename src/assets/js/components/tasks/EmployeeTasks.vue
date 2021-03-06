<template>
    <div>
        <div class="page-name-xl mb-3 mt-2" v-bind:id="'employee-'+employee.id">
            <a v-bind:href="'/human_resources/employee/'+employee.id+'/show'">
                <img class="profile-m mr-1 my-2" v-bind:src="employee.image">
                {{ employee.first_name + ' ' + employee.last_name }}
                <span class="tag tag-neutral text-white">{{ total }}</span>
            </a>
        </div>

        <datatable v-bind="$data"></datatable>


        <button v-if="canRequestOrder" v-on:click="openModal" type="button" class="btn btn-neutral btn-addon d-block ml-auto waves-effect waves-light">{{ lang('Save tasks priority') }}</button>
        <spinner-button v-if="shouldApprove" classes="btn btn-success btn-addon d-block ml-auto waves-effect waves-light" title="Approve task priority" v-on:button_clicked="approveOrder"></spinner-button>
        <spinner-button v-if="shouldApprove" classes="btn btn-danger btn-addon d-block ml-auto waves-effect waves-light" title="Reject task priority" v-on:button_clicked="rejectOrder"></spinner-button>
    </div>
</template>

<script>
    import TitleCell from '../table_components/TitleCell'
    import AuthorCell from '../table_components/AuthorCell'
    import WaitingTime from '../table_components/WaitingTime'
    import Handle from '../table_components/Handle'
    import NewOrder from '../table_components/NewOrder'
    import DateCell from '../table_components/DateCell'
    import TaskType from '../table_components/TaskType'
    import SpinnerButton from "../general/SpinnerButton";

    export default {
        components: {SpinnerButton},
        name: "employee-tasks",
        props: ['employee'],
        data() {
            return {
                supportNested: true,
                tblClass: 'table',
                columns: [
                    { title: '', field: '', sortable: false, tdComp: Handle },
                    {title: '#', field: 'order', sortable: true},
                    {title: '##', field: 'new_order', sortable: true, tdComp: NewOrder},
                    {
                        title: this.lang('Task'),
                        field: 'name',
                        sortable: true,
                        tdComp: TitleCell,
                        tdClass: 'table-title'
                    },
                    {
                        title: this.lang('Task Type'),
                        field: 'formatted_type',
                        sortable: true,
                        tdComp: TaskType
                    },
                    {
                        title: this.lang('Assigner'),
                        field: 'assigner',
                        tdComp: AuthorCell
                    },
                    {
                        title: this.lang('Created'),
                        field: 'created_at',
                        sortable: true,
                        tdComp: DateCell
                    },
                    {
                        title: this.lang('Deadline'),
                        field: 'deadline',
                        sortable: true,
                        tdComp: DateCell
                    },
                ],
                data: [],
                total: 0,
                query: {},
                HeaderSettings: false,
                draggableOptions: {
                    disabled: false,
                    handle: '.icon-handler'
                },
            }
        },
        created() {
            this.$eventHub.$on('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', this.refreshTasks)
        },
        beforeDestroy() {
            this.$eventHub.$off('UPDATE_DEPARTMENT_EMPLOYEE_TASKS', this.refreshTasks)
        },
        watch: {
            'query': {
                handler (val) {
                    axios.post('/api/tasks/employee/'+this.employee.id, val)
                        .then((res) => {
                            this.data = res.data.tasks;
                            this.total = res.data.total;
                        })
                },
                deep: true
            },
        },
        computed: {
            user() {
                return this.$store.state.employee;
            },
            canRequestOrder() {
                if (this.can('department_tasks_order_approve')) {
                    return false;
                }
                if (this.can('department_tasks_order_edit') && (!this.query.sort || this.query.sort === 'order')) {
                    let e = _.filter(this.data, (t, index) => {
                        if (t.order !== (Number(index)+1)) {
                            return true;
                        }
                    });
                    return e.length;
                }
                return false;
            },
            shouldApprove() {
                if (this.can('department_tasks_order_approve') && (!this.query.sort || this.query.sort === 'new_order')) {
                    let e = _.filter(this.data, (t, index) => {
                        if (t.order !== t.new_order || t.order !== (Number(index)+1)) {
                            return true;
                        }
                    });
                    return e.length;
                }
                return false;
            },
        },
        methods: {
            refreshTasks(payload) {
                if (payload.employee === this.employee.id) {
                    if (!payload.error) {
                        this.query.sort = 'order';
                        this.query.order = 'asc';
                    }
                    this.spinnerType = 'fa-check spinner-success';
                    setTimeout(() => {
                        this.spinnerType = 'fa-refresh spinner-delay-rotate spinner-loader';
                        this.isSpinnerHidden = 'hide';
                        this.saveButton.toggleClass("spinner-loading");
                    }, 1000);
                }
            },
            can(role) {
                return _.find(this.user.roles, (o) => {
                    return o.name === role;
                });
            },
            openModal() {
                let data = _.map(this.data, (o) => {
                    return o.id;
                });
                this.$emit('openModal', {employee: this.employee.id, tasks: data});
            },
            approveOrder() {
                let data = _.map(this.data, (o) => {
                    return o.id;
                });
                this.$emit('approveOrder', {employee: this.employee.id, tasks: data});
            },
            rejectOrder() {
                let data = _.map(this.data, (o) => {
                    return o.id;
                });
                this.$emit('rejectOrder', {employee: this.employee.id, tasks: data});
            }
        }
    }
</script>

<style scoped>

</style>