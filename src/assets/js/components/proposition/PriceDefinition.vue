<template>
    <div class="content">
        <div class="page-name-xl mb-4 mt-3">@lang('Circulation')</div>
        
        <!-- First column -->
        <div class="row">
            <div class="col-md-6">
                <div class="page-name-l mb-4">{{ lang('0-12 Months') }}</div>

                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="form1" class="form-control" name="retail" placeholder="" required>
                    <label for="retail" class="">{{ lang('Retail') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form2" class="form-control" name="wholesale" placeholder="" required>
                    <label for="wholesale" class="">{{ lang('Wholesale') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form3" class="form-control" name="field" placeholder="" required>
                    <label for="field" class="">{{ lang('Field sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form4" class="form-control" name="direct" placeholder="" required>
                    <label for="direct" class="">{{ lang('Direct sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form5" class="form-control" name="promotors" placeholder="" required>
                    <label for="promotors" class="">{{ lang('Promotors') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form6" class="form-control" name="export" placeholder="" required>
                    <label for="export" class="">{{ lang('Export') }}</label>
                </div>
                <!-- Checkbox -->
                <div class="page-name-m mt-4">{{ lang('Total') }}</div>
                <div class="form-inline mb-3 display-4">505</div>
            </div>
            


            <!-- Second column -->
            <div class="col-md-6">
                <div class="page-name-l mb-4">{{ lang('12-24 Months') }})</div>

                <!-- Input fileds -->
                <div class="md-form">
                    <input type="text" id="form7" class="form-control" name="retail_24" placeholder="" required>
                    <label for="retail_24" class="">{{ lang('Retail') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form8" class="form-control" name="wholesale_24" placeholder="" required>
                    <label for="wholesale_24" class="">{{ lang('Wholesale') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form9" class="form-control" name="field_24" placeholder="" required>
                    <label for="field_24" class="">{{ lang('Field sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form10" class="form-control" name="direct_24" placeholder="" required>
                    <label for="direct_24" class="">{{ lang('Direct sales') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form11" class="form-control" name="promotors_24" placeholder="" required>
                    <label for="promotors_24" class="">{{ lang('Promotors') }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="form12" class="form-control" name="export_24" placeholder="" required>
                    <label for="export_24" class="">{{ lang('Export') }}</label>
                </div>
                <!-- Checkbox -->
                <div class="page-name-m mt-4">{{ lang('Total') }}</div>
                <div class="form-inline mb-3 display-4">3105</div>
            </div>
        </div>
        
        <!-- Circulation -->
        <div class="row">
            <div class="col-md-12">
                <div class="page-name-l mt-4 mb-3">{{ lang('Circulation') }}</div>
                <div class="mb-3">
                    <fieldset class="form-group">
                        <input type="radio" id="form13" name="cir-1" value="">
                        <label for="cir-1">{{ lang('10.000 (povučena od naklada koje imamo u printu)') }}</label>
                    </fieldset>
                    <fieldset class="form-group">
                        <input type="radio" id="form13" name="cir-2" value="">
                        <label for="cir-2">{{ lang('20.000') }}</label>
                    </fieldset>
                </div>
            </div>
        </div>
        
        <div class="page-name-xl mb-4 mt-3">@lang('Retail price definition')</div>
        <div class="md-form">
            <input type="text" id="form15" class="form-control" name="final_price" placeholder="" required>
            <label for="form1" class="">{{ lang('Retail price') }}</label>
        </div>
        <footer-buttons></footer-buttons> 
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