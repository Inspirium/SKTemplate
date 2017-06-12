<template>
    <div>
        <div class="page-name-xl mb-3">{{ lang('Market Potential') }}</div>
    <div class="row">
        <div class="col-md-12">

            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="form1" class="form-control" v-model="main_target" v-bind:placeholder="lang('Title')">
                <label for="form1">{{ lang('Main Target') }}</label>
            </div>

            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea id="form76" class="md-textarea" v-model="note"></textarea>
                <label for="form76">{{ lang('Note') }}</label>
            </div>

            <!-- Documents upload -->
            <div class="page-name-m mt-2">{{ lang('Documents') }}</div>
            <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add Documents') }}</button>

            <!-- File/document table -->
            <div class="files mt-2 mb-2">
                <div class="file-box file-box-l d-flex align-items-center" v-for="item in market_potential_documents">
                    <a href="http://homestead.app/images/profile.pdf" class="file-icon">{{ item.title }}</a>
                    <div class="file-box-sty ml-auto d-flex">
                        <a href=""><img class="profile-m-1 mr-1 align-self-center" src="/images/profile.jpg" href="#">{{ item.author }}
                        </a></div>
                    <div class="file-box-sty">{{ item.created_at | moment("d.m.Y") }}</div>
                    <div class="file-box-sty icon icon-download">Preuzmi</div>
                    <div class="file-box-sty icon icon-cancel">Obriši</div>
                </div>
            </div>
        </div>
    </div>
        <footer-buttons></footer-buttons>
    </div>
</template>

<script>
    import FooterButtons from './partials/FooterButtons.vue'
    export default {
        data: function() {
            return {}
        },
        components: {
            'footer-buttons' : FooterButtons
        },
        computed: {
            note: {
                get() { return this.$store.state.proposition.proposition.market_potential.note; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'note', group: 'market_potential', value: value}) }
            },
            main_target: {
                get() { return this.$store.state.proposition.proposition.market_potential.main_target; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'main_target', group: 'market_potential', value: value}) }
            },
            market_potential_documents: {
                get() { return this.$store.state.proposition.proposition.market_potential.market_potential_documents; },
                set(value) { this.$store.commit('proposition/updateProposition', {key: 'market_potential_documents', group: 'market_potential', value: value}) }
            },
        },
        mounted: function() {
            this.$store.commit('proposition/updateProposition', {key: 'step', value: 2});
        }
    }
</script>
