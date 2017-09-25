<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Multimedia') }}</div>
        
        <!-- Textarea -->
        <div class="md-form mt-5">
            <textarea id="note" name="note" class="md-textarea"></textarea>
            <label for="note">{{ lang('webshop description') }}</label>
        </div>
        
        <div class="page-name-l mb-3 mt-1">{{ lang('Cover - JPG format') }}</div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" data-dismiss="modal">{{ lang('Upload') }}</button>
        </div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Cover 3D - PSD format') }}</div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" data-dismiss="modal">{{ lang('Upload') }}</button>
        </div>
        <footer-buttons></footer-buttons> 
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