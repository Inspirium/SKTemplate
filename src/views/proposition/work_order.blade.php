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
            <img class="profile-m-1 mr-2 float-left" src="../images/profile.jpg" href="#">
            <h6 class="white-label">@lang('Editor')</h6>
            <h3 class="mb-1 text-white">Jelena Lončarić</h3>
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

    <div class="row">
        <div class="col-md-6 mt-3 mx-auto">
            <div class="page-name-xl mb-2">@lang('Project Code')</div>

            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" required>
                <label for="form1" class="">@lang('Assign Code')</label>
            </div>
            <!--/. Input field -->
        </div>
    </div>

    <!-- Buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->

@endsection
