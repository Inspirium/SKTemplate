@extends('sktemplate::layout')

@section('content')
    <div class="page-name-xl">@lang('Users')</div>
    @component('sktemplate::components.search')@endcomponent
    <div class="btn-header d-flex p-2">
        <a href="{{ url('user/edit') }}" class="btn btn-lg btn-unique"><i class="fa fa-plus left"></i>@lang('Add New User')</a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>@lang('Name')</th>
            <th>@lang('Email')</th>
            <th>@lang('Actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td><a href="{{ url('user/show/'.$user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="teal-text" href="{{ url('user/edit/'.$user->id) }}" title="@lang('Edit')"><i class="fa fa-pencil"></i></a>
                <a class="red-text" href="{{ url('user/delete/'.$user->id) }}" title="@lang('Delete')"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="file_box file_box_l d-flex align-items-center">
        <a href="#" class="">Fizika.doc</a>
        <div class="file_box_sty ml-auto">19.07.2017.</div>
        <div class="file_box_sty">Preuzmi</div>
        <div class="file_box_sty"><i class="fa fa-times"></i>Obriši</div>
        
        
    </div>
    
    <h1>Testing</h1>
    <h2>Testing</h2>
    <h3>Testing</h3>
    <h4>Testing</h4>
    <h5>Testing</h5>
    <h6>Testing</h6>
    <div class="font_sty_3">Testing</div>
    
@endsection
