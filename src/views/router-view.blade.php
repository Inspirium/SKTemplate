@extends('sktemplate::layout')

@section('content')
    <router-view
            class="view"
            transition
            transition-mode="out-in">
    </router-view>
@endsection