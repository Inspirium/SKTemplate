@extends('sktemplate::layout')

@section('content')
    <div class="page-name-xl mb-1">@lang('Summary')</div>
    <div class="row">
        <div class="col-md-12">
            <h6 class="text-center no_border display-e">@lang('Total Cost')</h6>
            <h1 class="text-center display-2 mb-2">215.000 kn</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="page-name-l mb-1">@lang('Direct Cost Cover')</div>
                    <div>
                        <h6 class="no_border">@lang('Number of Sold Copies')</h6>
                        <h3 class="mb-1">451</h3>
                    </div>
                </div>
                   <div class="col-md-6">
                    <div class="page-name-l mb-1">@lang('Complete Cost Cover')</div>
                    <div>
                        <h6 class="no_border">@lang('Number of Sold Copies')</h6>
                        <h3 class="mb-1">865</h3>
                    </div>
                </div>
            </div>
                
            <div class="page-name-xl mb-2 mt-3">@lang('Print Offer Summary')</div>


            
            <!-- First column -->         
            <div class="row">
                <div class="col-md-6">
                    <div class="page-name-l mb-2">@lang('Book Block')</div> 
                                                
                    <!-- Dropdown menu --> 
                    <div class="row">  
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Hard/Soft Cover')</option>
                                <option value="1" >@lang('None')</option>
                                <option value="2" >@lang('Hard Cover')</option>
                                <option value="3" >@lang('Soft Cover')</option>
                                <option value="3" >@lang('Hard and Soft Cover')</option>
                            </select>
                            <label>@lang('Hard/Soft Cover')</label>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="row">
                        <div class="col-md-6">        
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" disabled>
                                <label for="form1" class="">@lang('Soft Cover Circulation')</label>
                            </div>
                        </div> 
                        <div class="col-md-6">        
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" disabled>
                                <label for="form1" class="">@lang('Hard Cover Circulation')</label>
                            </div>
                        </div> 
                    </div> 
                    
                    <div class="row">  
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Choose Colors')</option>
                            </select>
                            <label>@lang('Colors')</label>
                        </div>
                    </div>  
                    <div class="row">  
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Colors - First Pages')</option>
                            </select>
                            <label>@lang('Colors - First Pages')</label>
                        </div>
                    </div>  
                    <div class="row">  
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Colors - Last Pages')</option>
                            </select>
                            <label>@lang('Colors - Last Pages')</label>
                        </div>
                    </div>
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="" disabled>
                        <label for="form1" class="">@lang('Additional Work')</label>
                    </div>                          
                </div>

            <!-- Second column -->         
                <div class="col-md-6">
                    <div class="page-name-l mb-2">@lang('Cover')</div> 

                    <!-- Dropdown menu --> 
                    <div class="row">  
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Paper Type')</option>
                            </select>
                            <label>@lang('Paper Type')</label>
                        </div>
                    </div>

                    <!-- Input fileds -->         
                    <div class="row">  
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Choose Colors')</option>
                            </select>
                            <label>@lang('Colors')</label>
                        </div>
                    </div>  
                    <div class="row">  
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Plastification')</option>
                            </select>
                            <label>@lang('Plastification')</label>
                        </div>
                    </div> 

                    <!--/. Checkbox --> 
                    <div class="page-name-m">@lang('Film Print')</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio11" value="M" disabled>
                            <label for="radio11">@lang('No')</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio21" value="F" disabled>
                            <label for="radio21">@lang('Yes')</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">@lang('Blind Print')</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio11" value="M" disabled>
                            <label for="radio11">@lang('No')</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio21" value="F" disabled>
                            <label for="radio21">@lang('Yes')</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">@lang('UV Film')</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio11" value="M" disabled>
                            <label for="radio11">@lang('No')</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio21" value="F" disabled>
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
   
    <div class="page-name-l text-center">@lang('Download as...')</div> 
    <div class="file_box file_box_l d-flex align-items-center">
        <a src="" href="http://homestead.app/images/profile.pdf" class="file_icon">.pdf</a>
        <a src="" href="http://homestead.app/images/profile.doc" class="file_icon">.doc</a>
    </div>
   

    <!-- Footer buttons --> 
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    
    
    
@endsection
