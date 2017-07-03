<template>
<div>
    <div class="row tabs-wrapper">
        <ul class="col nav classic-tabs tabs-cyan" id="tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#panel0" role="tab" v-on:click="switchTab($event)">{{ lang('Precalculation') }}</a>
            </li>
            <li class="nav-item" v-for="(option, key, index) in options">
                <a class="nav-link" data-toggle="tab" v-bind:href="'#panel'+(index+1)" v-bind:key="key"  role="tab" v-on:click="switchTab($event)">{{ option.title }}</a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in show" id="panel0" role="tabpanel">
            <div class="page-name-xl mb-1">{{ lang('Precalculation') }}</div>
            <template v-for="(option, key, index) in options">
                <div class="page-name-l mb-1 mt-2">{{ lang('Option '+(index+1)) }}</div>
                <a v-bind:href="'#panel'+(index+1)" class="hoverable d-block" v-on:click="switchTab($event)">
                    <div class="row text-white btn-sub2 d-flex py-2">
                        <div class="col-md-3">
                            <h6 class="no-border display-b text-white">{{ lang('Circulation') }}</h6>
                            <h1 class="mb-1 text-white weight-700">{{ option.number_of_pages }} komada</h1>
                        </div>
                        <div class="col-md-3">
                            <h6 class="no-border display-b text-white">{{ lang('Total Cost') }}</h6>
                            <h1 class="mb-1 text-white">{{ option.total_cost | flexCurrency(' kn', 2) }}</h1>
                        </div>
                        <div class="col-md-2">
                            <div class=" page-name-l-white border-white">{{ lang('Direct Cost Cover') }}</div>
                            <div>
                                <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                                <h3 class="">{{ option.direct_cost_cover }}</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class=" page-name-l-white">{{ lang('Complete Cost Cover') }}</div>
                            <div>
                                <h6 class="no-border text-white">{{ lang('Number of Sold Copies') }}</h6>
                                <h3 class="">{{ option.complete_cost_cover }}</h3>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-angle-right display-3 text-right float-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </template>
        </div>
        <div class="tab-pane fade" v-bind:id="'panel'+(index+1)" role="tabpanel" v-for="(option, key, index) in options" v-bind:key="key">
            <div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
                <h6 class="text-center no-border display-e text-white">{{ lang('Total Cost') }}</h6>
                <h1 class="text-center display-2 mb-2 text-white">215.000 kn</h1>
            </div>
        </div>
    </div>

    <footer-buttons></footer-buttons>
</div>
</template>
<script>
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function () {
            return {}
        },
        computed: {
            options() {
                return  this.$deepModel('proposition.proposition.print.offers');
            }
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        methods: {
            switchTab: function(e) {
                $(e.target).tab('show');
            },
        },
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 12});
        }
    }
</script>