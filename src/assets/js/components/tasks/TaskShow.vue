<template>
    <div>
        <template v-if="task.id">
            <template v-if="task.type==3">
                <div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="col-md-12">
                        <h1 class="display-3 text-white text-center">{{ task.name }}</h1>
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
                                <img class="profile-m-2 mr-1 float-left" src="/images/profile.jpg">
                                <h6 class="white-label">{{ lang('Assign to') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.related.requestees[0].name }}</h3>
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
                                <router-link class="btn btn-neutral btn-addon mb-4 mr-5" v-bind:to="task.related_link" v-if="task.related_link">{{ lang('Go To Project') }}</router-link>
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

                    <!-- Footer buttons -->
                    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                        <button v-if="task.related.status === 'requested'" type="submit" class="btn btn-lg btn-save" v-on:click="approveRequest">{{ lang('Approve') }}</button>
                        <button v-if="task.related.status === 'requested'" type="submit" class="btn btn-lg btn-cancel" v-on:click="rejectRequest">{{ lang('Reject') }}</button>
                    </div>
                </div>
            </template>
            <template v-else>
                <div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="col-md-12">
                        <h1 class="display-3 text-white text-center">{{ task.name }}</h1>
                    </div>
                </div>

                <!-- Display fileds -->
                <div class="content">
                    <div class="profile-head pb-2 row">
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" src="/images/profile.jpg">
                                <h6 class="white-label">{{ lang('Assigner') }}</h6>
                                <h3 class="mb-1 text-white">{{ task.assigner.name }}</h3>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#">
                                <img class="profile-m-2 mr-1 float-left" src="/images/profile.jpg">
                                <h6 class="white-label">{{ lang('Assign to') }}</h6>
                                <h3 class="mb-1 text-white">{{ }}</h3>
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
                    <div class="stopwatch">
                        <div class="stopwatch-counter">

                        </div>
                        <div class="stopwatch-controls">
                            <div class="modal-footer btn-footer">
                                <button class="btn btn-lg btn-blank btn-start-icon">{{ lang('Play') }}</button>
                                <button class="btn btn-lg btn-blank btn-stop-icon">{{ lang('Stop') }}</button>
                            </div>
                        </div>
                    </div>

                    <!-- Highlighted input filed -->
                    <div class="page-name-xl mt-4">{{ lang('Task Completion Time') }}</div>
                    <div class="grey-box mb-5 pt-5 pb-3 px-3 mx-auto">
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <!-- Input field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="hours"  class="form-control">
                                            <label for="hours" class="">{{ lang('Hours') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="minutes" class="form-control">
                                            <label for="minutes" class="">{{ lang('Minutes') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Task description -->
                    <div class="showdata-box row">
                        <div class="col-md-9">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Description') }}</div>
                            <div>
                                <h4 class="mb-1">{{ task.description }}</h4>
                                <button type="button" class="btn btn-neutral btn-addon mb-4 mr-5" v-bind:href="task.related_link" v-if="task.related_link">{{ lang('Go To Project') }}</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="page-name-l mt-2 mb-1">{{ lang('Task Type') }}</div>
                            <div>
                                <h4 v-bind:class="['mb-1', task_types[task.type].className]">{{ task_types[task.type].title }}</h4>
                            </div>
                        </div>
                    </div>

                    <template v-if="documents">
                    <!-- File/document table -->
                    <div class="page-name-l mb-1 mt-2">{{ lang('Documents') }}</div>
                    <div class="files mt-2 mb-2">
                        <div class="file-box file-box-l d-flex align-items-center">
                            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="/images/profile.jpg">Jelena Lončarić
                                </a></div>
                            <div class="file-box-sty">19.07.2017.</div>
                            <div class="file-box-sty icon icon-download">Preuzmi</div>
                            <div class="file-box-sty icon icon-cancel">Obriši</div>
                        </div>
                        <div class="file-box file-box-l d-flex align-items-center">
                            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="/images/profile.jpg">Jelena Lončarić
                                </a></div>
                            <div class="file-box-sty">19.07.2017.</div>
                            <div class="file-box-sty icon icon-download">Preuzmi</div>
                            <div class="file-box-sty icon icon-cancel">Obriši</div>
                        </div>
                    </div>

                    <!-- Footer buttons -->
                        <template v-if="task.status==='new'">
                        <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                            <button type="submit" class="btn btn-lg btn-save">{{ lang('Accept') }}</button>
                            <button type="submit" class="btn btn-lg btn-cancel">{{ lang('Reject') }}</button>
                            <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">{{ lang('Assign to...') }}</button>
                        </div>
                        </template>
                        <template v-else>

                        </template>

                    <!-- File/document table -->
                    <div class="page-name-xl mb-1">{{ lang('Documents') }}</div>
                    <div class="files mt-2 mb-2">
                        <div class="file-box file-box-l d-flex align-items-center">
                            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="/images/profile.jpg">Stjepan Drmić
                                </a></div>
                            <div class="file-box-sty">19.07.2017.</div>
                            <div class="file-box-sty icon icon-download">Preuzmi</div>
                            <div class="file-box-sty icon icon-cancel">Obriši</div>
                        </div>
                    </div>
                    <button class="btn btn-neutral d-block mx-auto btn-addon" type="button">{{ lang('Upload') }}</button>

                    <!-- Footer buttons -->
                    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                        <button type="submit" class="btn btn-lg btn-attention">{{ lang('Send on Approval') }}</button>
                    </div>

                    <!-- File/document table -->
                    <div class="page-name-xl mb-1">{{ lang('Documents') }}</div>
                    <div class="files mt-2">
                        <div class="file-box file-box-l d-flex align-items-center" v-for="document in task.documents" v-key="document.id">
                            <a v-bind:href="document.link" class="file-icon">{{ document.title }}</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a href=""><img class="profile-m-1 mr-1 align-self-center" v-bind:src="document.owner.image">{{ document.owner.name }}</a>
                            </div>
                            <div class="file-box-sty">{{ document.created_at | moment( "dd.MM.YYYY." ) }}</div>
                            <div v-bind:class="['file-box-sty icon', this.statuses[document.status].className ]">{{ lang(this.statuses[document.status].title) }}</div>
                        </div>
                        <div class="file-box file-box-l d-flex align-items-center">
                            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="/images/profile.jpg">Stjepan Drmić</a>
                            </div>
                            <div class="file-box-sty">24.07.2017.</div>
                            <div class="file-box-sty icon icon-approval-comments">{{ lang('Comments') }}</div>
                            <div class="file-box-sty icon icon-approval-no">{{ lang('Approval Denied') }}</div>
                        </div>
                        <div class="file-box file-box-l d-flex align-items-center">
                            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                            <div class="file-box-sty ml-auto d-flex">
                                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="/images/profile.jpg">Stjepan Drmić</a>
                            </div>
                            <div class="file-box-sty">24.07.2017.</div>
                            <div class="file-box-sty icon icon-approval-yes">{{ lang('Approved') }}</div>
                        </div>
                    </div>
                    </template>

                    <template v-if="task.thread">
                        <div v-for="message in task.thread[0].messages">
                            <h3>{{ message.sender.name }}</h3>
                            <p>{{ message.message }}</p>
                        </div>
                    </template>

                    <!-- Footer buttons -->
                    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                        <button v-if="task.status === 'new'" type="submit" class="btn btn-lg btn-save" v-on:click="acceptTask">{{ lang('Accept') }}</button>
                        <button type="submit" class="btn btn-lg btn-default" v-on:click="openModal('modal-comment')">{{ lang('Comment') }}</button>
                        <button v-if="task.status === 'new'" type="submit" class="btn btn-lg btn-assign btn-assign-icon" v-on:click="openModal('modal-reassign')">{{ lang('Assign to...') }}</button>
                        <button v-if="task.status === 'accepted'" type="submit" class="btn btn-lg btn-assign btn-assign-icon" v-on:click="completeTask">{{ lang('Complete') }}</button>
                    </div>
                </div>

                <!-- Modal for rejecting task -->
                <modal-commented v-on:commented="commentTask"></modal-commented>
                <!-- Modal for reassigning task -->
                <modal-reassign v-on:reassign="reassignTask"></modal-reassign>
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
    import ModalCommented from '../modals/Comment'
    import ModalReassign from '../modals/TaskReassign'
    export default {
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
                    },
                    3: {
                        title: 'Approval Request',
                        className: 'tasktype-2'
                    }
                },
                documents: false,
                task: {
                    id: '',
                    assigner: {
                        name: ''
                    },
                    user: {
                        name: ''
                    },
                    status : '',
                    thread: {}
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
                }
            }
        },
        components: {
            ModalReassign, ModalCommented,
        },
        methods: {
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
            commentTask(message) {
                axios.post('/api/thread/' + this.task.thread[0].id + '/message', {message: message})
                    .then((res) => {
                        Vue.set(this.task.thread, 0, res.data);
                    })
                    .catch((err) => {});
            },
            reassignTask(employees) {
                axios.post('/api/task/' + this.task.id + '/reassign', {employees: employees})
                    .then((res) => {
                        this.task.status = 'assigned';
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
            }
        },
        mounted: function() {
            let id = this.$route.params.id;
            axios.get('/api/task/' + id)
                .then((res) => {
                    this.task = res.data.task;
                })
                .catch((err) => {});
        }
    }
</script>