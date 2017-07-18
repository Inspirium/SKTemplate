@extends('sktemplate::layout')

@section('content')
    <router-view
            class="router-view"
            transition
            transition-mode="out-in">
    </router-view>
@endsection