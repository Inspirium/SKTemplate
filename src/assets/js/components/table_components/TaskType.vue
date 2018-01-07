<template>
    <div v-bind:class="task_types[value].className">{{ task_types[value].title }}</div>
</template>

<script>
    export default {
        name: "task-type",
        data() {
            return {
                task_types: {
                    0: {
                        title: '',
                        className: ''
                    },
                    1: {
                        title: 'Project',
                        className: 'tasktype-1'
                    },
                    2: {
                        title: 'Assignment',
                        className: 'tasktype-2'
                    },
                    3: {
                        title: 'Project',
                        className: 'tasktype-1'
                    },
                    4: {
                        title: 'Assignment',
                        className: 'tasktype-2'
                    },
                    5: {
                        title: 'Project',
                        className: 'tasktype-1'
                    },
                    6: {
                        title: 'Task order',
                        className: 'tasktype-2'
                    }
                },
            }
        },
        props: ['value']
    }
</script>

<style scoped>

</style>