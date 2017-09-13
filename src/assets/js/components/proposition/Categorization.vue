<template>
    <div class="content">
    <div class="page-name-xl mb-4 mt-3">{{ lang('Categorization') }}</div>
    <div class="page-name-l mb-4">{{ lang('Basic Categorization') }}</div>
    <div class="row">
        <div class="col-md-12">
            <select class="mdb-select" id="supergroup" v-model="supergroup">
                <option disabled >{{ lang('Choose Category') }}</option>
                <template v-if="Object.keys(categories).length">
                    <option v-for="(item, key) in categories" v-bind:value="key">{{ item.name }}</option>
                </template>
            </select>
            <label>{{ lang('Supergroup') }}</label>
            <div class="row">

               <div class="col-md-6">
                    <select class="mdb-select" v-model="upgroup">
                        <option disabled >{{ lang('Choose Category') }}</option>
                        <template v-if="supergroup && Object.keys(categories).length">
                        <option v-for="(item, key) in categories[supergroup]['groups']" v-bind:value="key">{{ item.name }}</option>
                        </template>
                    </select>
                    <label>{{ lang('Upgroup') }}</label>
                </div>

                <div class="col-md-6">
                    <select class="mdb-select" v-model="group">
                        <option disabled >{{ lang('Choose Category') }}</option>
                        <template v-if="upgroup && Object.keys(categories).length">
                        <option v-for="(item, key) in categories[supergroup]['groups'][upgroup]['groups']" v-bind:value="key">{{ item.name }}</option>
                        </template>
                    </select>
                    <label>{{ lang('Group') }}</label>
                </div>
            </div>

        </div>
    </div>

    <div class="page-name-l mt-1 mb-4">{{ lang('Book Type') }}</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="book_type_group">
                <option disabled >{{ lang('Choose Category') }}</option>
                <option v-for="(item, key) in book_types" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('Main Group') }}</label>
        </div>

        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="book_type">
                <option disabled>{{ lang('Choose Category') }}</option>
                <template v-if="book_type_group && Object.keys(book_types).length">

                    <option v-for="(item, key) in book_types[book_type_group].groups" v-bind:value="key">{{ item.name }}</option>
                </template>
            </select>
            <label>{{ lang('Group') }}</label>
        </div>
    </div>

    <div class="page-name-l mt-1 mb-4">{{ lang('School') }}</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="categorization['school_type']" multiple searchable="Search here..">
                <option v-for="(item, key) in school_types" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('School type') }}</label>
            <!-- Checkbox -->
        </div>
        <div class="col-md-6 mb-1">
            <div class="page-name-m">{{ lang('Lektira') }}</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio01" value="yes"  v-model="categorization['school_assignment']">
                    <label for="radio01">{{ lang('Da') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio02" value="no"  v-model="categorization['school_assignment']">
                    <label for="radio02">{{ lang('Ne') }}</label>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Checkbox -->
    <div class="page-name-m">{{ lang('Class in Elementary') }}</div>
    <div class="form-inline">
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox11" value="1" v-model="categorization['school_level']">
            <label for="checkbox11">{{ lang('1.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox21" value="2" v-model="categorization['school_level']">
            <label for="checkbox21">{{ lang('2.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox31" value="3" v-model="categorization['school_level']">
            <label for="checkbox31">{{ lang('3.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox41" value="4" v-model="categorization['school_level']">
            <label for="checkbox41">{{ lang('4.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox51" value="5" v-model="categorization['school_level']">
            <label for="checkbox51">{{ lang('5.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox61" value="6" v-model="categorization['school_level']">
            <label for="checkbox61">{{ lang('6.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox71" value="7" v-model="categorization['school_level']">
            <label for="checkbox71">{{ lang('7.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox81" value="8" v-model="categorization['school_level']">
            <label for="checkbox81">{{ lang('8.') }}</label>
        </fieldset>
    </div>
    <!-- Checkbox -->
    <div class="page-name-m mt-1">{{ lang('Class in High School') }}</div>
    <div class="form-inline">
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox11a" value="1s" v-model="categorization['school_level']">
            <label for="checkbox11a">{{ lang('1.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox21a" value="2s" v-model="categorization['school_level']">
            <label for="checkbox21a">{{ lang('2.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox31a" value="3s" v-model="categorization['school_level']">
            <label for="checkbox31a">{{ lang('3.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox41a" value="4s" v-model="categorization['school_level']">
            <label for="checkbox41a">{{ lang('4.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox51a" value="5s" v-model="categorization['school_level']">
            <label for="checkbox51a">{{ lang('5.') }}</label>
        </fieldset>
    </div>



    <div class="page-name-l mt-4 mb-4">{{ lang('Subjects') }}</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="school_subject">
                <option disabled >{{ lang('Choose Category') }}</option>
                <option v-for="(item, key) in school_subjects" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('Field') }}</label>
        </div>

        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="school_subject_detailed">
                <option disabled >{{ lang('Choose Category') }}</option>
                <template v-if="school_subject && Object.keys(school_subjects).length">
                <option v-for="(item, key) in school_subjects[school_subject].subjects" v-bind:value="key">{{ item.name }}</option>
                </template>
            </select>
            <label>{{ lang('Field Detailed') }}</label>
        </div>
    </div>

    <div class="page-name-l mt-1 mb-4">{{ lang('Bibliography') }}</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="categorization['biblioteca']">
                <option disabled >{{ lang('Choose Category') }}</option>
                <option v-for="(item, key) in bibliotecas" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('Bibliography') }}</label>
        </div>
    </div>



    <!-- Textarea -->
    <div class="md-form mt-3">
        <textarea id="categorization_note" class="md-textarea" v-model="categorization['note']"></textarea>
        <label for="categorization_note">{{ lang('Note') }}</label>
    </div>
    <footer-buttons></footer-buttons>
</div>
</template>

<script>
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function() {
            return {
                categories: {},
                book_types: {},
                school_types: {},
                school_subjects: {},
                bibliotecas: {}
            }
        },
        components: {
            'footer-buttons': FooterButtons
        },
        mounted: function() {
            if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id});
            }
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 1});
            axios.get('/api/book/category')
                .then((res) => {
                    this.categories = res.data;
                });
            axios.get('/api/book/types')
                .then((res) => {
                    this.book_types = res.data;
                });
            axios.get('/api/book/schools')
                .then((res) => {
                    this.school_types = res.data;
                });
            axios.get('/api/book/subjects')
                .then((res) => {
                    this.school_subjects = res.data;
                });
            axios.get('/api/book/bibliotecas')
                .then((res) => {
                    this.bibliotecas = res.data;
                });
        },
        updated: function() {
            $('.mdb-select').material_select('destroy');
            $('.mdb-select').material_select();
        },
        computed: {
            categorization() {
                return this.$deepModel('proposition.proposition.categorization');
            },
            supergroup: {
                get() { return this.$store.state.proposition.proposition.categorization.supergroup; },
                set(value) {
                    this.$store.commit('proposition/updateProposition', {key: 'supergroup', group: 'categorization', value: value});
                    this.$store.commit('proposition/updateProposition', {key: 'supergroup_text', group: 'categorization', value: this.categories[value].name});
                    this.$store.commit('proposition/updateProposition', {key: 'upgroup', group: 'categorization', value: 0});
                    this.$store.commit('proposition/updateProposition', {key: 'group', group: 'categorization', value: 0});


                }
            },
            upgroup: {
                    get() { return this.$store.state.proposition.proposition.categorization.upgroup; },
                    set(value) {
                        this.$store.commit('proposition/updateProposition', {key: 'upgroup', group: 'categorization', value: value});
                        this.$store.commit('proposition/updateProposition', {key: 'group', group: 'categorization', value: 0});
                    }
            },
            group: {
                get() { return this.$store.state.proposition.proposition.categorization.group; },
                set(value) {
                    this.$store.commit('proposition/updateProposition', {key: 'group', group: 'categorization', value: value});
                    if (value) {
                        this.$store.commit('proposition/updateProposition', {
                            key: 'group_text',
                            group: 'categorization',
                            value: this.categories[this.supergroup]['groups'][this.upgroup]['groups'][value].name
                        })
                    }
                }
            },

            book_type_group: {
                get() { return this.$store.state.proposition.proposition.categorization.book_type_group; },
                set(value) {
                    this.$store.commit('proposition/updateProposition', {key: 'book_type_group', group: 'categorization', value: value});
                    this.$store.commit('proposition/updateProposition', {key: 'book_type', group: 'categorization', value: 0});
                }
            },
            book_type: {
                get() { return this.$store.state.proposition.proposition.categorization.book_type; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'book_type', group: 'categorization', value: value}) }
            },
            school_assignment: {
                get() { return this.$store.state.proposition.proposition.categorization.school_assignment; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'school_assignment', group: 'categorization', value: value}) }
            },
            school_subject: {
                get() { return this.$store.state.proposition.proposition.categorization.school_subject; },
                set(value) {
                    this.$store.commit('proposition/updateProposition', {key: 'school_subject', group: 'categorization', value: value});
                    this.$store.commit('proposition/updateProposition', {key: 'school_subject_detailed', group: 'categorization', value: 0});
                }
            },
            school_subject_detailed: {
                get() { return this.$store.state.proposition.proposition.categorization.school_subject_detailed; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'school_subject_detailed', group: 'categorization', value: value}) }
            }
        },
        methods: {
        }
    }
</script>
