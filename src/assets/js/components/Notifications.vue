<template>
    <div class="activity-box">
        <div class="activity-item align-items-center d-flex" v-for="item in notifications">
            <div class="activity-avatar file-box-sty d-flex align-items-center">
                <a href="">
                    <img class="profile-s mr-1" src="/images/profile.jpg" href="#">
                </a>
            </div>
            <div class="activity-content">
                <div class="activity-label tasktype-1">{{ item.tasktype }}</div>
                <div class="activity-time" v-html="timed(item.created_at)"></div>
                <h4 class="activitiy-user"><span>Jozo Jozić</span> poslao(la) je novu<span><a href=""> poruku</a></span></h4>
                <h5>{{ item.message }}</h5>
            </div>
        </div>
        <div class="activity-item align-items-center d-flex" v-for="item in notifications">
            <div class="activity-avatar file-box-sty d-flex align-items-center">
                <a href="">
                    <img class="profile-s mr-1" src="/images/profile.jpg" href="#">
                </a>
            </div>
            <div class="activity-content">
                <div class="activity-label tasktype-1">{{ item.tasktype }}</div>
                <div class="activity-time" v-html="timed(item.created_at)"></div>
                <h4 class="activitiy-user"><span>Jozo Jozić</span> poslao(la) je novu<span><a href=""> poruku</a></span></h4>
                <h5>{{ item.message }}</h5>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                notifications: [
                    {
                        tasktype: 'message',
                        created_at: 1495530618,
                        message: 'Moramo nešto završiti'
                    }
                ]
            }
        },
        mounted: function () {
            window.axios.get('/api/user/notifications')
                .then(response => {
                // get body data
                //this.notifications = response.body;
            }, response => {
                // error callback
            });
        },
        methods: {
            timed: function(value){
                let unit = 'sekundi';
                let now = Math.floor(Date.now() / 1000);
                let timediff = now - value;
                console.log(timediff);
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
            }
        }

    }
</script>
