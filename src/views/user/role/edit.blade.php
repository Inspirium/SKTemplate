@extends('sktemplate::layout')

@section('content')

    <form action="{{ url('user/edit/'.$role->id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">@lang("Name")</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="@lang("Enter Name")" required value="{{ $role->name }}">
        </div>
        <div class="form-group">
            <label for="description">@lang("Email Address")</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="@lang("Enter Description")" required value="{{ $role->email }}">
        </div>
        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
    </form>
@endsection
