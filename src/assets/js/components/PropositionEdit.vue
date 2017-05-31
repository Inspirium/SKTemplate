<template>
    <div>
        <div class="page-name-xl mb-3">{{ title }}</div>
        <template v-if="step === 0">
            <basic-data></basic-data>
        </template>
        <template v-else-if="step === 1">
            <categorization></categorization>
        </template>
        <template v-else-if="step === 2">
            <market-potential></market-potential>
        </template>
        <template v-else>
            <h1>No step defined</h1>
        </template>
        <!-- Footer buttons -->
        <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
            <span v-if="error">{{ error }}</span>
            <button class="btn btn-lg btn-save" v-on:click="saveProposition">{{ lang('Save') }}</button>
            <button class="btn btn-lg btn-assign btn-assign-icon" v-on:click="assignModalOpen">{{ lang('Assign to...') }}</button>
        </div>
        <!--/. Footer buttons -->
    </div>
</template>

<script>
    import BasicData from './proposition/BasicData.vue';
    import Categorization from './proposition/Categorization.vue';
    import MarketPotential from './proposition/MarketPotential.vue';
    import { mapState, mapActions, mapMutations } from 'vuex';
    export default {
        props: {
            proposition: Object
        },
        data: function() {
            return {

            }
        },
        computed: mapState('proposition',{
            title: (state) =>  {
                let steps = [
                    {component: 'basic-data', title: 'Basic data'},
                    {component: 'categorization', title: 'Categorization'},
                    {component: 'market-potential', title: 'Market potential'},
                    {component: 'technical-data', title: 'Technical data'},
                    {component: 'print', title: 'Print'},
                    {component: 'authors-expense', title: 'Authors expense'},
                    {component: 'production-expense', title: 'Production expense'},
                    {component: 'marketing-expense', title: 'Marketing expense'},
                    {component: 'distribution-expense', title: 'Distribution expense'},
                    {component: 'layout-expense', title: 'Layout expense'},
                    {component: 'deadline', title: 'Deadline'},
                    {component: 'precalculation', title: 'Precalculation'},
                    {component: 'calculation', title: 'Calculation'},
                    {component: 'work-order', title: 'Work order'},
                ];
                return steps[state.step].title;
            },
            error: state => state.error,
            step: state => state.step
        }),

        components: {
            'basic-data' : BasicData,
            'categorization': Categorization,
            'market-potential': MarketPotential
        },
        methods: {
            saveProposition: function() {
                this.$store.dispatch('proposition/saveProposition');
            },
            assignModalOpen: function() {
                //TODO
            }
        },
        mounted: function() {
            //this.$store.commit('proposition/initProposition', this.proposition);
        }
    }
</script>
