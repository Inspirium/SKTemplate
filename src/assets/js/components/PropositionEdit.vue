<template>
    <div>
        <div class="page-name-xl mb-3">{{ title }}</div>
        <template v-if="step === 0">
            <basic-data></basic-data>
        </template>
        <template v-else>
            <h1>No step defined</h1>
        </template>
    </div>
</template>

<script>
    import BasicData from './proposition/BasicData.vue';
    import Categorization from './proposition/Categorization.vue';
    import { mapState, mapActions } from 'vuex';
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
            step: state => state.step
        }),

        components: {
            'basic-data' : BasicData,
        //    'categorization': Categorization
        },
        methods: {
            propositionUpdate: () => {
                axios.patch('/api/proposition/' + this.proposition.id)
                    .then((response) => {}).catch((error) => {});
            }
        }
    }
</script>
