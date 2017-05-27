@extends('sktemplate::layout')

@section('content')
    <proposition-edit :proposition="{{ $proposition }}"></proposition-edit>
@endsection
