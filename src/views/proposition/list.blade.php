@extends('sktemplate::layout')

@section('content')

<!-- Display fileds -->
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-center mt-1 mb-2 flex-column flex-md-row d-flex p-2">
                <button type="submit" class="btn btn-lg btn-blank btn-plus-icon">@lang('Create new')</button>
            </div>
            <div class="page-name-xl mb-2 mt-2">Propositions On Approval
                <span class="tag tag-neutral text-white">4</span>
            </div>


            <!-- Table -->
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                    <th>@lang('Waiting Approval')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>9,44 kn</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>9,44 kn</td>
                </tr>
                </tbody>
            </table>


            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3">Unfinished Propositions
                <span class="tag tag-neutral text-white">4</span>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                </tr>
                </tbody>
            </table>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3">Active Propositions
                <span class="tag tag-neutral text-white">12</span>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                    <th>@lang('Current Status')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>Layout</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>MPC definition</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>Prepress</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>Prepress</td>
                </tr>
                </tbody>
            </table>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3"> Rejected Propositions
                <span class="tag tag-neutral text-white">42</span>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                    <th>@lang('Rejected')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td> 12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3">Proposition Archive
                <span class="tag tag-neutral text-white">154</span>
            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                    <th>@lang('Completion Date')</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td> 12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>

        </div>
    </div>




@endsection
