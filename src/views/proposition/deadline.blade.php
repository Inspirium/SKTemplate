@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-1">@lang('Deadline')</div>
    <div class="row">
        <div class="col-md-12">
        
            <!-- Date Picker -->
            <div class="page-name-l mt-1 mb-2">@lang('Desired Publishing Date')</div>
            <div class="row">
                <div class="col-md-5">   
                    <div class="md-form">
                        <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker btn-white">
                        <label for="date-picker-example">@lang('Select Date')</label>
                    </div>
                </div>
            </div>
            
            <!--/. Checkbox -->
            <div class="page-name-m">@lang('Priority')</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="High" required>
                    <label for="radio11">@lang('High')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="Medium" required>
                    <label for="radio21">@lang('Medium')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio31" value="Low" required>
                    <label for="radio31">@lang('Low')</label>
                </fieldset>
            </div>
            
            <div class="row"> 
                <div class="col-md-12">   
                   
                    <!-- Textarea -->
                    <div class="md-form">
                        <textarea type="text" id="form76" class="md-textarea"></textarea>
                        <label for="form76">@lang('Note')</label>
                    </div>    
                </div>               
            </div>
        </div>
    </div>                      

    <!-- Footer buttons --> 
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Save')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->    






@endsection
