<template>
    <div class="content">
    <div class="page-name-xl mt-3 mb-1">{{ lang('Marketing Budget') }}</div>
    <div class="row">
        <div class="col-md-12">
            <!-- Circulation Number -->
            <div class="col-md-12 mb-3">
                <h6 class="text-center no-border display-e">{{ lang('Total') }}</h6>
                <h1 class="text-center display-2">{{ total | flexCurrency(' kn', 2) }}</h1>
            </div>
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-4">{{ lang('Marketing Budget') }}</div>
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form input-group d-flex addon">
                        <input type="text" id="form1" class="form-control" v-model="expenses.expense" v-bind:placeholder="expenses.parent.expense">
                        <label for="form1" class="">{{ lang('Expense') }}</label>
                        <span class="input-group-addon">{{ lang('Kn') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Textarea -->
                    <div class="md-form mt-3">
                        <textarea id="form76" class="md-textarea" v-model="expenses.note"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Input field -->
    <div class="page-name-l mb-1">{{ lang('Additional Expenses') }}</div>
    <div class="row mt-4" v-for="(a, i) in expenses.additional_expenses" v-bind:key="i">
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
            <button class="btn btn-danger btn-addon" v-on:click="deleteExpense(i)">{{ lang('Delete Expense') }}</button>
        </div>
    </div>
    <button class="btn btn-neutral btn-addon" type="button" v-on:click="addExpense">{{ lang('Add New Expense') }}</button>
</div>
</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {
            expenses() {
                return this.$deepModel('proposition.marketing_expense');
            },
            total: function() {
                return Number(this.expenses.expense) +  _.sumBy(this.expenses.additional_expenses, function(o) { return Number(o.amount) });
            }
        },
        methods: {
            addExpense: function() {
                this.$store.commit('proposition/marketing_expense/addExpense');
            },
            deleteExpense: function(index) {
                this.$store.commit('proposition/marketing_expense/deleteExpense', index);
            }
        }
    }
</script>