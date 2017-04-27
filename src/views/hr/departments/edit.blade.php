@extends('sktemplate::layout')

@section('content')


    <div class="page-name-xl mb-3">@lang('New department')</div>
    <div class="row">
        <div class="col-md-6">
        </div>
    </div>
    <div class="row">
        <div class="col col-md-5 mx-auto">      
            <form action="{{ url('hr/department/edit/'.$department->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">@lang("Name")</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang("Enter Name")" required value="{{ $department->name }}">
                </div>
            </form>
        </div>
    </div>
    <!-- Footer buttons --> 
    <div class="btn-footer d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Cancel')</button>
    </div>
    <!--/. Footer buttons -->
@endsection
