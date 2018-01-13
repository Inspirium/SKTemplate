<template>
    <div v-bind:class="task_types[value].className">{{ lang(task_types[value].title) }}</div>
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
                        title: 'Proposition task',
                        className: 'tasktype-1'
                    },
                    2: {
                        title: 'Assignment',
                        className: 'tasktype-2'
                    },
                    3: {
                        title: 'Approval Request',
                        className: 'tasktype-3'
                    },
                    4: {
                        title: 'Proposition task',
                        className: 'tasktype-1'
                    },
                    5: {
                        title: 'Proposition Approval',
                        className: 'tasktype-5'
                    },
                    6: {
                        title: 'Task Order',
                        className: 'tasktype-6'
                    }
                },
            }
        },
        props: ['value']
    }
</script>

<style scoped>

</style>