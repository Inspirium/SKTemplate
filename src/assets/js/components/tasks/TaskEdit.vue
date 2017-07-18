<template>
    <div>
    <div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-white text-center">{{ lang('New Task') }}</h1>
    </div>

    <!-- Display fileds -->
    <div class="content">

        <!-- Input fields -->
        <div class="page-name-xl mb-2 mt-2">{{ lang('Task Details') }}</div>
        <div class="row">
            <div class="col-md-6">
                <!-- Input field -->
                <div class="md-form">
                    <input type="text" id="form1" class="form-control">
                    <label for="form1" class="">{{ lang('Task Name') }}</label>
                </div>
                <!--/. Input field -->

                <!-- Input field -->
                <div class="md-form d-flex addon">
                    <input type="text" id="form1" class="form-control">
                    <label for="form1" class="">{{ lang('Assign Person') }}</label>
                </div>
                <div class="chip mb-3">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="Contact Person"> Jane Doe<i class="close fa fa-times"></i>
                </div>

                <div class="md-form d-flex addon">
                    <input type="text" id="form1" class="form-control">
                    <label for="form1" class="">{{ lang('Assign Department') }}</label>
                </div>
                <div class="chip mb-3">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="Contact Person"> Jane Doe<i class="close fa fa-times"></i>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Date Picker -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="md-form">
                            <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker btn-white">
                            <label for="date-picker-example">{{ lang('Select Date') }}</label>
                        </div>
                    </div>
                </div>
                <!--/. Checkbox -->
                <div class="page-name-m">{{ lang('Priority') }}</div>
                <div class="form-inline mb-3">
                    <fieldset class="form-group">
                        <input name="priority" type="radio" id="radio11" value="high">
                        <label for="radio11">{{ lang('High') }}</label>
                    </fieldset>
                    <fieldset class="form-group">
                        <input name="priority" type="radio" id="radio21" value="medium">
                        <label for="radio21">{{ lang('Medium') }}</label>
                    </fieldset>
                    <fieldset class="form-group">
                        <input name="priority" type="radio" id="radio31" value="low">
                        <label for="radio31">{{ lang('Low') }}</label>
                    </fieldset>
                </div>
                <!--/. Checkbox -->

                <!-- Textarea -->
                <div class="md-form">
                    <textarea id="form76" class="md-textarea"></textarea>
                    <label for="form76">{{ lang('Task description') }}</label>
                </div>
            </div>
        </div>

        <!-- Documents upload -->
        <div class="page-name-l mb-1">{{ lang('Documents') }}</div>
        <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add Documents') }}</button>

        <!-- File/document table -->
        <div class="files mt-2 mb-2">
            <div class="file-box file-box-l d-flex align-items-center">
                <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                <div class="file-box-sty ml-auto d-flex">
                    <img class="profile-m-1 mr-3 float-left align-self-center" src="/images/profile.jpg">Jelena Lončarić
                </div>
                <div class="file-box-sty">19.07.2017.</div>
                <div class="file-box-sty icon icon-download">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel">Obriši</div>
            </div>
            <div class="file-box file-box-l d-flex align-items-center">
                <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
                <div class="file-box-sty ml-auto d-flex">
                    <img class="profile-m-1 mr-3 float-left align-self-center" src="/images/profile.jpg">Jelena Lončarić
                </div>
                <div class="file-box-sty">19.07.2017.</div>
                <div class="file-box-sty icon icon-download">Preuzmi</div>
                <div class="file-box-sty icon icon-cancel">Obriši</div>
            </div>
        </div>

        <!-- Footer buttons -->
        <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
            <button type="submit" class="btn btn-lg btn-save">{{ lang('Submit') }}</button>
        </div>
        <!--/. Footer buttons -->
    </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {},
        methods: {}
    }
</script>