@extends('sktemplate::layout')

@section('content')

<div class="profile-head row pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
    <div class="col-md-12">
        <h1 class="display-3 text-white text-center">@lang('Budget vs. Expenses')</h1>
    </div>
</div>

<!-- Display fileds -->
<div class="content">
    <div class="profile-head pb-2 row">
       <div class="col-md-3">
            <h6 class="white-label">@lang('Budget')</h6>
            <h3 class="mb-1 text-white">123.450 kn</h3>
       </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Expenses')</h6>
            <h3 class="mb-1 text-white">155.446 kn</h3>
       </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Difference')</h6>
            <h3 class="mb-1 text-white">22.985 kn</h3>
       </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Difference in precentage')</h6>
            <h3 class="mb-1 text-white">18%</h3>
       </div>
    </div>

    <!-- Table -->
    <div class="page-name-xl mb-1 mt-3">@lang('Expenses')</div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>@lang('Item')</th>
            <th>@lang('Budget')</th>
            <th>@lang('Expense Total')</th>
            <th>@lang('Difference')</th>
            <th>@lang('Cost Approval')</th>
        </tr>
        </thead>
        <tbody class="white">
        <tr>
            <th scope="row">1</th>
            <td>Lektura</td>
            <td>10.000 kn</td>
            <td>15.500 kn</td>
            <td>5.500 kn</td>
            <td><div class="file-box-sty icon icon-cost-approval">@lang('Send for Approval')</div></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Lektura</td>
            <td>10.000 kn</td>
            <td>15.500 kn</td>
            <td>5.500 kn</td>
            <td><div class="file-box-sty icon icon-cost-approval">@lang('Send for Approval')</div></td>
        </tr>


        </tbody>
    </table>

    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->






@endsection
