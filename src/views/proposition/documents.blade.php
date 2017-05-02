@extends('sktemplate::layout')

@section('content')

    <div class="row">
        <div class="col-md-12 mt-2 mx-auto">
            <div class="page-name-xl">@lang('Initial Documents')</div>
        </div>
    </div>
    
    <!-- File/document table -->  
    <div class="files mt-2 mb-2">
        <div class="file_box file_box_l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file_icon">Fizika i društvo.doc</a>
            <div class="file_box_sty ml-auto d-flex">
                <img class="profile_m_1 mr-3 float-left align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
            </div>
            <div class="file_box_sty">19.07.2017.</div>
            <div class="file_box_sty icon icon_download">Preuzmi</div>
            <div class="file_box_sty icon icon_cancel">Obriši</div>
        </div>
        <div class="file_box file_box_l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file_icon">Fizika i društvo.doc</a>
            <div class="file_box_sty ml-auto d-flex">
                <img class="profile_m_1 mr-3 float-left align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
            </div>
            <div class="file_box_sty">19.07.2017.</div>
            <div class="file_box_sty icon icon_download">Preuzmi</div>
            <div class="file_box_sty icon icon_cancel">Obriši</div>
        </div> 
    </div>
   
    <!-- Buttons -->
    <div class="btn-footer flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Upload Document')</button>
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->
    
    <div class="row">
        <div class="col-md-12 mt-4 mx-auto">
            <div class="page-name-xl mb-2">@lang('Final Documents')</div>
        </div>
    </div>
    
    <h3 class="text-center"><i class="fa fa-exclamation-circle color-cancel mr-2" aria-hidden="true"></i>@lang('No Documents Yet')
    </h3>
   
    <!-- Buttons -->
    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Upload Document')</button>
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    
    <!-- Textarea -->
    <div class="md-form mt-3">
        <textarea type="text" id="form76" class="md-textarea"></textarea>
        <label for="form76">@lang('Note')</label>
    </div>

    <!-- Buttons -->
    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
    </div>
@endsection
