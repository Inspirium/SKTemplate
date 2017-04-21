@extends('sktemplate::layout')

@section('content')
</div>
<div class="profile_head d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-3 text-white">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
    <h4 class="text-white text-center pt-1">{{ $employee->department }}</h4>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-4">
            <img src="http://homestead.app/images/profile.jpg" href="#" class="profile_xl mt-2">
        </div>
        <div class="col-md-8">
            <div class="page-name-l">@lang('Basic Info')</div>
            <div class="showdata_box">
                <h6>@lang('Email')</h6>
                <h3>{{ $employee->email }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6 showdata_box">
                    <h6>@lang('Mobile Phone')</h6>
                    <h3>{{ $employee->getMeta('mobile') }}"</h3>
                </div>
                <div class="col-md-6 showdata_box">
                    <h6>@lang('VPN Mobile Phone')</h6>
                    <h3>{{ $employee->getMeta('mobile_vpn') }}</h3>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-6 showdata_box">
                    <h6>@lang('Phone')</h6>
                    <h3>{{ $employee->getMeta('phone') }}"</h3>
                </div>
                <div class="col-md-6 showdata_box">
                    <h6>@lang('VPN phone')</h6>
                    <h3>{{ $employee->getMeta('phone_vpn') }}</h3>
                </div>    
            </div>
            <div class="showdata_box">
                <h6>@lang('Office Location')</h6>
                <h3>{{ $employee->getMeta('address') }}-broj sobe</h3>
            </div>
            <div class="showdata_box">
                <h6>@lang('Address')</h6>
                <h3>{{ $employee->getMeta('address') }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6 showdata_box">
                    <h6>@lang('City')</h6>
                    <h3>{{ $employee->getMeta('city') }}</h3>
                </div>
                <div class="col-md-6 showdata_box">
                    <h6>@lang('Postal Code')</h6>
                    <h3>{{ $employee->getMeta('postal_code') }}</h3>
                </div>    
            </div>
        </div>
    </div>
    <!-- Footer buttons --> 
    <div class="btn-footer d-flex p-2">
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Edit')</button>
    </div>
    <!--/. Footer buttons -->
</div>
@endsection
