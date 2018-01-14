<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Market Potential') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="form1" class="form-control" v-model="market_potential.main_target" v-bind:placeholder="lang('Title')">
                <label for="form1">{{ lang('Main Target') }}</label>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea id="form76" class="md-textarea" v-model="market_potential.note"></textarea>
                <label for="form76">{{ lang('Note') }}</label>
            </div>

            <!-- Documents upload -->
            <div class="page-name-m mt-2">{{ lang('Documents') }}</div>
            <button class="btn btn-neutral btn-addon" type="button" v-on:click="documentAdd">{{ lang('Add Documents') }}</button>

            <!-- File/document table -->
            <div class="files mt-2 mb-2">
                <div class="file-box file-box-l d-flex align-items-center" v-for="item in market_potential.market_potential_documents">
                    <a v-bind:href="item.link" class="file-icon" v-on:click.prevent="documentDownload(item.link)">{{ item.title }}</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a v-bind:href="'/human_resources/employee/show/'+item.owner.id+'/show'"><img class="profile-m-1 mr-1 align-self-center" v-bind:src="item.owner.image">{{ item.owner.name }}
                        </a></div>
                    <div class="file-box-sty">{{ item.created_at | moment("D.M.Y.") }}</div>
                    <div class="file-box-sty icon icon-download" v-on:click="documentDownload(item.link)">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel" v-on:click="fileWarning(item.id)">Obriši</div>
                </div>
            </div>
        </div>
    </div>
        <upload-modal action="/api/file" accept=".pdf, .doc, .docx, .xls, .xlsx" disk="proposition" dir="market_potential" v-on:fileAdd="fileAdd" v-on:fileNameSave="fileNameSave"></upload-modal>
    </div>
</template>

<script>
    import uploadModal from '../general/UploadModal.vue';
    export default {
        data: function() {
            return {
                index_to_delete: 0,
            }
        },
        components: {
            'upload-modal' : uploadModal
        },
        computed: {
            market_potential() {
                return this.$deepModel('proposition.market_potential');
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
                console.log(id);
                this.$store.dispatch('proposition/listenForWarning', {vue: this, data: id});
                jQuery('#modal-warning').modal('show');
            },
            fileAdd: function(data) {
                this.$store.commit('proposition/market_potential/addFile', data.file)
            },
            fileNameSave: function(data) {
                this.$store.dispatch('proposition/market_potential/filenameSave', {id:data.file.id, title:data.file.title});
            },
        }
    }
</script>
