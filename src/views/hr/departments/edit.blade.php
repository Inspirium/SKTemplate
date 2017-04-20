@extends('sktemplate::layout')

@section('content')

    <form action="{{ url('hr/department/edit/'.$department->id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">@lang("Name")</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="@lang("Enter Name")" required value="{{ $department->name }}">
        </div>
        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
    </form>
@endsection
