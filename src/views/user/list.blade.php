@extends('sktemplate::layout')

@section('content')
    <div class="page-name-xl">Korisnici sustava</div>
    <!-- Search -->
    <div class="md-form input-group search-big">
        <input type="search" class="form-control" placeholder="Traži...">
        <span class="input-group-btn">
                <a class="btn btn-neutral btn-lg search-big-button" type="button"><i class="fa fa-search fa-4x left"></i></a>
            </span>
    </div>
    <!--/. Search -->
    <div class="btn-header d-flex p-2">
        <a href="{{ url('user/edit') }}" class="btn btn-lg btn-unique"><i class="fa fa-plus left"></i>Dodaj novog korisnika</a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Ime</th>
            <th>Email</th>
            <th>Akcije</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="teal-text" href="{{ url('user/edit/'.$user->id) }}"><i class="fa fa-pencil"></i></a>
                <a class="red-text" href="{{ url('user/delete/'.$user->id) }}"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
