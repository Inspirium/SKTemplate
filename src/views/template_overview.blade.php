@extends('sktemplate::layout')

@section('content')
   
    <!-- File/document table -->  
    <div class="file_box file_box_l d-flex align-items-center">
        <a src="" href="http://homestead.app/images/profile.docx" class="file_icon">Fizika i društvo u ovom pokvarenom društvu u kojme živimo.doc</a>
        <div class="file_box_sty ml-auto">19.07.2017.</div>
        <div class="file_box_sty icon icon_download">Preuzmi</div>
        <div class="file_box_sty icon icon_cancel">Obriši</div>
    </div>
    
    
    <!-- Styles --> 
    <h1 class="mt-3">Testing</h1>
    <h2>Testing</h2>
    <h3>Testing</h3>
    <h4>Testing</h4>
    <h5>Testing</h5>
    <h6>Testing</h6>
    <div class="file_box_sty">Testing</div>
    
    
    <!-- Footer buttons --> 
    <div class="btn-footer d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Cancel')</button>
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Nesto')</button>
    </div>
    <!--/. Footer buttons -->
    
    
    
    
    
    
    
@endsection


