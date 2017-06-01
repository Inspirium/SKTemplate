<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <template v-for="author in authors">
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">{{ author.name }}</div>
            <div class="row" v-for="item in author.expenses">
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="lang('Currency')">
                        <label for="form1">{{ lang('Expense') }}</label>
                        <span class="input-group-addon">{{ lang('Kn') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="lang('In Precentage')">
                        <label for="form2">{{ lang('Advance Payment') }}</label>
                    </div>
                </div>
            </div>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-3" type="button">{{ lang('Add New Expense') }}</button>

            <div class="row">
                <div class="col-md-12">
                    <!-- Textarea -->
                    <div class="md-form">
                        <textarea id="form76" class="md-textarea"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
            </template>
        </div>
    </div>

    <!-- Add new item -->
    <div class="page-name-l mb-1">{{ lang('Other Expenses') }}</div>
    <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add New Author Expense') }}</button>

</div>
</template>

<script>
    export default {
        data: function() {
            return {}
        },
        computed: {},
        methods: {}
    }
</script>
