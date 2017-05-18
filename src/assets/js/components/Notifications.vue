<template>
    <div>
        <ul>
            <li v-for="item in notifications">
                {{ item[data][message] }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                notifications: []
            }
        },
        mounted: function () {
            window.axios.get('/api/user/notifications')
                .then(response => {
                // get body data
                this.notifications = response.body;
            }, response => {
                // error callback
            });
        }

    }
</script>
