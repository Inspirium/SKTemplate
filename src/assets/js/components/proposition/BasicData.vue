<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Basic Data') }}</div>
        <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="title" class="form-control" name="title" v-bind:placeholder="lang('Title')" required v-model="basic_data.title">
                <label for="title" class="">{{ lang('Title') }}</label>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form d-flex addon--small">
                        <input type="text" id="author" class="form-control mdb-autocomplete" name="author" v-bind:placeholder="lang('Search for Author')" v-model="author" v-on:keyup="autocomplete($event)">
                        <ul class="mdb-autocomplete-wrap" v-if="suggestions.length">
                            <li v-for="(item, index) in suggestions" v-on:click="autocompleteSelect(index)">{{ item.first_name }} {{ item.last_name }}</li>
                        </ul>
                        <label for="author" class="">{{ lang('Author') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon--small" type="button" >{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <button class="btn btn-assign btn-addon mb-4 mr-5" type="button" v-on:click="openAuthorModal">{{ lang('Add New Author') }}</button>
            <div class="chip mb-3" v-for="(author, index) in basic_data.authors" v-bind:key="author.id">
<!--                <img v-bind:src="author.image">--> {{ author.name }}
                <i class="close fa fa-times" v-on:click="authorDelete(author.id)"></i>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-4">
                <textarea id="concept" name="concept" class="md-textarea" v-model="basic_data.concept"></textarea>
                <label for="concept">{{ lang('Concept') }}</label>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m">{{ lang('Manuscript') }}</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="manuscript" type="radio" id="ordered" value="ordered" v-model="basic_data.manuscript">
                    <label for="ordered">{{ lang('Ordered') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="manuscript" type="radio" id="delivered" value="delivered" v-model="basic_data.manuscript">
                    <label for="delivered">{{ lang('Delivered') }}</label>
                </fieldset>
            </div>
            <template v-if="basic_data.manuscript === 'delivered'">
                <!-- Show only if "Delivered"  -->
                <!-- Documents upload -->
                <button class="btn btn-neutral btn-addon mt-2" type="button" v-on:click="documentAdd">{{ lang('Add Documents') }}</button>

                <!-- File/document table -->
                <div class="files mt-2 mb-2">
                    <div class="file-box file-box-l d-flex align-items-center" v-for="(document,index) in basic_data.manuscript_documents">
                        <a v-bind:href="document.link" v-on:click.prevent="documentDownload(document.link)" class="file-icon">{{ document.title }}</a>
                        <div class="file-box-sty ml-auto d-flex">
                            <a v-bind:href="'/human_resources/employee/'+document.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="document.owner.image">
                                {{ document.owner.name }}
                            </a></div>
                        <div class="file-box-sty">{{ document.created_at | moment("DD.MM.YYYY.") }}</div>
                        <div class="file-box-sty icon icon-download" v-on:click="documentDownload(document.link)">{{ lang('Download') }}</div>
                        <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning(document.id)">{{ lang('Delete') }}</div>
                    </div>
                </div>
                <!-- Show only if "Delivered"  -->
            </template>


            <!--/. Checkbox -->
            <div class="page-name-m mt-3">{{ lang('Dotation') }}</div>
            <div class="form-inline mb-4">
                <fieldset class="form-group">
                    <input name="dotation" type="radio" id="dot-yes" value="yes" v-model="basic_data.dotation">
                    <label for="dot-yes">{{ lang('Yes') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="dotation" type="radio" id="dot-no" value="no" v-model="basic_data.dotation">
                    <label for="dot-no">{{ lang('No') }}</label>
                </fieldset>
            </div>
            <template v-if="basic_data.dotation === 'yes'">
                <!-- Show only if "Yes"  -->
                <!-- Input field -->
                <div class="row  mt-4">
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="dot-origin" class="form-control" name="dotation-origin" v-model="basic_data.dotation_origin">
                            <label for="dot-origin" class="">{{ lang('Dotation Origin') }}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="dot-amount" class="form-control" name="dotation-ammount" v-model="basic_data.dotation_amount">
                            <label for="dot-amount">{{ lang('Amount') }}</label>
                        </div>
                    </div>
                </div>
                <!-- Show only if "Yes"  -->
            </template>

            <!--/. Checkbox -->
            <div class="page-name-m mt-2">{{ lang('Possible Products') }}</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-ebook" value="ebook" v-model="basic_data.possible_products">
                    <label for="products-ebook">{{ lang('E-book') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-website" value="website" v-model="basic_data.possible_products">
                    <label for="products-website">{{ lang('Website') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-app" value="app" v-model="basic_data.possible_products">
                    <label for="products-app">{{ lang('App') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-lang" value="language" v-model="basic_data.possible_products">
                    <label for="products-lang">{{ lang('Additional Language') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-short" value="short" v-model="basic_data.possible_products">
                    <label for="products-short">{{ lang('Short Edition') }}</label>
                </fieldset>
            </div>
            <!-- Textarea -->
            <div class="md-form mt-5">
                <textarea id="note" name="note" v-model="basic_data.note" class="md-textarea"></textarea>
                <label for="note">{{ lang('Note') }}</label>
            </div>
        </div>

        <upload-modal action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" dir="manuscripts" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
    </div>

    <authors-modal v-on:authorAdded="authorAdded"></authors-modal>
    </div>
</template>

<script>
    export default {
        name: 'BasicData',
        data: function() {
            return {
                cancel: false,
                author: '',
                suggestions: []
            }
        },
        methods: {
            documentAdd: function() {
                jQuery('#upload-modal').modal('show');
            },
            documentDownload: function(link) {
                window.open(link, "_blank");
                return false;
            },
            fileWarning(id) {
                this.$store.dispatch('proposition/listenForWarning', {vue: this, data: {id: id}});
                jQuery('#modal-warning').modal('show');
            },
            fileAdd: function(data) {
                this.$store.commit('proposition/basic_data/addFile', data.file);
            },
            fileNameSave: function(data) {
                this.$store.dispatch('proposition/basic_data/filenameSave', {id:data.file.id, title:data.file.title});
            },
            autocomplete: function(event) {
                if (this.cancel) {
                    this.cancel();
                    this.cancel = false;
                }
                let CancelToken = axios.CancelToken;
                if (this.author.length > 2) {
                    axios.get('/api/author/search/' + this.author, {
                        cancelToken: new CancelToken((c) => {
                            this.cancel = c;
                        })
                    })
                        .then((response) => {
                            this.suggestions = response.data;
                        })
                        .catch((error) => {});
                }
            },
            autocompleteSelect: function(index) {
                this.$store.commit('proposition/basic_data/addAuthor', this.suggestions[index]);
                this.suggestions = [];
                this.author = '';
            },
            authorDelete: function(id) {
                this.$store.commit('proposition/basic_data/removeAuthor', id)
            },
            openAuthorModal: function() {
                jQuery('#centralModalAuthors').modal('show');
            },
            authorAdded: function(user) {
                this.$store.commit('proposition/basic_data/addAuthor', user);
                this.suggestions = [];
                this.author = '';
            }
        },
        computed: {
            basic_data() {
                return this.$deepModel('proposition.basic_data');
            }
        }
    }
</script>
