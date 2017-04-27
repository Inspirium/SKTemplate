@extends('sktemplate::layout')

@section('content')
<div class="page-name-xl mb-3">@lang('User Roles')</div>
<div class="row">
    <div class="col-md-6">
    </div>
</div>
<div class="row">
    <div class="col col-md-5 mx-auto">
        <form method="post" action="{{ url('user/roles/' . $user->id) }}">
            {{ csrf_field() }}
            @foreach($roles as $role)
                <div class="switch switch_sty d-flex">
                    <span for="checkbox{{ $role->id }}" class="switch_label mr-auto">{{ $role->name }}</span>
                    <label class="">Off
                        <input type="checkbox" id="checkbox{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ $user->hasRole($role->name)?'checked':'' }}>
                        <span class="lever"></span>
                      On
                    </label>
                </div>
            @endforeach
        </form>
    </div>
</div>
<!-- Footer buttons --> 
<div class="btn-footer d-flex p-2">
    <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
    <button type="submit" class="btn btn-lg btn-cancel">@lang('Cancel')</button>
</div>
<!--/. Footer buttons -->
@endsection
