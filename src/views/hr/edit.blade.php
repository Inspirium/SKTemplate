@extends('sktemplate::layout')

@section('content')
    <div class="content">
    <form method="post" action="{{ url('human_resources/employee/edit/'.$employee->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="page-name-xl mb-4 mt-3">@lang('Name And Surname')</div>
    <div class="row">
        <div class="col-md-6">
            <div class="page-name-l mb-4">@lang('First and Last Name')</div>
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" value="{{ $employee->first_name }}" required>
                <label for="form1" class="">@lang('First Name')</label>
            </div>
            <div class="md-form">
                <input type="text" id="form2" class="form-control" name="last_name" value="{{ $employee->last_name }}" required>
                <label for="form2" class="">@lang('Last Name')</label>
            </div>
            <div class="page-name-m">Spol</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="M" {{ $employee->getMeta('sex', 'M')=='M'?'checked':'' }} required>
                    <label for="radio11">@lang('M')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="F" {{ $employee->getMeta('sex', 'M')=='F'?'checked':'' }} required>
                    <label for="radio21">@lang('F')</label>
                </fieldset>
            </div>

            <div class="pos-rel">
                <select class="mdb-select" name="department_id" required>
                    <option disabled {{ $employee->department_id?'':'selected' }}>@lang('Choose Department')</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id?'selected':'' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
                <label>@lang('Department')</label>
            </div>
            <div class="md-form">
                <input type="email" id="email" class="form-control" name="email" value="{{ $employee->email }}" required>
                <label for="email" class="">@lang('Email')</label>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <select class="mdb-select" name="mobile_pre">
                        <option disabled {{ $employee->getMeta('mobile_pre')?'':'selected' }}>@lang('Choose')</option>
                        @foreach($phones as $phone)
                        <option value="{{ $phone }}" {{ ($employee->getMeta('mobile_pre') == $phone)?'selected':'' }}>{{ $phone }}</option>
                        @endforeach
                    </select>
                    <label>@lang('Area Code')</label>
                </div>
                <div class="col-md-6">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile" value="{{ $employee->getMeta('mobile') }}">
                        <label for="form4" class="">@lang('Mobile Phone')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile_vpn" value="{{ $employee->getMeta('mobile_vpn') }}">
                        <label for="form4" class="">@lang('VPN Mobile Phone')</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <select class="mdb-select" name="phone_pre">
                        <option disabled {{ $employee->getMeta('phone_pre')?'':'selected' }}>@lang('Choose')</option>
                        @foreach($phones as $phone)
                            <option value="{{ $phone }}" {{ ($employee->getMeta('phone_pre') == $phone)?'selected':'' }}>{{ $phone }}</option>
                        @endforeach
                    </select>
                    <label>@lang('Area Code')</label>
                </div>
                <div class="col-md-6">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="phone" value="{{ $employee->getMeta('phone') }}">
                        <label for="form4" class="">@lang('Phone')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="phone_vpn" value="{{ $employee->getMeta('phone_vpn') }}">
                        <label for="form4" class="">@lang('VPN phone')</label>
                    </div>
                </div>
            </div>
            <div class="md-form">
                <input type="text" id="room" class="form-control" name="room" value="{{ $employee->getMeta('room') }}">
                <label for="room" class="">@lang('Office Location')</label>
            </div>
            <div class="md-form">
                <input type="text" id="form3" class="form-control" name="address" value="{{ $employee->getMeta('address') }}">
                <label for="form3" class="">@lang('Address')</label>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="md-form">
                        <input type="text" id="form4" class="form-control" name="city" value="{{ $employee->getMeta('city') }}">
                        <label for="form4" class="">@lang('City')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="md-form">
                        <input type="text" id="form4" class="form-control" name="postal_code" value="{{ $employee->getMeta('postal_code') }}">
                        <label for="form4" class="">@lang('Postal Code')</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 order-sm-first">
            <div class="page-name-l mb-4">@lang('Image')</div>
            <div class="d-flex flex-column align-items-center">
                <img src="https://www.gravatar.com/avatar/{{ md5( $employee->email ) }}?s=300&d=wavatar" href="#" class="profile-xl">
                <button type="button" class="btn btn-neutral mt-1">@lang('Upload New Image')</button>
            </div>
        </div>
    </div>
    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Save')</button>
        <button type="button" class="btn btn-lg btn-cancel">@lang('Cancel')</button>
    </div>
    </form>
    </div>
@endsection
