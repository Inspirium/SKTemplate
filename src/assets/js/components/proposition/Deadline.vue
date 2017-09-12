<template>
    <div class="content change">
    <div class="page-name-xl mb-1">{{ lang('Deadline') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Date Picker -->
            <div class="page-name-l mt-1 mb-4">{{ lang('Desired Publishing Date') }}</div>
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker btn-white" v-bind:value="deadline.date">
                        <label for="date-picker-example">{{ lang('Select Date') }}</label>
                    </div>
                </div>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m">{{ lang('Priority') }}</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="razzzdio11" value="High" v-model="deadline['priority']">
                    <label for="radio11">{{ lang('High') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="Medium" v-model="deadline['priority']">
                    <label for="radio21">{{ lang('Medium') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio31" value="Low" v-model="deadline['priority']">
                    <label for="radio31">{{ lang('Low') }}</label>
                </fieldset>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <!-- Textarea -->
                    <div class="md-form">
                        <textarea id="form76" class="md-textarea" v-model="deadline['note']"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <footer-buttons></footer-buttons>
    </div>
</template>
<script>
    import FooterButtons from './partials/FooterButtons.vue'
    import { vuexSet } from 'vue-deepset'
    export default {
        data: function () {
            return {}
        },
        computed: {
            deadline() {
                return this.$deepModel('proposition.proposition.deadline');
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        methods: {
            vuexSet: vuexSet
        },
        mounted: function() {
            if (this.$route.params.id && !this.$store.state.proposition.proposition.loaded) {
                this.$store.dispatch('proposition/initProposition', {id: this.$route.params.id});
            }
            $('.datepicker').pickadate({
                format: 'dd. mm. yyyy.',
                onSet: (context) => {
                    let date = new Date(context.select);
                    date = this.$options.filters.moment(date, 'DD. MM. YYYY.');
                    this.vuexSet('proposition.proposition.deadline.date', date);
                }
            });
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 10});
        }
    }
</script>