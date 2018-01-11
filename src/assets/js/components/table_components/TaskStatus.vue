<template>
    <span :class="value==='completed'?'icon icon-cost-approved':''">{{value==='completed'?lang('Finished'):''}}</span>
</template>

<script>
    export default {
        name: "task-status",
        props: ['value']
    }
</script>