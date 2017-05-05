@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-1">@lang('Authors')</div>
    <div class="row">
        <div class="col-md-12">
            <!-- Circulation Number -->
            <div class="col-md-12 mb-3">
                <h6 class="text-center no_border display-e">@lang('Total')</h6>
                <h1 class="text-center display-2">10.000 kn</h1>
            </div>
            
            <!-- Input field -->
            <div class="page-name-l mt-1 mb-2">@lang('First and Last Name')---Ovdje povlači sve autore koje smo naveli na basic_data.php</div>
            <div class="row">
                <div class="col-md-6">   
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Currency')" required>
                        <label for="form1" class="">@lang('Expense')</label>
                    </div>
                </div>
                <div class="col-md-6">   
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('In Precentage')" required>
                        <label for="form1" class="">@lang('Advance Payment')</label>
                    </div>
                </div>
            </div>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-3" type="button">@lang('Add New Expense')</button>
            
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
            <div class="page-name-l mt-1 mb-2">Vladimir Paar</div>
            <div class="row">
                <div class="col-md-6">   
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Currency')" required>
                        <label for="form1" class="">@lang('Expense')</label>
                    </div>
                </div>
                <div class="col-md-6">   
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('In Precentage')" required>
                        <label for="form1" class="">@lang('Advance Payment')</label>
                    </div>
                </div>
            </div>
            <!-- Add new item -->
            <button class="btn btn-neutral btn-addon mb-3" type="button">@lang('Add New Expense')</button>
            
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
            
    <!-- Add new item -->
    <div class="page-name-l mb-1">@lang('Other Expenses')</div>
    <button class="btn btn-neutral btn-addon" type="button">@lang('Add New Author Expense')</button>
  
                      

    <!-- Footer buttons --> 
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->    






@endsection
