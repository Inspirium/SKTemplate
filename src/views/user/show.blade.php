@extends('sktemplate::layout')

@section('content')
   
    </div>
    <div class="profile_head d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-white">{{ $user->name }}</h1>
    </div>  
<div class="content">    
    <div class="row">
        <div class="col col-md-4">
            <img src="https://www.gravatar.com/avatar/{{ md5( $user->email ) }}?s=200&d=wavatar" class="profile_xl mt-2 mx-auto">
        </div>
        <div class="col-md-8 showdata_box">
            <div class="data_section_l">
                <div class="page-name-l">@lang('Basic Info')</div>
                <h6 class="no_border">@lang('Email')</h6>
                <h3 class="mb-1">{{ $user->email }}</h3>
            </div>
            <div class="data_section_l">
                <div class="page-name-l">@lang('User Roles')</div>
                <div class="row">
                    <div class="col-md-12">
                @foreach($user->roles as $role)
                        <h6>{{ $role->name }}</h6>
                        <h3 class="mb-1">{{ $role->description }}</h3>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
           
           

    <!-- Footer buttons -->
    <div class="btn-footer d-flex p-2">
    @if(Auth::user()->hasRole('user_edit'))
        <a href="{{ url('user/edit/'.$user->id) }}" class="btn btn-lg btn-neutral">@lang('Edit User')</a>
    @endif
    @if(Auth::user()->hasRole('user_edit_roles'))
        <a href="{{ url('user/roles/'.$user->id) }}" class="btn btn-lg btn-neutral">@lang('Edit User Roles')</a>
    @endif
    </div>
    <!--/. Footer buttons -->
</div>

@endsection
