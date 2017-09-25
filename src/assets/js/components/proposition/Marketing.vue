<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Marketing materials') }}</div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Cover - PDF format') }}</div>
        <div class="justify-content-center d-flex mb-4">
            <button type="button" class="btn btn-neutral" data-dismiss="modal">{{ lang('Upload') }}</button>
        </div>
        <div class="page-name-l mb-3 mt-1">{{ lang('Leaflet') }}</div>
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