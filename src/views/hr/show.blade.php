@extends('sktemplate::layout')

@section('content')

<div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
    <div class="col-md-12">
        <h1 class="display-3 text-white text-center">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
        <h4 class="text-white text-center pt-1">{{ $employee->department->name }}</h4>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $employee->image }}" class="profile-xl mt-2">
        </div>
        <div class="col-md-8 showdata-box">
            <div class="page-name-l mb-4">@lang('Basic Info')</div>
            <div>
                <h6 class="no-border">@lang('Email')</h6>
                <h3 class="mb-1">{{ $employee->email }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('Mobile Phone')</h6>
                    <h3 class="mb-1">{{ $employee->getMeta('mobile') }}</h3>
                </div>
                <div class="col-md-6">
                    <h6>@lang('VPN Mobile Phone')</h6>
                    <h3 class="mb-1">{{ $employee->getMeta('mobile_vpn') }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('Phone')</h6>
                    <h3 class="mb-1">{{ $employee->getMeta('phone') }}</h3>
                </div>
                <div class="col-md-6">
                    <h6>@lang('VPN phone')</h6>
                    <h3 class="mb-1">{{ $employee->getMeta('phone_vpn') }}</h3>
                </div>
            </div>
            <div>
                <h6>@lang('Office Location')</h6>
                <h3 class="mb-1">{{ $employee->getMeta('room') }}</h3>
            </div>
            <div>
                <h6>@lang('Address')</h6>
                <h3 class="mb-1">{{ $employee->getMeta('address') }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('City')</h6>
                    <h3 class="mb-1">{{ $employee->getMeta('city') }}</h3>
                </div>
                <div class="col-md-6">
                    <h6>@lang('Postal Code')</h6>
                    <h3 class="mb-1">{{ $employee->getMeta('postal_code') }}</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 d-flex p-2">
        <a href="/human_resources/employee/edit/{{ $employee->id }}" class="btn btn-lg btn-neutral">@lang('Edit')</a>
    </div>
    <!--/. Footer buttons -->
</div>
@endsection
