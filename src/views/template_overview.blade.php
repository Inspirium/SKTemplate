@extends('sktemplate::layout')

@section('content')
   
    <!-- File/document table -->  
    <div class="file_box file_box_l d-flex align-items-center">
        <a src="" href="http://homestead.app/images/profile.pdf" class="file_icon">Fizika i društvo.doc</a>
        <div class="file_box_sty ml-auto">19.07.2017.</div>
        <div class="file_box_sty icon icon_download">Preuzmi</div>
        <div class="file_box_sty icon icon_cancel">Obriši</div>
    </div>
    
    
    <!-- Styles --> 
    <h1 class="mt-3">H1 Testing</h1>
    <h2>H2 Testing</h2>
    <h3>H3 Testing</h3>
    <h4>H4 Testing</h4>
    <h5>H5 Testing</h5>
    <h6>H6 Testing</h6>
    <div class="file_box_sty">file_box_sty</div>
    
    
    <!-- Footer buttons --> 
    <div class="btn-footer d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Cancel')</button>
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Nesto')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>

    </div>
    <!--/. Footer buttons -->
    
    <!-- Display fields --> 
    <div class="row">
        <div class="col-md-4">
            <img src="http://homestead.app/images/profile.jpg" class="profile_xl mt-2">
        </div>
        <div class="col-md-8 showdata_box">
            <div class="page-name-l">@lang('Basic Info')</div>
            <div>
                <h6 class="no_border">@lang('Email')</h6>
                <h3 class="mb-1">stjepan@drmic.com</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('Mobile Phone')</h6>
                    <h3 class="mb-1">345345345</h3>
                </div>
                <div class="col-md-6">
                    <h6>@lang('VPN Mobile Phone')</h6>
                    <h3 class="mb-1">250</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('Phone')</h6>
                    <h3 class="mb-1">456456456</h3>
                </div>
                <div class="col-md-6">
                    <h6>@lang('VPN phone')</h6>
                    <h3 class="mb-1">432</h3>
                </div>
            </div>
        </div>
    </div>
    <!--/. Display fields -->
    
    <!-- Input fields --> 
    <div class="page-name-xl">@lang('Name And Surname')</div>
    <div class="row">
        <div class="col-md-6">
            <div class="page-name-l">@lang('First and Last Name')</div>
            
            <!-- Input field --> 
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="neko ime" required>
                <label for="form1" class="">@lang('First Name')</label>
            </div>
            <!--/. Input field --> 
            
            <!--/. Checkbox -->
            <div class="page-name-m">Spol</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="M" required>
                    <label for="radio11">@lang('M')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="F" required>
                    <label for="radio21">@lang('F')</label>
                </fieldset>
            </div>
            <!--/. Checkbox -->
          
           <!-- Dropdown menu --> 
            <div class="pos_rel">
                <select class="mdb-select" name="department_id" required>
                    <option disabled >@lang('Choose Department')</option>
                </select>
                <label>@lang('Department')</label>
            </div>
            <!--/. Dropdown menu --> 
           
            <div class="row">
                <div class="col-md-3">
                <select class="mdb-select" name="phone_pre">
                    <option disabled>@lang('Choose')</option>
                </select>
                </div>
                <div class="col-md-6">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile" placeholder="test">
                        <label for="form4" class="">@lang('Mobile Phone')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile_vpn" placeholder="test">
                        <label for="form4" class="">@lang('VPN Mobile')</label>
                    </div>
                </div>              
            </div>
            
            <!-- Textarea -->
            <div class="md-form">
                <textarea type="text" id="form76" class="md-textarea"></textarea>
                <label for="form76">Basic textarea</label>
            </div>
            
        </div>
    </div>
    
    
    <!--/. Input fields -->
    
    
    
@endsection


