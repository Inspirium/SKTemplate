@extends('sktemplate::layout')

@section('content')
    <div class="page-name-xl">@lang('Roles')</div>
    @component('sktemplate::components.search')@endcomponent
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
                <a class="teal-text" href="{{ url('user/role/edit/'.$role->id) }}" title="@lang('Edit')"><i class="fa fa-pencil"></i></a>
                <a class="red-text" href="{{ url('user/role/delete/'.$role->id) }}" title="@lang('Delete')"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
