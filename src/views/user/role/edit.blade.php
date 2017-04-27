@extends('sktemplate::layout')

@section('content')

    <form action="{{ url('user/role/edit/'.$role->id) }}" method="post">
        {{ csrf_field() }}
        <div class="page-name-xl mb-3">@lang("Roles")</div>
        <div class="col-md-5 mx-auto">
            <div class="form-group">
                <label for="name">@lang("Name")</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="@lang("Enter Name")" required value="{{ $role->name }}">
            </div>
            <div class="form-group">
                <label for="description">@lang("Description")</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="@lang("Enter Description")" required value="{{ $role->description }}">
            </div>
        </div>
    </form>
    <!-- Footer buttons --> 
    <div class="btn-footer d-flex p-2">
        <button type="button" class="btn btn-lg btn-neutral">@lang("Submit")</button>
    </div>
    <!--/. Footer buttons --> 
@endsection
