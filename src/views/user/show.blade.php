@extends('sktemplate::layout')

@section('content')
    <div class="row">
        <div class="col col-md-6">
            <img src="https://www.gravatar.com/avatar/{{ md5( $user->email ) }}?s=200&d=wavatar" class="img-fluid">
        </div>
        <div class="col col-md-6">
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
            @if(Auth::user()->hasRole('user_edit'))
                <a href="{{ url('user/edit/'.$user->id) }}" class="btn btn-primary">@lang('Edit User')</a>
            @endif
            @if(Auth::user()->hasRole('user_edit_roles'))
                <a href="{{ url('user/roles/'.$user->id) }}" class="btn btn-primary">@lang('Edit User Roles')</a>
            @endif
        </div>
    </div>

@endsection
