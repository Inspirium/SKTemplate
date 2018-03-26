<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang( 'Authors' ) }}</div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="form_author_name" class="form-control" required v-model="first_name">
                            <label for="form_author_name" class="">{{ lang('First Name') }}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="form_author_lastname" class="form-control" required v-model="last_name">
                            <label for="form_author_lastname" class="">{{ lang('Last Name') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="form_author_title" class="form-control" required v-model="title">
                            <label for="form_author_title" class="">{{ lang('Formal title') }}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="form_author_occupation" class="form-control" required v-model="occupation">
                            <label for="form_author_occupation" class="">{{ lang('Occupation') }}</label>
                        </div>
                    </div>
                </div>
                <div class="md-form">
                    <input type="text" id="form_author_work" class="form-control" required v-model="work">
                    <label for="form_author_work" class="">{{ lang('Working in') }}</label>
                </div>
                <!-- Textarea -->
                <div class="md-form mt-3">
                    <textarea id="note" class="md-textarea" v-model="note"></textarea>
                    <label for="note">{{ lang('Note') }}</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AuthorShow",
        data() {
            return {
                first_name : '',
                last_name : '',
                occupation : '',
                title : '',
                work : '',
                note: ''
            }
        },
        mounted() {
            axios.get('/api/author/' + this.$route.params.id)
                .then((res) => {
                    this.first_name = res.data.first_name;
                    this.last_name = res.data.last_name;
                    this.occupation = res.data.occupation;
                    this.title = res.data.title;
                    this.work = res.data.work;
                    this.note = res.data.note;
                })
                .catch();
        }
    }
</script>