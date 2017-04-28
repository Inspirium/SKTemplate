@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-3">@lang('Tehnical Information')</div>
    <div class="row">
        <div class="col-md-12">
           
            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">   
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Circulation')" required>
                        <label for="form1" class="">@lang('Circulation')</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button">@lang('Add')</button>
                        </span>
                    </div>
                </div>                   
            </div> 
            <div class="chip mb-3">
                6000
                <i class="close fa fa-times"></i>
            </div> 
            <div class="chip mb-3">
                8000
                <i class="close fa fa-times"></i>
            </div>  
                      
            <!-- Input field -->
            <div class="row">
                <div class="col-md-10">   
                    <div class="md-form d-flex addon">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Additions')" required>
                        <label for="form1" class="">@lang('Additions')</label>
                        <span class="d-flex">
                            <button class="btn btn-neutral btn-addon" type="button">@lang('Add')</button>
                        </span>
                    </div>
                </div>                   
            </div> 
            <div class="chip mb-3">
                Karta svijeta
                <i class="close fa fa-times"></i>
            </div> 
            <div class="chip mb-3">
                Labelo
                <i class="close fa fa-times"></i>
            </div>
            
    <!-- First column -->         
    <div class="row">
        <div class="col-md-6">
            <div class="page-name-l mb-2">@lang('Book Block')</div> 
            <!-- Input fileds -->         
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Number of Pages')</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('mm')" required>
                        <label for="form1" class="">@lang('Width')</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('mm')" required>
                        <label for="form1" class="">@lang('Height')</label>
                    </div> 
                </div>
            </div>                                            
                
            <!-- Dropdown menu --> 
            <div class="row">  
                <div class="col-md-12">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Hard/Soft Cover')</option>
                    </select>
                    <label>@lang('Hard/Soft Cover')</label>
                </div>
            </div>
            
            <!-- Input fileds -->         
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Paper Type')</label>
            </div>  
            <div class="row">  
                <div class="col-md-12">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Colors')</option>
                    </select>
                    <label>@lang('Colors')</label>
                </div>
            </div>  
            <div class="row">  
                <div class="col-md-12">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Colors - First Pages')</option>
                    </select>
                    <label>@lang('Colors - First Pages')</label>
                </div>
            </div>  
            <div class="row">  
                <div class="col-md-12">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Colors - Last Pages')</option>
                    </select>
                    <label>@lang('Colors - Last Pages')</label>
                </div>
            </div>
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Additional Work')</label>
            </div>                          
        </div>

    <!-- Second column -->         
        <div class="col-md-6">
            <div class="page-name-l mb-2">@lang('Cover')</div> 
                
            <!-- Dropdown menu --> 
            <div class="row">  
                <div class="col-md-12">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Paper Type')</option>
                    </select>
                    <label>@lang('Paper Type')</label>
                </div>
            </div>
            
            <!-- Input fileds -->         
            <div class="row">  
                <div class="col-md-12">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Colors')</option>
                    </select>
                    <label>@lang('Colors')</label>
                </div>
            </div>  
            <div class="row">  
                <div class="col-md-12">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Plastification')</option>
                    </select>
                    <label>@lang('Plastification')</label>
                </div>
            </div> 
            
            <!--/. Checkbox --> 
            <div class="page-name-m">@lang('Film Print')</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="M" required>
                    <label for="radio11">@lang('No')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="F" required>
                    <label for="radio21">@lang('Yes')</label>
                </fieldset>
            </div>
            
            <div class="page-name-m">@lang('Blind Print')</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="M" required>
                    <label for="radio11">@lang('No')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="F" required>
                    <label for="radio21">@lang('Yes')</label>
                </fieldset>
            </div>
            
            <div class="page-name-m">@lang('UV Film')</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="M" required>
                    <label for="radio11">@lang('No')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="F" required>
                    <label for="radio21">@lang('Yes')</label>
                </fieldset>
            </div>
        </div>
    </div>
    </div>
</div>
            
    <!-- Textarea -->
    <div class="md-form mt-3">
        <textarea type="text" id="form76" class="md-textarea"></textarea>
        <label for="form76">@lang('Note')</label>
    </div>        

    <!-- Footer buttons --> 
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->    






@endsection
