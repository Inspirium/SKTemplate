@extends('sktemplate::layout')

@section('content')
<h1>@lang('User Roles')</h1>
<form method="post" action="{{ url('user/roles/' . $user->id) }}">
    {{ csrf_field() }}
    @foreach($roles as $role)
        <fieldset class="form-group">
            <input type="checkbox" id="checkbox{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ $user->hasRole($role->name)?'checked':'' }}>
            <label for="checkbox{{ $role->id }}">{{ $role->name }}</label>
        </fieldset>
    @endforeach
    <input type="submit" class="btn btn-primary" value="@lang('Submit')">
</form>
@endsection
