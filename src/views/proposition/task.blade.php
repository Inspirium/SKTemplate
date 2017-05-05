@extends('sktemplate::layout')

@section('content')
      
    <!-- Table -->  
    <div class="page-name-xl mb-1 mt-2">@lang('New Task')
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
            <th>@lang('Task Sent')</th>
            <th>@lang('Deadline')</th>
            <th class="text-right">@lang('Assign to')</th>
        </tr>
        </thead>
        <tbody class="white">
        <tr>
            <td><div class="icon icon_handler"></div></td>
            <th class="display-e w-30" scope="row">1</th>
            <td class="file_box_sty">Fizika oko nas</td>
            <td><div class="tasktype-1">Projekt</div></td>
            <td><a href=""><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>@lang('Yesterday')</td>
            <td>25.09.</td>
            <td class="text-right"><div class="file_box_sty icon icon_assign">@lang('Assign')</div></td>
        </tr>        
        <tr>    
            <td><div class="icon icon_handler"></div></td>
            <th class="display-e w-30" scope="row">2</th>
            <td class="file_box_sty">Fizika oko nas</td>
            <td><div class="tasktype-2">Zadatak</div></td>
            <td><a href=""><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>@lang('Yesterday')</td>
            <td>25.09.</td>
            <td class="text-right"><div class="file_box_sty icon icon_assign">@lang('Assign')</div></td>
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
            <th>@lang('Task Sent')</th>
            <th>@lang('Deadline')</th>
            <th class="">@lang('Assign to')</th>
        </tr>
        </thead>
        <tbody class="white">
        <tr>
            <td><div class="icon icon_handler"></div></td>
            <th class="display-e w-30" scope="row">1</th>
            <td class="file_box_sty">Fizika oko nas</td>
            <td><div class="tasktype-1">Projekt</div></td>
            <td><a href="#"><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>@lang('Yesterday')</td>
            <td>25.09.</td>
            <td class=""><a href="#"><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>        
        <tr>
            <td><div class="icon icon_handler"></div></td>
            <th class="display-e w-30" scope="row">2</th>
            <td class="file_box_sty">Fizika oko nas</td>
            <td><div class="tasktype-2">Zadatak</div></td>
            <td><a href=""><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>@lang('Yesterday')</td>
            <td>25.09.</td>
            <td class=""><a href="#"><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        <tr>
            <td><div class="icon icon_handler"></div></td>
            <th class="display-e w-30" scope="row">3</th>
            <td class="file_box_sty">Fizika oko nas</td>
            <td><div class="tasktype-1">Projekt</div></td>
            <td><a href="#"><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>@lang('Yesterday')</td>
            <td>25.09.</td>
            <td class=""><a href="#"><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>        
        <tr>
            <td><div class="icon icon_handler"></div></td>
            <th class="display-e w-30" scope="row">4</th>
            <td class="file_box_sty">Fizika oko nas</td>
            <td><div class="tasktype-2">Zadatak</div></td>
            <td><a href=""><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
            <td>@lang('Yesterday')</td>
            <td>25.09.</td>
            <td class=""><a href="#"><img class="profile_m mr-2" src="../images/profile.jpg" href="#">Marko Marić</a></td>
        </tr>
        </tbody>
    </table> 
    <button class="btn btn-neutral d-block mx-auto btn-addon" type="button">@lang('Show all')</button>
 

@endsection
