<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <template v-for="author in authors">
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">{{ author.name }}</div>
            <div class="row" v-for="(expense, index) in expenses.expenses[author.id]">
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="lang('Amount')" v-model="expenses['expenses['+author.id+'['+index+'.amount]]']">
                        <label for="form1">{{ lang('Amount') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="lang('Precentage')" v-model="expenses['expenses['+author.id+'['+index+'.percentage]]']">
                        <label for="form2">{{ lang('Percentage') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form3" class="form-control" v-bind:placeholder="lang('Accontation')" v-model="expenses['expenses['+author.id+'['+index+'.accontation]]']">
                        <label for="form3">{{ lang('Accontation') }}</label>
                    </div>
                </div>
            </div>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-3" type="button" v-on:click="addExpense(author.id)">{{ lang('Add New Expense') }}</button>
            </template>
            <div class="row">
                <div class="col-md-12">
                    <!-- Textarea -->
                    <div class="md-form">
                        <textarea id="form76" class="md-textarea" v-bind:value="expenses.note"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add new item -->
    <div class="page-name-l mb-1">{{ lang('Other Expenses') }}</div>
    <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add New Author Expense') }}</button>

    <footer-buttons></footer-buttons>
</div>
</template>

<script>
    import FooterButtons from './partials/FooterButtons.vue';
    export default {
        data: function() {
            return {}
        },
        components: {
            'footer-buttons': FooterButtons
        },
        computed: {
            expenses() {
                return this.$deepModel('proposition.proposition.authors_expense');
            },
            authors() {
                return this.$deepModel('proposition.proposition.basic_data.authors');
            }
        },
        methods: {
            addExpense: function(id) {
                //TODO:
            }
        },
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 5});
            this.$store.dispatch('proposition/initAuthorExpenses');
        }
    }
</script>
