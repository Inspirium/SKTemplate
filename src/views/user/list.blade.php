@extends('sktemplate::layout')

@section('content')
    <inspirium-tablesearch
        :data={{$users}}
            :strings={{ $strings  }}
            :links={{$links}}
        :columns={{ $columns }}
    ></inspirium-tablesearch>
@endsection
