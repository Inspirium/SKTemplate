    @extends('sktemplate::layout')

@section('content')
    <div class="profile-head row py-4 d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-12">
            <h1 class="display-3 text-center text-white">{{ $user->name }}{{ $user->last_name }}</h1>
        </div>
    </div>
<div class="content">
    <div class="row mt-3">
        <div class="col col-md-4">
            <img src="https://www.gravatar.com/avatar/{{ md5( $user->email ) }}?s=200&d=wavatar" class="profile-xl mt-2 mx-auto">
        </div>
        <div class="col-md-8 showdata-box">
            <div class="data-section-l">
                <div class="page-name-l mb-1">@lang('Basic Info')</div>
                <h6 class="no-border">@lang('Email')</h6>
                <h5 class="mb-1">{{ $user->email }}</h5>
            </div>
            <div class="data-section-l">
                <div class="page-name-l mb-1 mt-4">@lang('User Roles')</div>
                <div class="row">
                    <div class="col-md-12">
                @foreach($user->roles as $role)
                        <h6>{{ $role->name }}</h6>
                        <h5 class="mb-1">{{ $role->description }}</h5>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 d-flex p-2">
    @if(Auth::user()->hasRole('user_edit'))
        <a href="{{ url('administration/user/edit/'.$user->id) }}" class="btn btn-lg btn-neutral">@lang('Edit User')</a>
    @endif
    @if(Auth::user()->hasRole('user_edit_roles'))
        <a href="{{ url('administration/user/roles/'.$user->id) }}" class="btn btn-lg btn-neutral">@lang('Edit User Roles')</a>
    @endif
    </div>
    <!--/. Footer buttons -->
</div>

@endsection
