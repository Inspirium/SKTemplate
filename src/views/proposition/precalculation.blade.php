@extends('sktemplate::layout')

@section('content')

        <div class="page-name-xl mb-1">@lang('Precalculation')</div>
        <div class="page-name-l mb-1 mt-2">@lang('Option 1')</div>
        <a href="#" class="hoverable d-block">
            <div class="row text-white btn-sub2 d-flex py-2">
                <div class="col-md-3">
                    <h6 class="no-border display-b text-white">@lang('Circulation')</h6>
                    <h1 class="mb-1 text-white weight-700">4500 komada</h1>
                </div>
                <div class="col-md-3">
                    <h6 class="no-border display-b text-white">@lang('Total Cost')</h6>
                    <h1 class="mb-1 text-white">215.000 kn</h1>
                </div>
                <div class="col-md-2">
                    <div class=" page-name-l-white border-white">@lang('Direct Cost Cover')</div>
                    <div>
                        <h6 class="no-border text-white">@lang('Number of Sold Copies')</h6>
                        <h3 class="">451</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" page-name-l-white">@lang('Complete Cost Cover')</div>
                    <div>
                        <h6 class="no-border text-white">@lang('Number of Sold Copies')</h6>
                        <h3 class="">865</h3>
                    </div>
                </div>
                <div class="col-md-1">
                    <i class="fa fa-angle-right display-3 text-right float-right" aria-hidden="true"></i>
                </div>
            </div>
        </a>
        <div class="page-name-l mb-1 mt-2">@lang('Option 2')</div>
        <a href="#" class="hoverable d-block">
            <div class="row text-white btn-sub2 d-flex py-2">
                <div class="col-md-3">
                    <h6 class="no-border display-b text-white">@lang('Circulation')</h6>
                    <h1 class="mb-1 text-white weight-700">5500 komada</h1>
                </div>
                <div class="col-md-3">
                    <h6 class="no-border display-b text-white">@lang('Total Cost')</h6>
                    <h1 class="mb-1 text-white">275.000 kn</h1>
                </div>
                <div class="col-md-2">
                    <div class=" page-name-l-white border-white">@lang('Direct Cost Cover')</div>
                    <div>
                        <h6 class="no-border text-white">@lang('Number of Sold Copies')</h6>
                        <h3 class="">451</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" page-name-l-white">@lang('Complete Cost Cover')</div>
                    <div>
                        <h6 class="no-border text-white">@lang('Number of Sold Copies')</h6>
                        <h3 class="">865</h3>
                    </div>
                </div>
                <div class="col-md-1">
                    <i class="fa fa-angle-right display-3 text-right float-right" aria-hidden="true"></i>
                </div>
            </div>
        </a>


@endsection
