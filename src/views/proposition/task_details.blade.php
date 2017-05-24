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
            <a href="#">
                <img class="profile-m-2 mr-1 float-left" src="../images/profile.jpg" href="#">
                <h6 class="white-label">@lang('Assigner')</h6>
                <h3 class="mb-1 text-white">Jelena Lončarić</h3>
            </a>
        </div>
       <div class="col-md-3">
            <a href="#">
                <img class="profile-m-2 mr-1 float-left" src="../images/profile.jpg" href="#">
                <h6 class="white-label">@lang('Assign to')</h6>
                <h3 class="mb-1 text-white">Unknown</h3>
            </a>
        </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Task Sent')</h6>
            <h3 class="mb-1 text-white">22.09.</h3>
       </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Deadline / Priority')<span class="badge badge-danger display-d mt-1 float-right">@lang('High')</span></h6>
            <h3 class="mb-1 text-white">25.9.</h3>
       </div>
    </div>
    
    <!-- Highlighted input filed -->
    <div class="page-name-xl mt-2">@lang('Task Completion Time')</div>
    <div class="grey-box mb-3 pt-3 px-1 mx-auto">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <!-- Input field -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form input-group">
                            <input type="time-input" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                            <label for="form1" class="">@lang('Hours')</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form input-group">
                            <input type="time-input" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                            <label for="form1" class="">@lang('Minutes')</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Task description -->   
    <div class="showdata-box row">
        <div class="col-md-9">
            <div class="page-name-l mt-2 mb-1">@lang('Task Description')</div>
            <div>
                <h4 class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt rerum accusamus, tenetur, similique quam eum quia porro commodi odit cum autem ut, alias optio dolor odio velit maxime, aliquid molestias.</h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="page-name-l mt-2 mb-1">@lang('Task Type')</div>
            <div>
                <h4 class="mb-1">Project</h4>
            </div>
        </div>
    </div>


    <!-- File/document table -->
    <div class="page-name-l mb-1 mt-2">@lang('Documents')</div>
    <div class="files mt-2 mb-2">
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
                    </a></div>
            <div class="file-box-sty">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
                </a></div>
            <div class="file-box-sty">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
    </div>

    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Accept')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Reject')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>

    <!-- File/document table -->
    <div class="page-name-xl mb-1">@lang('Documents')</div>     
    <div class="files mt-2 mb-2">
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Stjepan Drmić
                    </a></div>
            <div class="file-box-sty">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
    </div>   
    <button class="btn btn-neutral d-block mx-auto btn-addon" type="button">@lang('Upload')</button>

    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-2 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-attention">@lang('Send on Approval')</button>
    </div>

    <!-- File/document table -->
    <div class="page-name-xl mb-1">@lang('Documents')</div>     
    <div class="files mt-2">
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Stjepan Drmić</a>
            </div>
            <div class="file-box-sty">24.07.2017.</div>
            <div class="file-box-sty icon icon-approval-pending">@lang('Approval Pending...')</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Stjepan Drmić</a>
            </div>
            <div class="file-box-sty">24.07.2017.</div>
            <div class="file-box-sty icon icon-approval-comments">@lang('Comments')</div>
            <div class="file-box-sty icon icon-approval-no">@lang('Approval Denied')</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Stjepan Drmić</a>
            </div>
            <div class="file-box-sty">24.07.2017.</div>
            <div class="file-box-sty icon icon-approval-yes">@lang('Approved')</div>
        </div>
    </div>     






@endsection
