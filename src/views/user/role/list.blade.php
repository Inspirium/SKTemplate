@extends('sktemplate::layout')

@section('content')
    <div class="page-name-xl">@lang('Roles')</div>
    <!-- Search -->
    <div class="md-form input-group search-big">
        <input type="search" class="form-control" placeholder="@lang('Search')">
        <span class="input-group-btn">
                <a class="btn btn-neutral btn-lg search-big-button" type="button"><i class="fa fa-search fa-4x left"></i></a>
            </span>
    </div>
    <!--/. Search -->
    <div class="btn-header d-flex p-2">
        <a href="{{ url('user/role/edit') }}" class="btn btn-lg btn-unique"><i class="fa fa-plus left"></i>@lang('Add New Role')</a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>@lang('Title')</th>
            <th>@lang('Description')</th>
            <th>@lang('Actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a class="teal-text" href="{{ url('user/role/edit/'.$user->id) }}" title="@lang('Edit')"><i class="fa fa-pencil"></i></a>
                <a class="red-text" href="{{ url('user/role/delete/'.$user->id) }}" title="@lang('Delete')"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
