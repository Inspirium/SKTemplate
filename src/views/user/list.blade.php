@extends('sktemplate::layout')

@section('content')
    <inspirium-tablesearch
        :data={{$users}}
        :columns={{ json_encode( array('name', 'email') ) }}
    ></inspirium-tablesearch>
@endsection
