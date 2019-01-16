<template>
    <div v-if="video">
        <!--Help-->
        <a class="help" v-on:click.prevent="showVideo"><i class="fa fa-3x fa-question-circle"></i> Trebaš pomoć</a>
        <div id="help-content" v-if="show">
            <iframe width="630" height="394" v-bind:src="video" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VideoTutorial",
        data() {
            return {
                videos: {
                    'edit/start': 'https://www.useloom.com/embed/7c0434f775b8417ca19a932f65cf3a5c',
                    'edit/basic_data': 'https://www.useloom.com/share/266f1b57c9344486bd57ca1977ab00f5',
                    'edit/categorization': 'https://www.useloom.com/share/5fb815908f3a4ad09b131c0d887434d0',
                    'edit/market_potential': 'https://www.useloom.com/share/7b58cee7367f4fe38fc92936f8da1108',
                    'edit/technical_data': 'https://www.useloom.com/share/92856778c4c34d1a9d69705bef4dc940',
                    'edit/print': 'https://www.useloom.com/share/b7c720c666b648dd8a1535bc5cbb5dfd',
                    'edit/authors_expense': 'https://www.useloom.com/share/28dd9230e7b44c489cbcbda66148b8ec',
                    'edit/production_expense': 'https://www.useloom.com/share/5d11a3b5dc824939ba22cff8e95d8322',
                    'edit/marketing_expense': 'https://www.useloom.com/share/5f38ca21e3a542a58eb061aac4cdc6d5',
                    'edit/layout_expense': 'https://www.useloom.com/share/55d45b4d8b3b43b7acb0d9a8aaa0eeef',
                    'edit/deadline': 'https://www.useloom.com/share/cfa45c85f54c4cbca8afbb6c2f59cd2f',
                    'edit/calculation': 'https://www.useloom.com/share/bc767833f4514124a929571792f0f9a5',
                    'final_price/price_definition': 'https://www.useloom.com/share/fb055f7a43b24aaf83218e7c5a18551b',
                    'expenses/authors_expense': 'https://www.useloom.com/share/ea5756e71553417ab6e583a665180e88',
                    'expenses/production_expense': 'https://www.useloom.com/share/6f1fa272bd594ceeb7d7ab41a47783cb',
                    'expenses/marketing_expense': 'https://www.useloom.com/share/6f9799fbcb40486295b54dedd480d2e9',
                    'expenses/layout_expense': 'https://www.useloom.com/share/d6db79cc128d4955a84292dd2fc42114',
                    'expenses/expenses/compare': 'https://www.useloom.com/share/495267d401324213aeced2e1b58e624a',

                },
                show: false
            }
        },
        computed: {
            video() {
                let path = this.$route.path.split('/');
                let length = path.length;
                path = path[length-2] + '/' + path[length-1];
                if (this.videos[path]) {
                    return this.videos[path];
                }
                return false;
            }
        },
        methods: {
            showVideo() {
                this.show = !this.show;
            }
        },
        watch:{
            $route (to, from){
                this.show = false;
            }
        }
    }
</script>

<style scoped>

</style>