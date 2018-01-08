<template>
    <div>
        <template v-if="task.id">
            <template v-if="task.type==3">
                <div class="content">
                    <div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="col-md-12">
                            <h1 class="display-3 text-white text-center">{{ task.name }}</h1>
                        </div>
                    </div>
                </div>

                <!-- Display fileds -->
                <div class="content">
                    <div class="profile-head pb-2 row">
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" v-bind:src="task.assigner.image">
                                <h6 class="white-label">{{ lang('Assigner') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.assigner.name }}</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" v-bind:src="task.assignee.image">
                                <h6 class="white-label">{{ lang('Assign to') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.assignee.name }}</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h6 class="white-label">{{ lang('Task Sent') }}</h6>
                            <h3 class="mb-1 text-white">{{ task.created_at | moment("DD.MM.") }}</h3>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>

                    <!-- Task description -->
                    <div class="showdata-box row">
                        <div class="col-md-9">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Description') }}</div>
                            <div>
                                <h4 class="mb-1">
                                    {{ task.assigner.name }} has requested an expense approval for {{ task.related.name }} expense.<br>
                                    {{ task.description }}<br>
                                </h4>
                                <a class="btn btn-neutral btn-addon mb-4 mr-5" v-bind:href="task.related_link" v-if="task.related_link">{{ lang('Go To Project') }}</a>
                            </div>
                            <table class="table">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>{{ lang('Item') }}</th>
                                    <th class="text-right">{{ lang('Budget') }}</th>
                                    <th class="text-right">{{ lang('Expense Total') }}</th>
                                    <th class="text-right">{{ lang('Difference') }}</th>
                                </tr>
                                </thead>
                                <tbody class="white">
                                <tr>
                                    <td v-bind:data-title="lang('Title')">{{ lang(task.related.name) }}</td>
                                    <td class="text-right" v-bind:data-title="lang('Budget')">{{ task.related.budget | flexCurrency(' kn', 2) }}</td>
                                    <td class="text-right" v-bind:data-title="lang('Expense Total')">{{ task.related.expense | flexCurrency(' kn', 2) }}</td>
                                    <td class="text-right" v-bind:data-title="lang('Difference')">{{ Math.abs(task.related.budget - task.related.expense) | flexCurrency(' kn', 2) }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Type') }}</div>
                            <div>
                                <h4 v-bind:class="['mb-1', task_types[task.type].className]">{{ task_types[task.type].title }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="comments">
                        <div class="page-name-xl mb-3">{{ lang('Comments') }}</div>
                        <!-- Textarea -->
                        <div class="content">
                            <div class="md-form mb-1">
                                <textarea class="md-textarea" v-model="comment"></textarea>
                            </div>
                        </div>
                        <div class="justify-content-end d-flex mb-2">
                            <button type="button" class="btn btn-neutral" v-on:click="commentTask()">{{ lang('Send') }}</button>
                        </div>
                        <template v-if="task.thread">
                            <div v-for="message in filteredMessages">
                                <h3 class="page-name-l mb-1"><span>{{ message.sender.name }},</span> {{ message.created_at | moment('DD.MM.YYYY., H:mm:ss') }}</h3>
                                <p class="mb-4">{{ message.message }}</p>
                            </div>
                        </template>
                    </div>

                    <!-- Footer buttons -->
                    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                        <button v-if="task.related.status === 'requested'" type="submit" class="btn btn-lg btn-save" v-on:click="approveRequest">{{ lang('Approve') }}</button>
                        <button v-if="task.related.status === 'requested'" type="submit" class="btn btn-lg btn-cancel" v-on:click="rejectRequest">{{ lang('Reject') }}</button>
                    </div>
                </div>
            </template>
            <template v-else-if="task.type==5">
                <div class="content">
                    <div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="col-md-12">
                            <h1 class="display-3 text-white text-center">{{ task.name }}</h1>
                        </div>
                    </div>
                </div>

                <!-- Display fileds -->
                <div class="content">
                    <div class="profile-head pb-2 row">
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" v-bind:src="task.assigner.image">
                                <h6 class="white-label">{{ lang('Assigner') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.assigner.name }}</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" v-bind:src="task.assignee.image">
                                <h6 class="white-label">{{ lang('Assign to') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.assignee.name }}</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h6 class="white-label">{{ lang('Task Sent') }}</h6>
                            <h3 class="mb-1 text-white">{{ task.created_at | moment("DD.MM.") }}</h3>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>

                    <!-- Task description -->
                    <div class="showdata-box row">
                        <div class="col-md-9">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Description') }}</div>
                            <div>
                                <h4 class="mb-1">
                                    {{ task.assigner.name }} {{ lang('has requested an proposition approval') }}<br>
                                    {{ task.description }}<br>
                                </h4>
                                <a class="btn btn-neutral btn-addon mb-4 mr-5" v-bind:href="task.related_link" v-if="task.related_link">{{ lang('Go To Project') }}</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Type') }}</div>
                            <div>
                                <h4 v-bind:class="['mb-1', task_types[task.type].className]">{{ task_types[task.type].title }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="comments">
                        <div class="page-name-xl mb-3">{{ lang('Comments') }}</div>
                        <!-- Textarea -->
                        <div class="content">
                            <div class="md-form mb-1">
                                <textarea class="md-textarea" v-model="comment"></textarea>
                            </div>
                        </div>
                        <div class="justify-content-end d-flex mb-2">
                            <button type="button" class="btn btn-neutral" v-on:click="commentTask()">{{ lang('Send') }}</button>
                        </div>
                        <template v-if="task.thread">
                            <div v-for="message in filteredMessages">
                                <h3 class="page-name-l mb-1"><span>{{ message.sender.name }},</span> {{ message.created_at | moment('DD.MM.YYYY., H:mm:ss') }}</h3>
                                <p class="mb-4">{{ message.message }}</p>
                            </div>
                        </template>
                    </div>

                    <!-- Footer buttons -->
                    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                        <button v-if="task.related.status === 'requested'" type="submit" class="btn btn-lg btn-save" v-on:click="approveRequest">{{ lang('Approve') }}</button>
                        <button v-if="task.related.status === 'requested'" type="submit" class="btn btn-lg btn-cancel" v-on:click="rejectRequest">{{ lang('Reject') }}</button>
                    </div>
                </div>
            </template>
            <template v-else>
                <div class="content">
                    <div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="col-md-12">
                            <h1 class="display-3 text-white text-center">{{ task.name }}</h1>
                        </div>
                    </div>
                </div>


                <!-- Display fileds -->
                <div class="content">
                    <div class="profile-head pb-2 row">
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" v-bind:src="task.assigner.image">
                                <h6 class="white-label">{{ lang('Assigner') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.assigner.name }}</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" v-bind:src="task.assignee.image">
                                <h6 class="white-label">{{ lang('Assign to') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.assignee.name }}</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h6 class="white-label">{{ lang('Task Sent') }}</h6>
                            <h3 class="mb-1 text-white">{{ task.created_at | moment("DD.MM.") }}</h3>
                        </div>
                        <div class="col-md-3">
                            <h6 class="white-label">{{ lang('Deadline / Priority') }}<span class="badge badge-danger display-d mt-1 float-right">{{ lang(priorities[task.priority]) }}</span></h6>
                            <h3 class="mb-1 text-white">{{ task.deadline | moment("DD.MM.") }}</h3>
                        </div>
                    </div>

                    <!-- Stopwatch -->
                    <div class="page-name-xl mt-2 mb-4">{{ lang('Working Time') }}</div>
                    <div class="stopwatch mt-3">
                        <div class="stopwatch-counter">
                            <div class="clock"></div>
                        </div>
                        <div class="stopwatch-controls">
                            <div class="d-flex justify-content-center mt-2">
                                <button id="play" class="btn btn-lg btn-success btn-start-icon" v-on:click="startClock">{{ lang('Play') }}</button>
                                <button id="stop" class="btn btn-lg btn-danger btn-stop-icon" v-on:click="stopClock">{{ lang('Stop') }}</button>
                            </div>
                        </div>
                    </div>

                   <!-- Task description -->
                    <div class="showdata-box row">
                        <div class="col-md-9">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Description') }}</div>
                            <div>
                                <h4 class="mb-1">{{ task.description }}</h4>
                                <a class="btn btn-neutral btn-addon mb-4 mr-5" v-bind:href="task.related_link" v-if="task.related_link">{{ lang('Go To Project') }}</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Type') }}</div>
                            <div>
                                <h4 v-bind:class="['mb-1', task_types[task.type].className]">{{ task_types[task.type].title }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Initial Documents -->
                    <div class="page-name-xl mt-4">{{ lang('Initial Documents') }}</div>
                    <div class="files mt-2 mb-2">
                        <div class="file-box file-box-l d-flex align-items-center" v-for="(document,index) in task.files.initial">
                            <a v-bind:href="document.link" v-on:click.prevent="documentDownload(document.link)" class="file-icon">{{ document.title }}</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a v-bind:href="'/human_resources/employee/'+document.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="document.owner.image">
                                    {{ document.owner.name }}
                                </a></div>
                            <div class="file-box-sty">{{ document.date }}</div>
                            <div class="file-box-sty icon icon-download" v-on:click="documentDownload(document.link)">{{ lang('Download') }}</div>
                            <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning(index, 'initial')">{{ lang('Delete') }}</div>
                        </div>
                    </div>

                    <div class="justify-content-center d-flex mt-2 mb-4">
                        <button type="button" class="btn btn-neutral" v-on:click="documentAdd('initial-documents')">{{ lang('Upload') }}</button>
                    </div>

                    <!-- Final Documents -->
                    <div class="page-name-xl mt-4">{{ lang('Final Documents') }}</div>
                    <div class="files mt-2 mb-2">
                        <div class="file-box file-box-l d-flex align-items-center" v-for="(document,index) in task.files.final">
                            <a v-bind:href="document.link" v-on:click.prevent="documentDownload(document.link)" class="file-icon">{{ document.title }}</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a v-bind:href="'/human_resources/employee/'+document.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="document.owner.image">
                                    {{ document.owner.name }}
                                </a></div>
                            <div class="file-box-sty">{{ document.date }}</div>
                            <div class="file-box-sty icon icon-download" v-on:click="documentDownload(document.link)">{{ lang('Download') }}</div>
                            <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning(index, 'final')">{{ lang('Delete') }}</div>
                        </div>
                    </div>

                    <div class="justify-content-center d-flex mt-2 mb-4">
                        <button type="button" class="btn btn-neutral" v-on:click="documentAdd('final-documents')">{{ lang('Upload') }}</button>
                    </div>

                    <div class="comments">
                            <div class="page-name-xl mb-3">{{ lang('Comments') }}</div>
                            <!-- Textarea -->
                            <div class="content">
                                <div class="md-form mb-1">
                                    <textarea class="md-textarea" v-model="comment"></textarea>
                                </div>
                            </div>
                            <div class="justify-content-end d-flex mb-2">
                                <button type="button" class="btn btn-neutral" v-on:click="commentTask()">{{ lang('Send') }}</button>
                            </div>
                            <template v-if="task.thread">
                                <div v-for="message in filteredMessages">
                                    <h3 class="page-name-l mb-1"><span>{{ message.sender.name }},</span> {{ message.created_at | moment('DD.MM.YYYY., H:mm:ss') }}</h3>
                                    <p class="mb-4">{{ message.message }}</p>
                                </div>
                            </template>
                    </div>

                    <!-- Footer buttons -->
                    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                        <button v-if="canAccept()" class="btn btn-lg btn-save" v-on:click="acceptTask">{{ lang('Accept') }}</button>
                        <button v-if="canAssign()" class="btn btn-lg btn-assign btn-assign-icon" v-on:click="openModal('modal-reassign')">{{ lang('Assign to...') }}</button>
                        <button v-if="canComplete()" class="btn btn-lg btn-assign btn-assign-icon" v-on:click="completeTask">{{ lang('Complete') }}</button>
                        <button v-if="canDelete()" class="btn btn-lg btn-cancel" v-on:click="taskDelete">{{ lang('Delete') }}</button>
                    </div>
                </div>

                <upload-modal id="initial-documents" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" v-bind:dir="task.files.path" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
                <upload-modal id="final-documents" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" v-bind:dir="task.files.path" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" v-bind:isFinal="true"></upload-modal>


                <!-- Modal for reassigning task -->
                <modal-reassign v-on:reassign="reassignTask"></modal-reassign>
                <warning-modal v-on:warning="fileDelete"></warning-modal>
            </template>
        </template>
        <template v-else>
            <div class="loading-motion">
                <div class="spinner"></div>
            </div>
        </template>
    </div>
</template>
<script>
    import ModalReassign from '../modals/TaskReassign'
    import uploadModal from '../general/UploadModal'
    import WarningModal from '../modals/WarningModal'
    export default {
        data: function () {
            return {
                clock: false,
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
                        className: 'tasktype-3'
                    },
                    4: {
                        title: 'Assignment',
                        className: 'tasktype-4'
                    },
                    5: {
                        title: 'Approval Request',
                        className: 'tasktype-5'
                    },
                    6: {
                        title: 'Task Order',
                        className: 'tasktype-6'
                    },
                },
                documents: false,
                task: {
                    id: '',
                    assigner: {
                        name: ''
                    },
                    assignee: {
                        name: ''
                    },
                    user: {
                        name: ''
                    },
                    status : '',
                    thread: {},
                    running_elapsed: 0,
                    is_running: false,
                    running_from: 0,
                    files: {
                        initial: [],
                        final: [],
                        path: 'tasks'
                    }
                },
                document_statuses : {
                    pending: {
                        className : 'icon-approval-pending',
                        title : 'Approval Pending...'
                    },
                    denied: {
                        className : 'icon-approval-no',
                        title : 'Approval Denied'
                    },
                    approved: {
                        className : 'icon-approval-yes',
                        title : 'Approved'
                    }
                },
                priorities: {
                    high: 'High',
                    medium: 'Medium',
                    low: 'Low'
                },
                comment: '',
                index_to_delete: 0,
                type_to_delete: 0
            }
        },
        components: {
            ModalReassign, uploadModal, WarningModal
        },
        computed: {
            filteredMessages() {
                return this.task.thread.messages.reverse();
            }
        },
        methods: {
            canAccept() {
                return (this.task.status === 'new' && this.task.assignee.id === window.Laravel.userId)
            },
            canAssign() {
                return (this.task.status === 'new' && this.task.assignee.id === window.Laravel.userId)
            },
            canComplete: function() {
                return (this.task.status === 'accepted' && this.task.assignee.id === window.Laravel.userId);
            },
            canDelete() {
                return (this.task.assigner.id === window.Laravel.userId)
            },
            acceptTask() {
                axios.post('/api/task/' + this.task.id + '/accept')
                    .then((res) => {
                        this.task.status = 'accepted';
                    })
                    .catch((err) => {});
            },
            completeTask() {
                axios.post('/api/task/' + this.task.id + '/complete')
                    .then((res) => {
                        this.$router.push('/tasks')
                    })
                    .catch((err) => {});
            },
            commentTask() {
                axios.post('/api/thread/' + this.task.thread.id + '/message', {message: this.comment})
                    .then((res) => {
                        this.task.thread.messages = res.data;
                        this.comment = '';
                    })
                    .catch((err) => {});
            },
            reassignTask(employees) {
                axios.post('/api/task/' + this.task.id + '/reassign', {employees: employees})
                    .then((res) => {
                        this.task = res.data;
                    })
                    .catch((err) => {});
            },
            approveRequest() {
                axios.post('/api/task/' + this.task.id + '/accept')
                    .then(() => {
                        this.$router.push('/tasks')
                    });
            },
            rejectRequest() {
                axios.post('/api/task/' + this.task.id + '/reject')
                    .then(() => {
                        this.$router.push('/tasks')
                });
            },
            openModal(modal) {
                $('#'+modal).modal('show');
            },
            startClock() {
                if (!this.task.is_running) {
                    axios.post('/api/task/'+this.task.id+'/clock/start')
                        .then(() => {
                            this.task.is_running = true;
                            this.clock.start();
                        })
                }
            },
            stopClock() {
                if (this.task.is_running) {
                    axios.post('/api/task/'+this.task.id+'/clock/stop')
                        .then(() => {
                            this.task.is_running = false;
                            this.clock.stop();
                        })
                }
            },
            documentAdd: function(modal) {
                jQuery('#'+modal).modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileDelete: function (index, type) {
                axios.delete('/api/file/'+ this.task.files[this.type_to_delete][this.index_to_delete].id)
                    .then(() => {
                        this.task.files[this.type_to_delete].splice(this.index_to_delete, 1);
                    });
            },
            fileAdd: function(data) {
                if (data.isFinal) {
                    this.task.files.final.push(data.file);
                }
                else {
                    this.task.files.initial.push(data.file);
                }
                axios.post('/api/task/'+this.$route.params.id+'/file', data)
                    .then(() => {});
            },
            fileNameSave: function(data) {
                let files = this.task.files.initial;
                if (data.isFinal) {
                    files = this.task.files.final;
                }
                _.forEach(files, (o) => {
                    if (o.id === payload.id) {
                        o.title = data.file.title;
                    }
                });
            },
            fileWarning(id, type) {
                this.type_to_delete = type;
                this.index_to_delete = id;
                jQuery('#modal-warning').modal('show');
            },
            taskDelete() {
                axios.delete('/api/task/'+this.task.id)
                    .then(() => {
                        this.$router.push('/tasks');
                    });
            }
        },
        mounted: function() {
            let id = this.$route.params.id;
            axios.get('/api/task/' + id)
                .then((res) => {
                    this.task = res.data.task;
                    setTimeout(() => { //TODO: fix
                        this.clock = new FlipClock( $('.clock'), this.task.running_elapsed, {
                            autoPlay: this.task.is_running,
                            autoStart: this.task.is_running,
                            language: 'Croatian'
                        });
                    }, 1000);
                })
                .catch((err) => {});
        }
    }
</script>