<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Basic Info') }}</div>
        <div class="row">
            <div class="col-md-6">
                <div class="md-form">
                    <input type="text" id="form1" class="form-control" v-model="department.name" required>
                    <label for="form1" class="">{{ lang('First Name') }}</label>
                </div>
            </div>
        </div>
        <!-- Footer buttons -->
        <div class="btn-footer mt-2 mb-5 d-flex p-2">
            <button type="submit" class="btn btn-lg btn-save" v-on:click="saveDepartment">{{ lang('Save') }}</button>
            <button type="button" class="btn btn-lg btn-cancel" v-on:click="$router.go(-1)">{{ lang('Cancel') }}</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                department: {
                    name: ''
                }
            }
        },
        methods: {
            saveDepartment() {
                if (this.$route.params.id) {
                    axios.put('/api/human_resources/department/' + this.$route.params.id, this.department).then((res) => {
                        toastr.success(this.lang('Succesfully saved a department'));
                        window.location.href= '/human_resources/department/'+res.data.id+'/edit';
                    });
                } else {
                    axios.post('/api/human_resources/department', this.department)
                        .then((res) => {
                            toastr.success(this.lang('Succesfully saved a department'));
                            window.location.href= '/human_resources/department/'+res.data.id+'/edit';
                        })
                }
            }
        },
        mounted() {
            if (this.$route.params.id) {
                axios.get('/api/human_resources/department/' + this.$route.params.id)
                    .then((res) => {
                        this.department = res.data;

                    })
                    .catch(() => {});
            }

        }
    }
</script>