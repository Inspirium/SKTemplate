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
            <template v-for="(item, index) in expenses">
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">{{ lang('Marketing Budget') }}</div>
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form input-group d-flex addon">
                        <input type="text" id="form1" class="form-control" v-model="item.ammount">
                        <label for="form1" class="">{{ lang('Expense') }}</label>
                        <span class="input-group-addon">{{ lang('Kn') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Textarea -->
                    <div class="md-form mt-1">
                        <textarea id="form76" class="md-textarea" v-model="item.note"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
            </template>
        </div>
    </div>

    <!-- Input field -->
    <div class="page-name-l mb-1">{{ lang('Add Expenses') }}</div>
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
                //let expenses = this.expenses;
                this.expenses.push({ammount: 0, note: ''});
               // this.vueSet(this.expenses, expenses);
            }
        },
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 7});
        }
    }
</script>