<template>
    <div class="dropdown">
        <a href="#" class="nav-item nav-link-icon dropdown-toggle d-flex" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="tag tag-danger">{{ notifications.length }}</span>
        </a>
        <div class="dropdown-menu dropdown-ins dropdown-menu-right dropdown-custom-login">
            <div class="activity-box">
                <div class="activity-container">
                    <a href="/notifications" class="activity-item file-box-sty p-1 text-center d-block">Prikaži sve</a>
                    <div class="activity-item align-items-center d-flex" v-for="item in notifications">
                        <div class="activity-avatar file-box-sty d-flex align-items-center" v-if="item.data.sender">
                            <a v-bind:href="item.data.sender.link">
                                <img class="profile-s mr-2" v-bind:src="item.data.sender.image">
                            </a>
                        </div>
                        <a class="activity-content" v-bind:href="item.data.link?item.data.link:'#'" v-on:click="markAsRead(item)">
                            <div v-if="typeof (item.data.tasktype) === 'object'" v-bind:class="['activity-label', item.data.tasktype.className?item.data.tasktype.className:'tasktype-1']">{{ lang(item.data.tasktype.title?item.data.tasktype.title:item.data.tasktype) }}</div>
                            <div v-if="typeof (item.data.tasktype) === 'string'" class="activity-label tasktype-1">
                                {{ lang(item.data.tasktype) }}
                            </div>
                            <div class="activity-time">{{ item.created_at | moment("from", "now") }}</div>
                            <h4 class="activitiy-user"></h4>
                            <h5>{{ lang(item.data.message) }}</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                notifications: [
                ]
            }
        },
        mounted: function () {
            window.axios.get('/api/user/notifications')
                .then(response => {
                // get body data
                this.notifications = response.data;
            }, response => {
                // error callback
            });
            Echo.private('users.' + window.Laravel.userId)
                .notification((notification) => {
                    this.notifications.unshift(notification)
                });
        },
        methods: {
            timed: function(value){
                let unit = 'sekundi';
                let now = Math.floor(Date.now() / 1000);
                let timediff = now - value;
                if (timediff > 60) {
                    timediff = Math.floor(timediff/60);
                    unit = 'minuta';
                    if (timediff > 60) {
                        timediff = Math.floor(timediff/60);
                        unit = 'sati';
                        if (timediff > 24) {
                            timediff = Math.floor(timediff/24);
                            unit = 'dana';
                        }
                    }

                }

                return '<span>' + timediff + '</span> ' + unit;
            },
            markAsRead(item) {
                axios.post('/api/user/notifications/'+item.id);
            }
        }

    }
</script>
