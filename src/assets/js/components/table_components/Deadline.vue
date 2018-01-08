<template>
    <span>{{ value | moment("from", "now") }}</span>
</template>

<script>
    export default {
        name: "deadline",
        props:['value']
    }
</script>