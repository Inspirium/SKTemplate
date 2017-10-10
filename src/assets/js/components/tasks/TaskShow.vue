<template>
    <div>
        <div class="profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <h1 class="display-3 text-white text-center">{{ task.name }}</h1>
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
                                    <input type="text" id="form1" class="form-control">
                                    <label for="form1" class="">{{ lang('Hours') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" id="form1" class="form-control">
                                    <label for="form1" class="">{{ lang('Minutes') }}</label>
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
            <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                <button type="submit" class="btn btn-lg btn-save">{{ lang('Accept') }}</button>
                <button type="submit" class="btn btn-lg btn-cancel">{{ lang('Reject') }}</button>
                <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">{{ lang('Assign to...') }}</button>
            </div>

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

            <!-- Footer buttons -->
            <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
                <button v-if="task.status === 'new'" type="submit" class="btn btn-lg btn-save" v-on:click="acceptTask">{{ lang('Accept') }}</button>
                <button type="submit" class="btn btn-lg btn-cancel">{{ lang('Reject') }}</button>
                <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">{{ lang('Assign to...') }}</button>
            </div>
        </div>
    </div>
</template>
<script>
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
                    status : ''
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
        computed: {},
        methods: {
            acceptTask: function() {
                axios.post('/api/task/' + this.task.id + '/accept')
                    .then((res) => {
                    this.task.status = 'old';
                    })
                    .catch((err) => {});
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