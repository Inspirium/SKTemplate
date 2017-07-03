@extends('sktemplate::layout')

@section('content')

<!-- Display fileds -->
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-center mt-1 mb-2 flex-column flex-md-row d-flex p-2">
                <button type="submit" class="btn btn-lg btn-blank btn-plus-icon">@lang('Create new')</button>
            </div>
            <div class="page-name-xl mb-2 mt-2">Propositions On Approval
                <span class="tag tag-neutral text-white">{{ $approval->count() }}</span>
            </div>


            <!-- Table -->
            <table class="table table-hover">
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
                @foreach($approval as $prop)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="table-title">{{ $prop->title }}</td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td>{{ $prop->created_at }}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3">Unfinished Propositions
                <span class="tag tag-neutral text-white">{{ $unfinished->count() }}</span>
            </div>
            <table class="table table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($unfinished as $prop)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="table-title"><a href="{{ url('proposition/'.$prop->id.'/basic_data') }}">{{ $prop->title }}</a></td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td>{{ $prop->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3">Active Propositions
                <span class="tag tag-neutral text-white">{{ $active->count() }}</span>
            </div>
            <table class="table table-hover">
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
                @foreach($active as $prop)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="table-title">{{ $prop->title }}</td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td>{{ $prop->created_at }}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3"> Rejected Propositions
                <span class="tag tag-neutral text-white">{{ $rejected->count() }}</span>
            </div>
            <table class="table table-hover">
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
                @foreach($rejected as $prop)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="table-title">{{ $prop->title }}</td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td>{{ $prop->created_at }}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-3">Proposition Archive
                <span class="tag tag-neutral text-white">154</span>
            </div>
            <table class="table table-hover">
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
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td> 12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>

        </div>
    </div>




@endsection
