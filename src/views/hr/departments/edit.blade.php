@extends('sktemplate::layout')

@section('content')
    <div class="content">

    <div class="page-name-xl mb-4 mt-3">@lang('New department')</div>
    <div class="row">
        <div class="col-md-6">
        </div>
    </div>
    <form action="{{ url('hr/department/edit/'.$department->id) }}" method="post">
        <div class="row">
            <div class="col col-md-5 mx-auto">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">@lang("Name")</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang("Enter Name")" required value="{{ $department->name }}">
                </div>
            </div>
        </div>
        <!-- Footer buttons -->
        <div class="btn-footer mt-2 mb-5 d-flex p-2">
            <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
            <button type="submit" class="btn btn-lg btn-cancel">@lang('Cancel')</button>
        </div>
        <!--/. Footer buttons -->
    </form>
    </div>
@endsection
