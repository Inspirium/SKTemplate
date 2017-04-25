@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl">@lang('Basic Info')</div>
    <div class="row">
        <div class="col-md-12">
           
            <!-- Input field -->
            <div class="row">
                <div class="col-md-12">   
                    <div class="md-form d-md-flex flex-sm-column">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="neko ime" required>
                        <label for="form1" class="">@lang('Author')</label>
                        <button type="button" class="btn btn-neutral">@lang('Dodaj')</button>
                        <button type="button" class="btn btn-neutral">@lang('Unesi novog')</button>
                    </div> 
                </div>
            </div>
                                        
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="neko ime" required>
                <label for="form1" class="">@lang('Title')</label>
            </div>  
            
            <div class="row">  
                <!-- Dropdown menu --> 
                <div class="col-md-6">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Category')</option>
                    </select>
                    <label>@lang('Category')</label>
                </div>
                     
                <!-- Dropdown menu --> 
                <div class="col-md-6">
                    <select class="mdb-select" name="department_id" required>
                        <option disabled >@lang('Choose Publishing Type')</option>
                    </select>
                    <label>@lang('Publishing Type')</label>
                </div>
            </div>
            
            <!--/. Checkbox -->
            <div class="page-name-m">@lang('Manuscript')</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="Ordered" required>
                    <label for="radio11">@lang('Ordered')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="Delivered" required>
                    <label for="radio21">@lang('Delivered')</label>
                </fieldset>
            </div>

            <!-- File/document table -->  
            <div class="file_box file_box_l d-flex align-items-center mt-1">
                <a src="" href="http://homestead.app/images/profile.pdf" class="file_icon">Fizika i društvo.doc</a>
                <div class="file_box_sty ml-auto">19.07.2017.</div>
                <div class="file_box_sty icon icon_download">Preuzmi</div>
                <div class="file_box_sty icon icon_cancel">Obriši</div>
            </div>
            
            <!--/. Checkbox -->
            <div class="page-name-m mt-2">@lang('Dotation')</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="yes" required>
                    <label for="radio11">@lang('Yes')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('No')</label>
                </fieldset>
            </div>
            
            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea type="text" id="form76" class="md-textarea"></textarea>
                <label for="form76">@lang('Concept')</label>
            </div>
            
            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea type="text" id="form76" class="md-textarea"></textarea>
                <label for="form76">@lang('Note')</label>
            </div>
            
            <!--/. Checkbox -->
            <div class="page-name-m mt-2">@lang('Possible Products')</div>
            <div class="form-inline">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="yes" required>
                    <label for="radio11">@lang('E-book')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('Website')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('App')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('Additional Language')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="no" required>
                    <label for="radio21">@lang('Short Edition')</label>
                </fieldset>
            </div>

            
        </div> 
    </div>

    <!-- Footer buttons --> 
    <div class="btn-footer d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Delete')</button>
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Nesto')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->    






@endsection
