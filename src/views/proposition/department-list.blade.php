@extends('sktemplate::layout')

@section('content')

<!-- Display fileds -->
    <div class="row">
        <div class="col-md-12">

            <!-- Circulation Number -->
            <div class="col-md-12">
                <h6 class="text-center no-border display-c">@lang('Total Projects')</h6>
                <h1 class="text-center display-2">17</h1>
            </div>
           
            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3 mt-2"> Projects in Department
            </div>
            <table class="table table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                    <th>@lang('Deadline')</th>
                    <th>@lang('Total Time')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>22.9.2017.</td>
                    <td>5.11.2017.</td>
                    <td>1 day</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>22.9.2017.</td>
                    <td>5.11.2017.</td>
                    <td>3 days</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>22.9.2017.</td>
                    <td>5.11.2017.</td>
                    <td>4 days</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>22.9.2017.</td>
                    <td class="color-cancel weight-700 animated flash infinite">5.11.2017.</td>
                    <td>22 days</td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>

        </div>
    </div>




@endsection
