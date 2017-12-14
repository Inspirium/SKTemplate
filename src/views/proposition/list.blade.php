@extends('sktemplate::layout')

@section('content')
    <div class="content">
<!-- Display fileds -->
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-center mt-4 flex-column flex-md-row d-flex p-2">
                <a href="/proposition/start" class="btn btn-lg btn-blank btn-plus-icon">@lang('Create new')</a>
            </div>
            <div class="page-name-xl mb-2 mt-4 mt-2">@lang('Propositions On Approval')
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
                    <td data-title="@lang('Title')" class="table-title"><a href="{{ url('proposition/'.$prop->id.'/edit/start') }}">{{ $prop->project_name?$prop->project_name:'untitled' }}</a></td>
                    <td data-title="@lang('Author')"><a href="{{ url('human_resources/employee/'.$prop->owner->id . '/show') }}" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td data-title="@lang('Waiting Approval')" data-title="Crea" >{{ $prop->created_at }}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <!-- Table -->
            <div class="page-name-xl mb-2 mt-5">@lang('Unfinished Propositions')
                <span class="tag tag-neutral text-white">{{ $unfinished->count() }}</span>
            </div>
            <table class="table table-hover">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th class="text-center">@lang('New Order')</th>
                    <th>@lang('Title')</th>
                    <th>@lang('Author')</th>
                    <th>@lang('Creation Date')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($unfinished as $prop)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th class="new-order new-order--down" scope="row">+1</th>
                    <td data-title="@lang('Title')" class="table-title"><a href="{{ url('proposition/'.$prop->id.'/edit/start') }}">{{ $prop->project_name?$prop->project_name:'untitled' }}</a></td>
                    <td data-title="@lang('Author')"><a href="{{ url('human_resources/employee/'.$prop->owner->id . '/show') }}" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td data-title="@lang('Waiting Approval')">{{ $prop->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-5">@lang('Active Propositions')
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
                    <td  data-title="@lang('Title')" class="table-title"><a href="{{ url('proposition/'.$prop->id.'/edit/start') }}">{{ $prop->project_name?$prop->project_name:'untitled' }}</a></td>
                    <td data-title="@lang('Author')"><a href="{{ url('human_resources/employee/'.$prop->owner->id . '/show') }}" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td data-title="@lang('Waiting Approval')">{{ $prop->created_at }}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-5">@lang('Rejected Propositions')
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
                    <td  data-title="@lang('Title')" class="table-title"><a href="{{ url('proposition/'.$prop->id.'/edit/start') }}">{{ $prop->project_name?$prop->project_name:'untitled' }}</a></td>
                    <td data-title="@lang('Author')"><a href="{{ url('human_resources/employee/'.$prop->owner->id . '/show') }}" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                    <td data-title="@lang('Waiting Approval')">{{ $prop->created_at }}</td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>

            <!-- Table -->
            <div class="page-name-xl mb-2 mt-5">@lang('Deleted Propositions')
                <span class="tag tag-neutral text-white">{{ $deleted->count() }}</span>
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
                @foreach($deleted as $prop)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td data-title="@lang('Title')" class="table-title"><a href="{{ url('proposition/'.$prop->id.'/edit/start') }}">{{ $prop->project_name?$prop->project_name:'untitled' }}</a></td>
                        <td data-title="@lang('Author')"><a href="{{ url('human_resources/employee/'.$prop->owner->id . '/show') }}" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="{{ $prop->owner->image }}">{{ $prop->owner->name }}</a></td>
                        <td data-title="@lang('Waiting Approval')">{{ $prop->created_at }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>


            <!-- Table -->
            <div class="page-name-xl mb-2 mt-5">@lang('Proposition Archive')
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
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td> 12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class="table-title">Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-neutral btn-addon d-block ml-auto" type="button">@lang('Show More')</button>

        </div>
    </div>


    </div>

@endsection
