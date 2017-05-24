@extends('sktemplate::layout')

@section('content')

    <div class="justify-content-center mt-1 mb-2 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-blank btn-plus-icon">@lang('Create new')</button>
    </div>
    <div class="page-name-xl mb-1 mt-2">@lang('New Task')
        <span class="tag tag-neutral text-white">154</span>
    </div>
    <!-- Table -->
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th class="w-30"></th>
            <th class="w-30">#</th>
            <th>@lang('Task')</th>
            <th>@lang('Task Type')</th>
            <th>@lang('Assiger')</th>
            <th>@lang('Created')</th>
            <th>@lang('Deadline')</th>
            <th class="text-right">@lang('Assign to')</th>
        </tr>
        </thead>
        <tbody class="white">
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">1</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-1">Projekt</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td class="text-right"><div class="file-box-sty icon icon-assign">@lang('Assign')</div></td>
        </tr>
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">2</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-2">Zadatak</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td class="text-right"><div class="file-box-sty icon icon-assign">@lang('Assign')</div></td>
        </tr>


        </tbody>
    </table>

    <!-- Table -->
    <div class="page-name-xl mb-1 mt-2">@lang('Task')
        <span class="tag tag-neutral text-white">154</span>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th class="w-30"></th>
            <th class="w-30">#</th>
            <th>@lang('Task')</th>
            <th>@lang('Task Type')</th>
            <th>@lang('Assiger')</th>
            <th>@lang('Created')</th>
            <th>@lang('Deadline')</th>
            <th>@lang('TCT')</th>
            <th class="">@lang('Assign to')</th>
        </tr>
        </thead>
        <tbody class="white">
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">1</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-1">Projekt</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td>4 h</td>
            <td class=""><a href="#"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">2</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-2">Zadatak</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td>12 h</td>
            <td class=""><a href="#"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">3</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-1">Projekt</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td>32 h</td>
            <td class=""><a href="#"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">4</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-2">Zadatak</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td>30 min</td>
            <td class=""><a href="#"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        </tbody>
    </table>
    <button class="btn btn-neutral d-block mx-auto btn-addon" type="button">@lang('Show all')</button>

    <!-- Table -->
    <div class="page-name-xl mb-1 mt-2">@lang('Waiting For Approval')
        <span class="tag tag-neutral text-white">9</span>
    </div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th class="w-30"></th>
            <th class="w-30">#</th>
            <th>@lang('Task')</th>
            <th>@lang('Task Type')</th>
            <th>@lang('Assiger')</th>
            <th>@lang('Created')</th>
            <th>@lang('Deadline')</th>
            <th>@lang('Waiting')</th>
            <th class="">@lang('Assign to')</th>
        </tr>
        </thead>
        <tbody class="white">
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">1</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-1">Projekt</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td>2d : 4h</td>
            <td class=""><a href="#"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        <tr>
            <td><div class="icon icon-handler"></div></td>
            <th class="display-e w-30" scope="row">2</th>
            <td class="table-title">Fizika oko nas</td>
            <td><div class="tasktype-2">Zadatak</div></td>
            <td><a href="" class="text-uppercase file-box-sty"><img class="profile-m mr-1" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>21.09.</td>
            <td>25.09.</td>
            <td>2d : 4h</td>
            <td class=""><a href="#"><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        </tbody>
    </table>


@endsection
