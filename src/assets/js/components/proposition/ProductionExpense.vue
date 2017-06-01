<template>
    <div>
        <!-- Circulation Number -->
        <div class="col-md-12 mb-3">
            <h6 class="text-center no-border display-e">{{ lang('Circulation') }}</h6>
            <h1 class="text-center display-2">52.354 kn</h1>
        </div>

        <div class="row">
            <div class="col-md-12">

                <!-- First column -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="page-name-l mb-2">{{ lang('Book Block') }}</div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control">
                                    <label for="form1">{{ lang('Text Price') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form2" class="form-control">
                                    <label for="form2">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds -->
                        <div class="md-form input-group">
                            <input type="text" id="form3" class="form-control">
                            <label for="form3">{{ lang('Accontation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="form4" class="form-control">
                            <label for="form4">{{ lang('Netto Price Percentage') }}</label>
                            <span class="input-group-addon">{{ lang('%') }}</span>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="form5" class="form-control">
                            <label for="form5">{{ lang('Reviews') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form6" class="form-control">
                                    <label for="form6" class="">{{ lang('Lecture') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form7" class="form-control">
                                    <label for="form7" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form8" class="form-control">
                                    <label for="form8" class="">{{ lang('Correction') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form9" class="form-control">
                                    <label for="form9" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form10" class="form-control">
                                    <label for="form10" class="">{{ lang('Proofreading') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form11" class="form-control">
                                    <label for="form11" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form12" class="form-control">
                                    <label for="form12" class="">{{ lang('Translation') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form13" class="form-control">
                                    <label for="form1" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label>{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Index') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label for="form1" class="">{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                            <label for="form1" class="">{{ lang('Reviews') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                    </div>



                    <!-- Second column -->
                    <div class="col-md-6">
                        <div class="page-name-l mb-2">{{ lang('Cover') }}</div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Photos') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label for="form1" class="">{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Illustrations') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label for="form1" class="">{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Input fileds Expenses Calculation -->
                        <div class="row">
                            <div class="col-md-5">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Tehnical Drawings') }}</label>
                                    <span class="input-group-addon">{{ lang('Kn') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form input-group">
                                    <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                                    <label for="form1" class="">{{ lang('Amount') }}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <label for="form1" class="">{{ lang('Total') }}</label>
                                    <div class="total-sty color-nav-sub">{{ lang('12.568 kn') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                            <label for="form1" class="">{{ lang('Expert Report') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                            <label for="form1" class="">{{ lang('Copyright') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                            <label for="form1" class="">{{ lang('Copyright Mediator') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                            <label for="form1" class="">{{ lang('Metodički Instrumentarij') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                            <label for="form1" class="">{{ lang('Selection') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>

                        <div class="md-form input-group">
                            <input type="text" id="form1" class="form-control" name="first_name" placeholder="{{ lang('') }}" required>
                            <label for="form1" class="">{{ lang('PowerPoint Presentation') }}</label>
                            <span class="input-group-addon">{{ lang('Kn') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Documents upload -->
        <div class="page-name-l mb-1">{{ lang('Additional Expenses') }}</div>
        <button class="btn btn-neutral btn-addon" type="button">{{ lang('Add New Expense') }}</button>


        <!-- Textarea -->
        <div class="md-form mt-3">
            <textarea id="form76" class="md-textarea"></textarea>
            <label for="form76">{{ lang('Note') }}</label>
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
