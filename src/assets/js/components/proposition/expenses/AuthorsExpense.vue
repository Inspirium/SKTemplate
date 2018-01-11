<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">{{ lang('Authors Expenses') }}</div>
    <div class="row">
        <div class="col-md-12">
            <template v-for="(author,index) in expenses.authors">
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-4">{{ author.name }}</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" v-bind:placeholder="author.expenses[0].parent?author.expenses[0].parent.amount:lang('Amount')" v-model="author.expenses[0].amount">
                        <label for="form1">{{ lang('Amount') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form2" class="form-control" v-bind:placeholder="author.expenses[0].parent?author.expenses[0].parent.percentage:lang('Percentage')" v-model="author.expenses[0].percentage">
                        <label for="form2">{{ lang('Percentage') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form d-flex addon">
                        <input type="text" id="form3" class="form-control" v-bind:placeholder="author.expenses[0].parent?author.expenses[0].parent.accontation:lang('Accontation')" v-model="author.expenses[0].accontation">
                        <label for="form3">{{ lang('Accontation') }}</label>
                    </div>
                </div>
            </div>
                <div class="row" v-for="(a, i) in author.expenses[0].additional_expenses" v-bind:key="i">
                    <div class="col-md-4">
                        <div class="md-form d-flex addon">
                            <input type="text" class="form-control" v-bind:placeholder="a.parent?a.parent.expense:lang('Expense')" v-model="a.expense">
                            <label>{{ lang('Expense Name') }}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form d-flex addon">
                            <input type="text" class="form-control" v-bind:placeholder="a.parent?a.parent.amount:lang('Amount')" v-model="a.amount">
                            <label>{{ lang('Amount') }}</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-danger btn-addon" v-on:click="deleteExpense(author.id, i)">{{ lang('Delete Expense') }}</button>
                    </div>
                </div>
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
                <input type="text" class="form-control" v-model="a.expense" v-bind:placeholder="a.parent?a.parent.expense:lang('Expense')">
                <label>{{ lang('Expense Name') }}</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="md-form d-flex addon">
                <input type="text" class="form-control" v-bind:placeholder="a.parent?a.parent.amount:lang('Amount')" v-model="a.amount">
                <label>{{ lang('Amount') }}</label>
            </div>
        </div>
        <div class="col-md-4">
            <button class="btn btn-danger btn-addon btn-addon" v-on:click="deleteOtherExpense(i)">{{ lang('Delete Expense') }}</button>
        </div>
    </div>
    <button class="btn btn-neutral btn-addon" type="button" v-on:click="addOtherExpense">{{ lang('Add New Author Expense') }}</button>

    <proposition-footer-buttons v-on:warningSaved="next"></proposition-footer-buttons>
</div>
</template>

<script>
    import FooterButtons from '../partials/FooterButtons.vue'
    import {mapState} from 'vuex'
    export default {
        data: function() {
            return {
                next: false
            }
        },
        components: {
            'footer-buttons': FooterButtons
        },
        computed: {
            expenses() {
                return this.$deepModel('proposition.authors_expense');
            },
            ...mapState('proposition/authors_expense', ['placeholders'])
        },
        methods: {
            addExpense: function(author) {
                this.$store.commit('proposition/authors_expense/addExpense', author);
            },
            deleteExpense: function(author, index) {
                this.$store.commit('proposition/authors_expense/deleteExpense', { author: author, index: index });
            },
            addOtherExpense: function() {
                this.$store.commit('proposition/authors_expense/addOtherExpense');
            },
            deleteOtherExpense: function(index) {
                this.$store.commit('proposition/authors_expense/deleteOtherExpense', index);
            }
        },
        beforeRouteLeave(to, from, next) {
            if (this.$store.state.edited) {
                this.next = next;
                $('#modal-warning-not-saved').modal('show');
            }
            else {
                next();
            }
        }
    }
</script>
