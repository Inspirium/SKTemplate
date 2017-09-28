<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Initial Document') }}</div>
        
            <!-- File/document table -->
            <div class="files mt-2 mb-2">
                <div class="file-box file-box-l d-flex align-items-center">
                    <a href="" class="file-icon">Fizika i društvo.doc</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a href=""><img class="profile-m-1 mr-1 align-self-center" src="" href="#">Jelena Lončarić</a>
                    </div>
                    <div class="file-box-sty">19.07.2017.</div>
                    <div class="file-box-sty icon icon-download">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel">Obriši</div>
                </div>
                <div class="file-box file-box-l d-flex align-items-center">
                    <a href="f" class="file-icon">Fizika i društvo.doc</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a href=""><img class="profile-m-1 mr-1 align-self-center" src="" href="#">Jelena Lončarić
                        </a></div>
                    <div class="file-box-sty">19.07.2017.</div>
                    <div class="file-box-sty icon icon-download">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel">Obriši</div>
                </div>
            </div>
                
            <div class="justify-content-center d-flex mb-4">
                <button type="button" class="btn btn-neutral" data-dismiss="modal">{{ lang('Upload') }}</button>
            </div>
            <div class="modal-footer btn-footer">
                <button type="button" class="btn btn-lg btn-save" data-dismiss="modal">{{ lang('Done') }}</button>
            </div>
            <div class="page-name-xl mb-4 mt-5">{{ lang('Final Document') }}</div>
                <div class="justify-content-center d-flex mb-4">
                    <button type="button" class="btn btn-neutral" data-dismiss="modal">{{ lang('Upload') }}</button>
                </div>
            <div class="modal-footer btn-footer">
                <button type="button" class="btn btn-lg btn-save" data-dismiss="modal">{{ lang('Done') }}</button>
            </div>
        
        
        
        
        
    </div>
</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {},
        methods: {}
    }
</script>