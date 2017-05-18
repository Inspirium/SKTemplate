<template>
    <div>
        <div class="page-name-xl mb-3">{{ title }}</div>
        <template v-if="step === 'basic-data'">
            <basic-data></basic-data>
        </template>
        <template v-else>
            <h1>No step defined</h1>
        </template>
    </div>
</template>

<script>
    import BasicData from './proposition/BasicData.vue';

    export default {
        props: {
            step: String
        },
        data: function() {
            return {
                title: 'Basic Data'
            }
        },
        components: {
            'basic-data': BasicData
        }
    }
</script>
