@extends('sktemplate::layout')

@section('content')
    <div class="row">
        <div class="col col-md-6">
            <img src="https://www.gravatar.com/avatar/{{ md5( $user->email ) }}?s=200&d=wavatar" class="img-fluid">
        </div>
        <div class="col col-md-6">
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
        </div>
    </div>
@endsection
