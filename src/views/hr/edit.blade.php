@extends('sktemplate::layout')

@section('content')
    <form method="post">
    <div class="page-name-xl">Ime i prezime</div>
    <div class="row">
        <div class="col-md-6">
            <div class="page-name-l">@lang('First and Last Name')</div>
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" value="{{ $employee->first_name }}">
                <label for="form1" class="">@lang('First Name')</label>
            </div>
            <div class="md-form">
                <input type="text" id="form2" class="form-control" name="last_name" value="{{ $employee->last_name }}">
                <label for="form2" class="">@lang('Last Name')</label>
            </div>
            <div class="page-name-m">Spol</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="M" {{ $employee->sex=='M'?'checked':'' }}>
                    <label for="radio11">@lang('M')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="F" {{ $employee->sex=='F'?'checked':'' }}>
                    <label for="radio21">@lang('F')</label>
                </fieldset>
            </div>

            <div class="pos_rel">
                <select class="mdb-select">
                    <option disabled>@lang('Choose Department')</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id?'selected':'' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
                <label>@lang('Department')</label>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <select class="mdb-select" name="mobile_pre">
                        <option disabled>@lang('Choose')</option>
                        @foreach($phones as $phone)
                        <option value="{{ $phone }}">{{ $phone }}</option>
                        @endforeach
                    </select>
                    <label>Predbroj</label>
                </div>
                <div class="col-md-6">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile">
                        <label for="form4" class="">Mobitel</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile_vpn">
                        <label for="form4" class="">VPN mobitel</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <select class="mdb-select" name="phone_pre">
                        <option disabled selected>@lang('Choose')</option>
                        @foreach($phones as $phone)
                            <option value="{{ $phone }}">{{ $phone }}</option>
                        @endforeach
                    </select>
                    <label>Predbroj</label>
                </div>
                <div class="col-md-6">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="phone">
                        <label for="form4" class="">Telefon</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="phone_vpn">
                        <label for="form4" class="">VPN telefon</label>
                    </div>
                </div>
            </div>
            <div class="md-form">
                <input type="text" id="form3" class="form-control" name="address">
                <label for="form3" class="">Adresa</label>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="md-form">
                        <input type="text" id="form4" class="form-control" name="city">
                        <label for="form4" class="">Grad</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="md-form">
                        <input type="text" id="form4" class="form-control" name="postal_code">
                        <label for="form4" class="">Poštanski broj</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 order-sm-first">
            <div class="page-name-l">Fotografija</div>
            <div class="d-flex flex-column align-items-center">
                <img src="https://www.gravatar.com/avatar/{{ md5( Auth::user()->email ) }}?s=300&d=wavatar" href="#" class="profile_xl">
                <button type="button" class="btn btn-neutral mt-1">Upload nove fotografije</button>
                <div>
                    <button type="button" class="btn btn-save">Spremi</button>
                    <button type="button" class="btn btn-cancel">Odustani</button>
                </div>
            </div>
            <!-- Autocomplete -->
            <div class="md-form mt-3">
                <input type="search" id="form-autocomplete" class="form-control mdb-autocomplete">
                <button class="mdb-autocomplete-clear">
                    <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        <path d="M0 0h24v24H0z" fill="none" />
                    </svg>
                </button>
                <label for="form-autocomplete" class="active">Autocomplete - kako napraviti?</label>
            </div>
            <!--/. Autocomplete -->
        </div>
    </div>
    <!-- Footer buttons -->
    <div class="btn-footer d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">Spremi</button>
        <button type="button" class="btn btn-lg btn-cancel">Odustani</button>
        <button type="button" class="btn btn-lg btn-unique"><i class="fa fa-external-link left"></i>Zaduži</button>
    </div>
    </form>
@endsection
