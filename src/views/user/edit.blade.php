@extends('sktemplate::layout')

@section('content')

    <form action="{{ url('user/edit/'.$user->id) }}" method="post">
        {{ csrf_field() }}
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
        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
    </form>
@endsection
