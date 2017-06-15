<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <template v-for="author in authors">
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">{{ author.name }}</div>
            <div class="row" v-for="expense in expenses[author.id].expenses">
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="lang('Currency')" v-bind:value="expense.expense">
                        <label for="form1">{{ lang('Expense') }}</label>
                        <span class="input-group-addon">{{ lang('Kn') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="lang('In Precentage')" v-bind:value="expense.percentage">
                        <label for="form2">{{ lang('Advance Payment') }}</label>
                    </div>
                </div>
            </div>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-3" type="button" v-on:click="addExpense(author.id)">{{ lang('Add New Expense') }}</button>

            <div class="row">
                <div class="col-md-12">
                    <!-- Textarea -->
                    <div class="md-form">
                        <textarea id="form76" class="md-textarea" v-bind:value="expenses[author.id].note"></textarea>
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
    import {mapState} from 'vuex'
    export default {
        data: function() {
            return {}
        },
        computed: mapState({
            expenses: state => state.proposition.proposition.authors_expense.expenses,
            authors: state => state.proposition.proposition.basic_data.authors
        }),
        methods: {
            addExpense: function(id) {
                this.$store.commit('proposition/pushToArray', {})
            }
        },
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 5});
            this.$store.dispatch('proposition/initAuthorExpenses');
        }
    }
</script>
