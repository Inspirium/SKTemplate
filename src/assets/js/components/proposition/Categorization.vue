<template>
    <div class="content">
    <div class="page-name-xl mb-4 mt-3">{{ lang('Categorization') }}</div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <select class="mdb-select" v-model="categorization.book_tender">
                <option value="" selected>{{ lang('Choose') }}</option>
                <option v-for="(item, key) in book_tenders" v-bind:value="key">{{ item.title }}</option>
                <option value="0">Ostalo</option>
            </select>
            <label>{{ lang('Tender type') }}</label>
            </div>
        </div>
    <div class="page-name-l mb-4">{{ lang('Basic Categorization') }}</div>
    <div class="row">
        <div class="col-md-12">
            <select id="supergroup" class="mdb-select" v-model="supergroup">
                <option value="" selected>{{ lang('Choose Category') }}</option>
                <template v-if="Object.keys(categories).length">
                    <option v-for="(item, key) in categories" v-bind:value="key">{{ item.name }}</option>
                </template>
            </select>
            <label>{{ lang('Supergroup') }}</label>
            <div class="row">

               <div class="col-md-6">
                    <select class="mdb-select" v-model="upgroup">
                        <option value="" selected>{{ lang('Choose Category') }}</option>
                        <template v-if="supergroup && Object.keys(categories).length">
                        <option v-for="(item, key) in categories[supergroup]['groups']" v-bind:value="key">{{ item.name }}</option>
                        </template>
                    </select>
                    <label>{{ lang('Upgroup') }}</label>
                </div>

                <div class="col-md-6">
                    <select class="mdb-select" v-model="group">
                        <option value="" selected>{{ lang('Choose Category') }}</option>
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
                <option value="" selected>{{ lang('Choose Category') }}</option>
                <option v-for="(item, key) in book_types" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('Main Group') }}</label>
        </div>

        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="categorization.book_type">
                <option value="" selected>{{ lang('Choose Category') }}</option>
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
            <select class="mdb-select" v-model="categorization.school_type" multiple v-bind:searchable="lang('Search here...')">
                <option value="" selected>{{ lang('Choose your option') }}</option>
                <option v-for="(item, key) in school_types" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('School type') }}</label>
            <!-- Checkbox -->
        </div>
        <div class="col-md-6 mb-1">
            <div class="page-name-m">{{ lang('Lektira') }}</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio01" value="yes"  v-model="categorization.school_assignment">
                    <label for="radio01">{{ lang('Da') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio02" value="no"  v-model="categorization.school_assignment">
                    <label for="radio02">{{ lang('Ne') }}</label>
                </fieldset>
            </div>
        </div>
    </div>

    <!-- Checkbox -->
    <div class="page-name-m">{{ lang('Class in Elementary') }}</div>
    <div class="form-inline">
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox11" value="1" v-model="categorization.school_level">
            <label for="checkbox11">{{ lang('1.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox21" value="2" v-model="categorization.school_level">
            <label for="checkbox21">{{ lang('2.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox31" value="3" v-model="categorization.school_level">
            <label for="checkbox31">{{ lang('3.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox41" value="4" v-model="categorization.school_level">
            <label for="checkbox41">{{ lang('4.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox51" value="5" v-model="categorization.school_level">
            <label for="checkbox51">{{ lang('5.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox61" value="6" v-model="categorization.school_level">
            <label for="checkbox61">{{ lang('6.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox71" value="7" v-model="categorization.school_level">
            <label for="checkbox71">{{ lang('7.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input name="sex" type="checkbox" id="checkbox81" value="8" v-model="categorization.school_level">
            <label for="checkbox81">{{ lang('8.') }}</label>
        </fieldset>
    </div>
    <!-- Checkbox -->
    <div class="page-name-m mt-1">{{ lang('Class in High School') }}</div>
    <div class="form-inline">
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox11a" value="1s" v-model="categorization.school_level">
            <label for="checkbox11a">{{ lang('1.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox21a" value="2s" v-model="categorization.school_level">
            <label for="checkbox21a">{{ lang('2.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox31a" value="3s" v-model="categorization.school_level">
            <label for="checkbox31a">{{ lang('3.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox41a" value="4s" v-model="categorization.school_level">
            <label for="checkbox41a">{{ lang('4.') }}</label>
        </fieldset>
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox51a" value="5s" v-model="categorization.school_level">
            <label for="checkbox51a">{{ lang('5.') }}</label>
        </fieldset>
    </div>



    <div class="page-name-l mt-4 mb-4">{{ lang('Subjects') }}</div>
    <div class="row">
        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="school_subject">
                <option value="" selected>{{ lang('Choose Category') }}</option>
                <option v-for="(item, key) in school_subjects" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('Field') }}</label>
        </div>

        <!-- Dropdown menu -->
        <div class="col-md-6">
            <select class="mdb-select" v-model="categorization.school_subject_detailed">
                <option value="" selected>{{ lang('Choose Category') }}</option>
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
            <select class="mdb-select" v-model="categorization.biblioteca">
                <option value="" selected>{{ lang('Choose Category') }}</option>
                <option v-for="(item, key) in bibliotecas" v-bind:value="key">{{ item.name }}</option>
            </select>
            <label>{{ lang('Bibliography') }}</label>
        </div>
    </div>



    <!-- Textarea -->
    <div class="md-form mt-3">
        <textarea id="categorization_note" class="md-textarea" v-model="categorization.note"></textarea>
        <label for="categorization_note">{{ lang('Note') }}</label>
    </div>
</div>
</template>

<script>
    export default {
        data: function() {
            return {}
        },
        computed: {
            categories() {
                return this.$store.state.categorization.categories;
            },
            book_types() {
                return this.$store.state.categorization.types;
            },
            school_types() {
                return this.$store.state.categorization.schools;
            },
            school_subjects() {
                return this.$store.state.categorization.subjects;
            },
            bibliotecas() {
                return this.$store.state.categorization.bibliotecas;
            },
            book_tenders() {
                return this.$store.state.categorization.book_tenders;
            },
            categorization() {
                return this.$deepModel('proposition.categorization');
            },
            supergroup: {
                get() { return this.$store.state.proposition.categorization.supergroup; },
                set(value) {
                    this.categorization.supergroup = value;
                    this.categorization.upgroup = 0;
                    this.categorization.group = 0;
                }
            },
            upgroup: {
                    get() { return this.$store.state.proposition.categorization.upgroup; },
                    set(value) {
                        this.categorization.upgroup = value;
                        this.categorization.group = 0;
                    }
            },
            group: {
                get() { return this.$store.state.proposition.categorization.group; },
                set(value) {
                    this.categorization.group = value;
                }
            },
            book_type_group: {
                get() { return this.$store.state.proposition.categorization.book_type_group; },
                set(value) {
                    this.categorization.book_type_group = value;
                    this.categorization.book_type = 0;
                }
            },
            school_subject: {
                get() { return this.$store.state.proposition.categorization.school_subject; },
                set(value) {
                    this.categorization.school_subject = value;
                    this.categorization.school_subject_detailed = 0;
                }
            }
        },
        methods: {

        },
        watch: {
            supergroup: (v, o) => {
                setTimeout( () => {
                    $('.mdb-select').material_select('destroy');
                    $('.mdb-select').material_select();
                }, 500);
            },
            upgroup: (v,o) => {
                setTimeout( () => {
                    $('.mdb-select').material_select('destroy');
                    $('.mdb-select').material_select();
                }, 500);
            },
            book_type_group: (v,o) => {
                setTimeout( () => {
                    $('.mdb-select').material_select('destroy');
                    $('.mdb-select').material_select();
                }, 500);
            },
            school_subject: (v,o) => {
                setTimeout( () => {
                    $('.mdb-select').material_select('destroy');
                    $('.mdb-select').material_select();
                }, 500);
            }
        }
    }
</script>
