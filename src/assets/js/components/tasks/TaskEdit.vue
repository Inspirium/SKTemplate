<template>
    <div>
    <div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-white text-center">{{ lang('New Task') }}</h1>
    </div>

    <!-- Display fileds -->
    <div class="content">

        <!-- Input fields -->
        <div class="page-name-xl mb-2 mt-2">{{ lang('Task Details') }}</div>
        <div class="row">
            <div class="col-md-6">
                <!-- Input field -->
                <div class="md-form">
                    <input type="text" id="name" class="form-control" v-model="task.name">
                    <label for="name">{{ lang('Task Name') }}</label>
                </div>
                <!--/. Input field -->

                <!-- Input field -->
                <div class="md-form d-flex addon">
                    <input type="text" id="users" class="form-control mdb-autocomplete" v-model="user" v-on:keyup="employeeComplete($event)">
                    <ul class="mdb-autocomplete-wrap" v-if="e_suggestions.length">
                        <li v-for="(item, index) in e_suggestions" v-on:click="employeeCompleteSelect(index)">{{ item.first_name }} {{ item.last_name }}</li>
                    </ul>
                    <label for="users" class="">{{ lang('Assign Person') }}</label>
                </div>
                <div class="chip mb-3" v-for="user in task.users" v-bind:key="user.id">
                    <img v-bind:src="user.image"> {{ user.name }}<i class="close fa fa-times"></i>
                </div>

                <div class="md-form d-flex addon">
                    <input type="text" id="form1" class="form-control" v-model="department" v-on:keyup="departmentComplete($event)">
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
                            <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker btn-white" v-model="task.deadline">
                            <label for="date-picker-example">{{ lang('Select Date') }}</label>
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
                <div class="md-form">
                    <textarea id="form76" class="md-textarea" v-model="task.description"></textarea>
                    <label for="form76">{{ lang('Task description') }}</label>
                </div>
            </div>
        </div>

        <!-- Documents upload -->
        <div class="page-name-l mb-1">{{ lang('Documents') }}</div>
        <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add Documents') }}</button>

        <!-- File/document table -->
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center" v-for="document in task.documents">
                <a v-bind:href="document.link" class="file-icon">{{ document.name }}</a>
                <div class="file-box-sty ml-auto d-flex">
                    <img class="profile-m-1 mr-3 float-left align-self-center" v-bind:src="document.owner.image">{{ document.owner.name }}
                </div>
                <div class="file-box-sty">{{ document.created_at | moment("dd.MM.YYYY.") }}</div>
                <div class="file-box-sty icon icon-download">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel">Obriši</div>
            </div>
        </div>

        <!-- Footer buttons -->
        <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
            <button type="submit" class="btn btn-lg btn-save" v-on:click="submitTask">{{ lang('Submit') }}</button>
        </div>
        <!--/. Footer buttons -->
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
                    documents: []
                }
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
                this.task.users.push(this.e_suggestions[index]);
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
                            this.$router.push('/tasks');
                        })
                        .catch((err) => {})
                }
                else {
                    axios.post('/api/task', this.task)
                        .then((res) => {
                            this.$router.push('/tasks');
                        })
                        .catch((err) => {});
                }

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