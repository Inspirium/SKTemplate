<template>
    <span>{{ value | moment("from", true) }}</span>
</template>

<script>
    export default {
        name: "waiting-time",
        props:['value']
    }
</script>