@extends('sktemplate::layout')

@section('content')
    <div class="content">
    <inspirium-tablesearch
        v-bind:data='{{ $elements }}'
        v-bind:columns='{{ json_encode($columns) }}'
        v-bind:strings='{{ json_encode($strings) }}'
        v-bind:links='{{ json_encode($links) }}'
    ></inspirium-tablesearch>
    </div>
@endsection
