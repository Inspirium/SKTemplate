@extends('sktemplate::layout')

@section('content')
    <div class="page-name-xl">@lang('Employees')</div>
    @component('sktemplate::components.search')@endcomponent
    <div class="btn-header d-flex p-2">
        <a href="{{ url('hr/employee/edit') }}" class="btn btn-lg btn-unique"><i class="fa fa-plus left"></i>@lang('Add New Employee')</a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>@lang('Name')</th>
            <th>@lang('Department')</th>
            <th>@lang('Phone')</th>
            <th>@lang('Mobile')</th>
            <th>@lang('Actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td><a href="{{ url('hr/employee/show/'.$employee->id) }}">{{ $employee->first_name . ' ' . $employee->last_name }}</a></td>
            <td>{{ $employee->department->name }}</td>
            <td>{{ $employee->getMeta('phone_pre') . ' ' . $employee->getMeta('phone') }}</td>
            <td>{{ $employee->getMeta('mobile_pre') . ' ' .$employee->getMeta('mobile') }}</td>
            <td>
                <a class="teal-text" href="{{ url('hr/employee/edit/'.$employee->id) }}" title="@lang('Edit')"><i class="fa fa-pencil"></i></a>
                <a class="red-text" href="{{ url('hr/employee/delete/'.$employee->id) }}" title="@lang('Delete')"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
