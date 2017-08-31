<template>
    <div class="content">
        <div class="page-name-xl mb-3">{{ lang('Market Potential') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="form1" class="form-control" v-model="market_potential['main_target']" v-bind:placeholder="lang('Title')">
                <label for="form1">{{ lang('Main Target') }}</label>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea id="form76" class="md-textarea" v-model="market_potential['note']"></textarea>
                <label for="form76">{{ lang('Note') }}</label>
            </div>

            <!-- Documents upload -->
            <div class="page-name-m mt-2">{{ lang('Documents') }}</div>
            <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add Documents') }}</button>

            <!-- File/document table -->
            <div class="files mt-2 mb-2">
                <div class="file-box file-box-l d-flex align-items-center" v-for="item in market_potential['market_potential_documents']">
                    <a href="http://homestead.app/images/profile.pdf" class="file-icon">{{ item.title }}</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a href=""><img class="profile-m-1 mr-1 align-self-center" src="/images/profile.jpg" href="#">{{ item.author }}
                        </a></div>
                    <div class="file-box-sty">{{ item.created_at | moment("d.m.Y") }}</div>
                    <div class="file-box-sty icon icon-download">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel">Obriši</div>
                </div>
            </div>
        </div>
    </div>
        <upload-modal action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" dir="manuscripts" v-on:fileDelete="fileDelete" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
        <footer-buttons></footer-buttons>
    </div>
</template>

<script>
    import FooterButtons from './partials/FooterButtons.vue'
    import uploadModal from '../general/UploadModal.vue';
    export default {
        data: function() {
            return {}
        },
        components: {
            'footer-buttons' : FooterButtons,
            'upload-modal' : uploadModal
        },
        computed: {
            market_potential() {
                return this.$deepModel('proposition.proposition.market_potential');
            }
        },
        methods: {
            fileDelete: function (id) {
                this.$store.dispatch('proposition/deleteFile', {group:'market_potential', key:'market_potential_documents', id: id});
            },
            fileAdd: function(file) {
                this.$store.commit('proposition/addFile', {group:'market_potential', key:'market_potential_documents', file: file})
            },
            fileNameSave: function(id, title) {
                this.$store.dispatch('proposition/fileNameSave', {group:'market_potential', key:'market_potential_documents', id:id, title:title});
            },
        },
        mounted: function() {
            if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id});
            }
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 2});
        }
    }
</script>
