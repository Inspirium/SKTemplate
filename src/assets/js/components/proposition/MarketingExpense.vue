<template>
<div>
    <div class="page-name-xl mb-1">{{ lang('Marketing Budget') }}</div>
    <div class="row">
        <div class="col-md-12">
            <!-- Circulation Number -->
            <div class="col-md-12 mb-3">
                <h6 class="text-center no-border display-e">{{ lang('Total') }}</h6>
                <h1 class="text-center display-2">{{ total }} kn</h1>
            </div>
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">{{ lang('Marketing Budget') }}</div>
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form input-group d-flex addon">
                        <input type="text" id="form1" class="form-control" v-model="expenses['expense']">
                        <label for="form1" class="">{{ lang('Expense') }}</label>
                        <span class="input-group-addon">{{ lang('Kn') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Textarea -->
                    <div class="md-form mt-1">
                        <textarea id="form76" class="md-textarea" v-model="expenses['note']"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Input field -->
    <div class="page-name-l mb-1">{{ lang('Additional Expenses') }}</div>
    <template v-if="">
        <div class="row" v-for="(a, i) in expenses.additional_expense" v-bind:key="i">
            <div class="col-md-4">
                <div class="md-form d-flex addon">
                    <input type="text" class="form-control" v-bind:placeholder="lang('Expense Name')" v-model="expenses['additional_expense['+i+'].expense']">
                    <label>{{ lang('Expense Name') }}</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="md-form d-flex addon">
                    <input type="text" class="form-control" v-bind:placeholder="lang('Amount')" v-model="expenses['additional_expense['+i+'].amount']">
                    <label>{{ lang('Amount') }}</label>
                </div>
            </div>
            <div class="col-md-4">
                <button class="btn btn-danger" v-on:click="deleteExpense(i)">{{ lang('Delete Expense') }}</button>
            </div>
        </div>
    </template>
    <button class="btn btn-neutral btn-addon" type="button" v-on:click="addExpense">{{ lang('Add New Expense') }}</button>

    <footer-buttons></footer-buttons>
</div>
</template>
<script>
    //TODO: fix deepset
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function () {
            return {}
        },
        computed: {
            expenses() {
                return this.$deepModel('proposition.proposition.marketing_expense');
            },
            total: function() {
                return _.sumBy(this.expenses, function(o) { return parseFloat(o.ammount) });
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        methods: {
            addExpense: function() {
                this.$store.commit('proposition/pushToArray', {group:'marketing_expense', key: 'additional_expense', value: {expense: '', amount: ''} });
            },
            deleteExpense: function(index) {
                this.$store.commit('proposition/removeFromArray', {group:'marketing_expense', key: 'additional_expense',  index: index });
            }
        },
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 7});
        }
    }
</script>