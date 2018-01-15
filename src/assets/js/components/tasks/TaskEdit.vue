<template>
    <div>
    <div class="profile-head row pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-12">
            <h1 class="display-3 text-white text-center">{{ lang('New Task') }}</h1>
        </div>
    </div>

    <!-- Display fileds -->
    <div class="content">

        <!-- Input fields -->
        <div class="page-name-xl mb-4 mt-3">{{ lang('Task Details') }}</div>
        <div class="row">
            <div class="col-md-6">
                <!-- Input field -->
                <div class="md-form">
                    <input type="text" id="name" class="form-control" v-model="task.name">
                    <label for="name">{{ lang('Task Name') }}</label>
                </div>
                <!--/. Input field -->

                <!-- Input field -->
                <div class="md-form d-flex mt-5 addon">
                    <input type="text" id="users" class="form-control mdb-autocomplete" placeholder="Pronađi osobu" v-model="user" v-on:keyup="employeeComplete($event)">
                    <ul class="mdb-autocomplete-wrap" v-if="e_suggestions.length">
                        <li v-for="(item, index) in e_suggestions" v-on:click="employeeCompleteSelect(index)">{{ item.first_name }} {{ item.last_name }}</li>
                    </ul>
                    <label for="users" class="">{{ lang('Assign Person') }}</label>
                </div>
                <div class="chip mb-3" v-for="user in task.users" v-bind:key="user.id">
                    <img v-bind:src="user.image"> {{ user.name }}<i class="close fa fa-times"></i>
                </div>

                <div class="md-form d-flex mt-5 addon">
                    <input type="text" id="form1" class="form-control" placeholder="Pronađi odjeljenje" v-model="department" v-on:keyup="departmentComplete($event)">
                    <ul class="mdb-autocomplete-wrap" v-if="d_suggestions.length">
                        <li v-for="(item, index) in d_suggestions" v-on:click="departmentCompleteSelect(index)">{{ item.title }}</li>
                    </ul>
                    <label for="form1" class="">{{ lang('Assign Department') }}</label>
                </div>
                <div class="chip mb-3" v-for="department in task.departments" v-bind:key="department.id">
                    {{ department.name }}<i class="close fa fa-times"></i>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Date Picker -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="md-form">
                            <input placeholder="Odaberi datum" type="text" id="date-picker-example" class="form-control datepicker btn-white" v-model="task.deadline">
                            <label for="date-picker-example">{{ lang('Deadline') }}</label>
                        </div>
                    </div>
                </div>
                <!--/. Checkbox -->
                <div class="page-name-m">{{ lang('Priority') }}</div>
                <div class="form-inline mb-3">
                    <fieldset class="form-group">
                        <input name="priority" type="radio" id="radio11" value="high" v-model="task.priority">
                        <label for="radio11">{{ lang('High') }}</label>
                    </fieldset>
                    <fieldset class="form-group">
                        <input name="priority" type="radio" id="radio21" value="medium" v-model="task.priority">
                        <label for="radio21">{{ lang('Medium') }}</label>
                    </fieldset>
                    <fieldset class="form-group">
                        <input name="priority" type="radio" id="radio31" value="low" v-model="task.priority">
                        <label for="radio31">{{ lang('Low') }}</label>
                    </fieldset>
                </div>
                <!--/. Checkbox -->

                <!-- Textarea -->
                <div class="md-form mt-5">
                    <textarea id="form76" class="md-textarea" v-model="task.description"></textarea>
                    <label for="form76">{{ lang('Task Description') }}</label>
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
        <template v-if="task.id">
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
        </template>
        <!-- Footer buttons -->
        <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
            <spinner-button v-on:button_clicked="submitTask" v-on:button_cleanup_success="redirect" v-bind:title="'Submit'"></spinner-button>
        </div>
        <!--/. Footer buttons -->
        <warning-modal v-on:warningConfirmed="listenForWarning" v-on:warningCanceled="clearDelete"></warning-modal>
        <upload-modal id="initial-documents" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" v-bind:dir="task.files.path" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <upload-modal id="final-documents" action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" v-bind:dir="task.files.path" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave" v-bind:isFinal="true"></upload-modal>
    </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                user: '',
                department: '',
                e_suggestions: [],
                d_suggestions: [],
                task: {
                    name: '',
                    description: '',
                    users: [],
                    departments: [],
                    priority: '',
                    deadline: '',
                    files: {
                        initial: [],
                        final: [],
                        path: 'tasks'
                    }
                },
                type_to_delete: false,
                index_to_delete: false
            }
        },
        computed: {},
        methods: {
            employeeComplete: function(event) {
                if (this.cancel) {
                    this.cancel();
                    this.cancel = false;
                }
                let CancelToken = axios.CancelToken;
                if (this.user.length > 2) {
                    axios.get('/api/human_resources/employee/search/' + this.user, {
                        cancelToken: new CancelToken((c) => {
                            this.cancel = c;
                        })
                    })
                        .then((response) => {
                            this.e_suggestions = response.data;
                        })
                        .catch((error) => {});
                }
            },
            employeeCompleteSelect: function(index) {
                this.task.users.splice(0,1,this.e_suggestions[index]);
                this.e_suggestions = [];
                this.user = '';
            },
            departmentComplete: function(event) {
                if (this.cancel) {
                    this.cancel();
                    this.cancel = false;
                }
                let CancelToken = axios.CancelToken;
                if (this.user.length > 2) {
                    axios.get('/api/human_resources/department/search/' + this.department, {
                        cancelToken: new CancelToken((c) => {
                            this.cancel = c;
                        })
                    })
                        .then((response) => {
                            this.d_suggestions = response.data;
                        })
                        .catch((error) => {});
                }
            },
            departmentCompleteSelect: function(index) {
                this.task.departments.push(this.d_suggestions[index]);
                this.d_suggestions = [];
                this.department = '';
            },
            submitTask() {
                if (typeof(this.$route.params.id) !== 'undefined') {
                    axios.put('/api/task/' + this.$route.params.id, this.task)
                        .then((res) => {
                            this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                        })
                        .catch((err) => {
                            this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                            toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                    })
                }
                else {
                    axios.post('/api/task', this.task)
                        .then((res) => {
                            this.$eventHub.emit('BUTTON_LISTEN_FOR_SUCCESS');
                            toastr.success(this.lang('Zadatak poslan'));
                        })
                        .catch((err) => {
                            this.$eventHub.emit('BUTTON_LISTEN_FOR_FAILURE');
                            toastr.error(this.lang('Došlo je do problema. Pokušajte ponovno'));
                    });
                }

            },
            redirect() {
                this.$router.push('/tasks');
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
            listenForWarning() {
                if (this.index_to_delete) {
                    this.fileDelete();
                }
            },
            clearDelete() {
                this.type_to_delete = false;
                this.index_to_delete = false;
            }
        },
        mounted: function() {
            $('.datepicker').pickadate({
                format: 'dd. mm. yyyy.',
                onSet: (context) => {
                    let date = new Date(context.select);
                    date = this.$options.filters.moment(date, 'DD. MM. YYYY.');
                    this.task.deadline = date;
                    //this.vuexSet('proposition.proposition.deadline.date', date);
                }
            });
            if (typeof(this.$route.params.id) !== 'undefined') {
                axios.get('/api/task/' + this.$route.params.id)
                    .then((res) => {})
                    .catch((err) => {});
            }
        }
    }
</script>