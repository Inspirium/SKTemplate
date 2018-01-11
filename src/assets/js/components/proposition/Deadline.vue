<template>
    <div class="content change">
    <div class="page-name-xl mb-1 mt-3">{{ lang('Deadline') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Date Picker -->
            <div class="page-name-l mt-1 mb-4">{{ lang('Desired Publishing Date') }}</div>
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input v-bind:placeholder="lang('Odaberi datum')" type="text" id="date-picker-example" class="form-control datepicker1 btn-white" v-bind:value="deadline.date">
                        <label for="date-picker-example">{{ lang('Select Date') }}</label>
                    </div>
                </div>
            </div>

            <!--/. Checkbox -->
            <div class="page-name-m">{{ lang('Priority') }}</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="High" v-model="deadline.priority">
                    <label for="radio11">{{ lang('High') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="Medium" v-model="deadline.priority">
                    <label for="radio21">{{ lang('Medium') }}</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio31" value="Low" v-model="deadline.priority">
                    <label for="radio31">{{ lang('Low') }}</label>
                </fieldset>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <!-- Textarea -->
                    <div class="md-form mt-4">
                        <textarea id="form76" class="md-textarea" v-model="deadline.note"></textarea>
                        <label for="form76">{{ lang('Note') }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <proposition-footer-buttons v-on:warningSaved="next"></proposition-footer-buttons>
    </div>
</template>
<script>
    import { vuexSet } from 'vue-deepset'
    export default {
        data: function () {
            return {
                next: false
            }
        },
        computed: {
            deadline() {
                return this.$deepModel('proposition.deadline');
            }
        },
        methods: {
            vuexSet: vuexSet
        },
        mounted: function() {
            $('.datepicker1').pickadate({
                format: 'dd. mm. yyyy.',
                onSet: (context) => {
                    let date = new Date(context.select);
                    date = this.$options.filters.moment(date, 'DD. MM. YYYY.');
                    this.$store.commit('proposition/deadline/saveDate', date);
                }
            });

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