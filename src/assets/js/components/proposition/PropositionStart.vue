<template>
    <div class="content">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ start.project_name?start.project_name:lang('New Project') }}</h1>
            </div>
        </div>

        <!-- Header -->
        <div class="profile-head pb-2 row">
            <div class="col-md-4">
                <a href="#" v-if="proposition.owner">
                    <img class="profile-m-2 mr-1 float-left" v-bind:src="proposition.owner.image">
                    <h6 class="white-label">{{ lang('Proposition Creator') }}</h6>
                    <h3 class="mb-1 text-white">{{ proposition.owner.name }}</h3>
                </a>
            </div>
            <div class="col-md-4">
                <h6 class="white-label">{{ lang('Starting Date') }}</h6>
                <h3 class="mb-1 text-white" v-if="proposition.created_at">{{ proposition.created_at.date | moment('DD.MM.YYYY.') }}</h3>
            </div>
            <div class="col-md-4">
                <h6 class="white-label">{{ lang('Total Time') }}</h6>
                <h3 class="mb-1 text-white" v-if="proposition.created_at">{{ proposition.created_at.date | moment("from", true)  }}</h3>
            </div>
        </div>

        <!-- Notification -->
       <!--<div class="notification-bar btn-attention d-flex flex-md-row flex-column justify-content-start align-items-center mt-3">
            <div class="file-box-sty text-white btn-clock-icon">{{ lang('Task Sent') }}</div>
            <div class="file-box-sty text-white">{{ lang('Publishing Director') }}</div>
            <div class="file-box-sty text-white">{{ lang('25.11.2017.') }}</div>
            <div class="file-box-sty text-white">{{ lang('Waiting time') }} : 2 days 15 hours</div>
        </div>-->

        <!-- First row -->
        <div class="page-name-l my-4">{{ lang('Project data') }}</div>
        <div class="row">
            <div class="col-md-4">
                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="project-name" class="form-control" name="project-name" v-model="start.project_name">
                    <label for="project-name" class="">{{ lang('Project name') }}</label>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="project-number" class="form-control" name="project-number" v-model="start.project_number">
                    <label for="project-number" class="">{{ lang('Project number') }}</label>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="additional" class="form-control" name="additional" v-model="start.additional_project_number">
                    <label for="additional" class="">{{ lang('Additional project number') }}</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <!-- Textarea -->
                <div class="md-form mt-1">
                    <textarea id="form76" class="md-textarea" v-model="start.note"></textarea>
                    <label for="form76">{{ lang('Note') }}</label>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        data: function () {
            return {}
        },
        computed: {
            proposition() {
                return this.$deepModel('proposition');
            },
            start() {
                return this.$deepModel('proposition.start');
            }
        }
    }
</script>