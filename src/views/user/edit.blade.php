@extends('sktemplate::layout')

@section('content')
<div class="page-name-xl mb-3">@lang('Edit User')</div>
<form action="{{ url('user/edit/'.$user->id) }}" method="post">
    <div class="row">
        <div class="col-md-4 order-sm-first">
            <div class="d-flex flex-column align-items-center">
                <img src="https://www.gravatar.com/avatar/{{ md5( $user->email ) }}?s=300&d=wavatar" href="#" class="profile_xl">
                <button type="button" class="btn btn-neutral mt-1">@lang('Upload New Image')</button>
            </div>
        </div>
        <div class="col-md-8">
                {{ csrf_field() }}
                <div class="col-md-12 mx-auto">
                    <div class="form-group">
                        <label for="name">@lang("Name")</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="@lang("Enter Name")" required value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">@lang("Email Address")</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="@lang("Enter Email")" required value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">@lang("Password")</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="@lang("Enter Password")">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">@lang("Repeat Password")</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang("Enter Password Again")">
                    </div>
                </div>
        </div>
    </div>
    
    <!-- Footer buttons --> 
    <div class="btn-footer mt-2 mb-5 d-flex p-2">
        <button type="button" class="btn btn-lg btn-save">@lang("Submit")</button>
    </div>
    <!--/. Footer buttons --> 
</form>
@endsection




