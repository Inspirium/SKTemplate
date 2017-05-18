<template>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="title" class="form-control" name="title" v-bind:placeholder="lang('Title')" required v-model="title">
                <label for="title" class="">{{ lang('Title') }}</label>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="md-form d-flex addon">
                        <input type="text" id="author" class="form-control mdb-autocomplete" name="author" v-bind:placeholder="lang('Author')">
                        <label for="author" class="">{{ lang('Author') }}</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="chip mb-3" v-for="(author, index) in authors" v-on:chip.delete="author_delete">
                <img v-bind:src="author.image"> {{ author.name }}<i class="close fa fa-times"></i>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-2">
                <textarea id="concept" name="concept" class="md-textarea" v-model="concept"></textarea>
                <label for="concept">{{ lang('Concept') }}</label>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m">{{ lang('Manuscript') }}</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="manuscript" type="radio" id="ordered" value="ordered" v-model="manuscript">
                    <label for="ordered">{{ lang('Ordered') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="manuscript" type="radio" id="delivered" value="delivered" v-model="manuscript">
                    <label for="delivered">{{ lang('Delivered') }}</label>
                </fieldset>
            </div>
            <template v-if="manuscript === 'delivered'">
                <!-- Show only if "Delivered"  -->
                <!-- Documents upload -->
                <button class="btn btn-neutral btn-addon mt-2" type="button" v-on:click="document_add">{{ lang('Add Documents') }}</button>

                <!-- File/document table -->
                <div class="files mt-2 mb-2">
                    <div class="file-box file-box-l d-flex align-items-center" v-for="(document,index) in documents">
                        <a href="http://homestead.app/images/profile.pdf" class="file-icon">{{ document.title }}</a>
                        <div class="file-box-sty ml-auto d-flex">
                            <a href=""><img class="profile-m-1 mr-1 align-self-center" v-bind:src="document.author.image" href="#">
                                {{ document.author.name }}
                            </a></div>
                        <div class="file-box-sty">{{ document.date }}</div>
                        <div class="file-box-sty icon icon-download" v-on:click="document_download(index)">{{ lang('Download') }}</div>
                        <div class="file-box-sty icon icon-cancel" v-on:click="document_delete(index)">{{ lang('Delete') }}</div>
                    </div>
                </div>
                <!-- Show only if "Delivered"  -->
            </template>


            <!--/. Checkbox -->
            <div class="page-name-m mt-2">{{ lang('Dotation') }}</div>
            <div class="form-inline mb-2">
                <fieldset class="form-group">
                    <input name="dotation" type="radio" id="dot-yes" value="yes" v-model="dotation.yes">
                    <label for="dot-yes">{{ lang('Yes') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="dotation" type="radio" id="dot-no" value="no" v-model="dotation.yes">
                    <label for="dot-no">{{ lang('No') }}</label>
                </fieldset>
            </div>
            <template v-if="dotation.yes === 'yes'">
                <!-- Show only if "Yes"  -->
                <!-- Input field -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="dot-origin" class="form-control" name="dotation-origin" v-model="dotation.origin">
                            <label for="dot-origin" class="">{{ lang('Dotation Origin') }}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="dot-ammount" class="form-control" name="dotation-ammount" v-model="dotation.ammount">
                            <label for="dot-ammount" class="">{{ lang('Amount') }}</label>
                        </div>
                    </div>
                </div>
                <!-- Show only if "Yes"  -->
            </template>

            <!-- Textarea -->
            <div class="md-form mt-1">
                <textarea id="note" name="note" v-model="note" class="md-textarea"></textarea>
                <label for="note">{{ lang('Note') }}</label>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m mt-2">{{ lang('Possible Products') }}</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-ebook" value="ebook" v-model="products">
                    <label for="products-ebook">{{ lang('E-book') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-website" value="website" v-model="products">
                    <label for="products-website">{{ lang('Website') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-app" value="app" v-model="products">
                    <label for="products-app">{{ lang('App') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-lang" value="language" v-model="products">
                    <label for="products-lang">{{ lang('Additional Language') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="products" type="checkbox" id="products-short" value="short" v-model="products">
                    <label for="products-short">{{ lang('Short Edition') }}</label>
                </fieldset>
            </div>


        </div>

        <upload-modal action="" accept="pdf,doc,docx"></upload-modal>
    </div>
</template>

<script>
    import uploadModal from '../general/UploadModal.vue';

    export default {
        props: {
            proposition: Object
        },
        data: function() {
            return {
                title: 'Fizika 4',
                authors: [
                    {
                        name: "Vladimir Paar",
                        image: "https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg"
                    }
                ],
                concept: '',
                manuscript: '',
                documents: [],
                dotation: {
                    yes : 'no',
                    origin: '',
                    ammount: ''
                },
                note: '',
                products: [
                    'ebook'
                ]

            }
        },
        components: {
            'upload-modal' : uploadModal
        },
        methods: {
            document_add: function() {
                //TODO: open modal, upload file...
                jQuery('#upload-modal').modal('show');
                this.documents.push({
                    id: 1,
                    title: 'Fizika',
                    author: {
                        name : 'Marko',
                        image : ''
                    },
                    link: ''
                });
            },
            document_download: function(index) {
                window.open(this.documents[index].link, "_blank");
            },
            document_delete: function(index) {
                this.documents.splice(index, 1);
                //TODO: make request
            },
            author_add: function() {
                //TODO: make request
                this.authors.push({
                    name: "Vladimir Paar",
                    image: "https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg"
                });
            },
            author_delete: function(index) {
                this.authors.splice(index, 1);
                //TODO:make request
                console.log("test");
            }
        }
    }
</script>
