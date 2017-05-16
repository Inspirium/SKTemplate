@extends('sktemplate::layout')

@section('content')
</div>
<div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-3 text-white text-center">@lang('Title name')</h1>
</div>

<div class="content">
    <!-- Header -->
    <div class="profile-head pb-2 row">
        <div class="col-md-4">
            <a href="#">
                <img class="profile-m-2 mr-1 float-left" src="../images/profile.jpg" href="#">
                <h6 class="white-label">@lang('Assigner')</h6>
                <h3 class="mb-1 text-white">Jelena Lončarić</h3>
            </a>
        </div>
        <div class="col-md-4">
            <h6 class="white-label">@lang('Starting Date')</h6>
            <h3 class="mb-1 text-white">19.10.2017.</h3>
        </div>
        <div class="col-md-4">
            <h6 class="white-label">@lang('Total Time')</h6>
            <h3 class="mb-1 text-white">4 days 15 hours</h3>
        </div>
    </div>

    <!-- Notification -->
    <div class="notification-bar btn-attention d-flex flex-md-row flex-column justify-content-start align-items-center mt-2">
        <div class="file-box-sty text-white btn-clock-icon">@lang('Task Sent')</div>
        <div class="file-box-sty text-white">@lang('Publisher Director')</div>
        <div class="file-box-sty text-white">@lang('25.11.2017.')</div>
        <div class="file-box-sty text-white">@lang('Waiting time'): 2 days 15 hours</div>
    </div>

    <!-- Buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button data-toggle="tooltip" title="@lang('You need to finish your proposition first')" type="submit" class="btn btn-lg btn-save" disabled>@lang('Send on Approval')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Delete')</button>
    </div>
    <!--/. Footer buttons -->

@endsection
