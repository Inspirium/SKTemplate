@extends('sktemplate::layout')

@section('content')
</div>
<div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-3 text-white text-center">Ime task</h1>
</div>

<!-- Display fileds -->
<div class="content">
    <div class="profile-head pb-2 row">
       <div class="col-md-3">
            <img class="profile-m-1 mr-2 float-left" src="../images/profile.jpg" href="#">
            <h6 class="white-label">@lang('Assigner')</h6>
            <h3 class="mb-1 text-white">Jelena Lončarić</h3>
        </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Task Type')</h6>
            <h3 class="mb-1 text-white">155.446 kn</h3>
       </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Task Sent')</h6>
            <h3 class="mb-1 text-white">22.985 kn</h3>
       </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Deadline / Priority')<span class="badge badge-danger display-d mt-1 float-right">@lang('High')</span></h6>
            <h3 class="mb-1 text-white">25.9.</h3>
       </div>
    </div>

    <!-- Task description -->   
    <div class="showdata-box">
        <div class="page-name-l mt-2 mb-1">@lang('Task Description')</div>
        <div>
            <h4 class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rerum accusamus, tenetur, similique quam eum quia porro commodi odit cum autem ut, alias optio dolor odio velit maxime, aliquid molestias.</h4>
        </div>
    </div>
    
    

    <!-- Documents upload -->
    <div class="page-name-l mb-1 mt-2">@lang('Documents')</div>
    <button class="btn btn-neutral btn-addon" type="button">@lang('Add Documents')</button>

    <!-- File/document table -->
    <div class="files mt-2 mb-2">
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <img class="profile-m-1 mr-3 float-left align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
            </div>
            <div class="file-box-sty">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <img class="profile-m-1 mr-3 float-left align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
            </div>
            <div class="file-box-sty">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
    </div>

    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Accept')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Reject')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->






@endsection
