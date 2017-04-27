@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-1">@lang('Marketing Budget')</div>
    <div class="row">
        <div class="col-md-12">
            <!-- Circulation Number -->
            <div class="col-md-12 mb-3">
                <h6 class="text-center no_border">@lang('Total')</h6>
                <h1 class="text-center display-2">3.500 kn</h1>
            </div>
            
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">@lang('Marketing Budget')</div>
            <div class="row">
                <div class="col-md-5">   
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Currency')" required>
                        <label for="form1" class="">@lang('Expense')</label>

                    </div>
                </div>
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
            
            
            <!-- Input field -->
            <div class="page-name-l mb-1">@lang('Add Expenses')</div>
            <button class="btn btn-neutral btn-addon" type="button">@lang('Add New Expense')</button>
  
                      

    <!-- Footer buttons --> 
    <div class="btn-footer flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->    






@endsection
