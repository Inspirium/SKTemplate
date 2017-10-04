<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Authors Expenses') }}</div>
    <div class="row">
        <div class="col-md-12">
            <template v-for="author in authors">
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-4">{{ author.name }}</div>
            <div class="row" v-if="Object.keys(expenses['expenses']).length">
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="lang('Amount')" v-model="expenses['expenses'][author.id].amount">
                        <label for="form1">{{ lang('Amount') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="lang('Precentage')" v-model="expenses['expenses'][author.id].percentage">
                        <label for="form2">{{ lang('Percentage') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form3" class="form-control" v-bind:placeholder="lang('Accontation')" v-model="expenses['expenses'][author.id].accontation">
                        <label for="form3">{{ lang('Accontation') }}</label>
                    </div>
                </div>
            </div>
                <template v-if="expenses.expenses[author.id]">
                <div class="row" v-for="(a, i) in expenses.expenses[author.id].additional_expenses" v-bind:key="i">
                    <div class="col-md-4">
                        <div class="md-form d-flex addon">
                            <input type="text" class="form-control" v-bind:placeholder="lang('Expense Name')" v-model="expenses['expenses'][author.id]['additional_expenses'][i]['expense']">
                            <label>{{ lang('Expense Name') }}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form d-flex addon">
                            <input type="text" class="form-control" v-bind:placeholder="lang('Amount')" v-model="expenses['expenses'][author.id]['additional_expenses'][i]['amount']">
                            <label>{{ lang('Amount') }}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-danger btn-addon" v-on:click="deleteExpense(author.id, i)">{{ lang('Delete Expense') }}</button>
                    </div>
                </div>
                </template>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-5" type="button" v-on:click="addExpense(author.id)">{{ lang('Add New Expense') }}</button>
            </template>
            <div class="row">
                <div class="col-md-12">
                    <!-- Textarea -->
                    <div class="md-form mt-4">
                        <textarea id="form76" class="md-textarea" v-bind:value="expenses.note"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add new item -->
    <div class="page-name-l mb-3">{{ lang('Other Expenses') }}</div>
    <div class="row mt-4" v-for="(a, i) in expenses.other" v-bind:key="i">
        <div class="col-md-4">
            <div class="md-form d-flex addon">
                <input type="text" class="form-control" v-bind:placeholder="lang('Expense Name')" v-model="expenses.other[i].expense">
                <label>{{ lang('Expense Name') }}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-form d-flex addon">
                <input type="text" class="form-control" v-bind:placeholder="lang('Amount')" v-model="expenses.other[i].amount">
                <label>{{ lang('Amount') }}</label>
            </div>
        </div>
        <div class="col-md-4">
            <button class="btn btn-danger btn-addon btn-addon" v-on:click="deleteOtherExpense(i)">{{ lang('Delete Expense') }}</button>
        </div>
    </div>
    <button class="btn btn-neutral btn-addon" type="button" v-on:click="addOtherExpense">{{ lang('Add New Author Expense') }}</button>

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
            addExpense: function(author) {
                this.$store.commit('proposition/addAuthorExpense', {author: author});
            },
            deleteExpense: function(author, index) {
                this.$store.commit('proposition/deleteAuthorExpense', { author: author, index: index });
            },
            addOtherExpense: function() {
                this.$store.commit('proposition/pushToArray', {group:'authors_expense', key: 'other', value: {expense: '', amount: ''} });
            },
            deleteOtherExpense: function(index) {
                this.$store.commit('proposition/removeFromArray', {group:'authors_expense', key: 'other',  index: index });
            }
        },
        mounted: function() {
            if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id})
                    .then(() => {
                        this.$store.dispatch('proposition/initAuthorExpenses');
                    })
            }
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 5});
            this.$store.dispatch('proposition/initAuthorExpenses');
        }
    }
</script>
