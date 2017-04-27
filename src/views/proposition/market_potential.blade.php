@extends('sktemplate::layout')

@section('content')

    <div class="page-name-xl mb-3">@lang('Market Potential')</div>
    <div class="row">
        <div class="col-md-12">
           
            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Title')" required>
                <label for="form1" class="">@lang('Main Target')</label>
            </div>  
              
            <!-- Textarea -->
            <div class="md-form mt-3">
                <textarea type="text" id="form76" class="md-textarea"></textarea>
                <label for="form76">@lang('Note')</label>
            </div>
                        
            <!-- Documents upload -->            
            <div class="page-name-m mt-2">@lang('Documents')</div>
            <button class="btn btn-neutral btn-addon" type="button">@lang('Add Documents')</button>

                        
            <!-- File/document table -->  
            <div class="files">
                <div class="file_box file_box_l d-flex align-items-center">
                    <a src="" href="http://homestead.app/images/profile.pdf" class="file_icon">Fizika i društvo.doc</a>
                    <div class="file_box_sty ml-auto">19.07.2017.</div>
                    <div class="file_box_sty icon icon_download">Preuzmi</div>
                    <div class="file_box_sty icon icon_cancel">Obriši</div>
                </div>            
                <div class="file_box file_box_l d-flex align-items-center">
                    <a src="" href="http://homestead.app/images/profile.pdf" class="file_icon">Fizika i društvo.doc</a>
                    <div class="file_box_sty ml-auto">19.07.2017.</div>
                    <div class="file_box_sty icon icon_download">Preuzmi</div>
                    <div class="file_box_sty icon icon_cancel">Obriši</div>
                </div>
            </div>
        </div> 
    </div>

    <!-- Footer buttons --> 
    <div class="btn-footer flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Delete')</button>
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Nesto')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign_icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->    


@endsection
