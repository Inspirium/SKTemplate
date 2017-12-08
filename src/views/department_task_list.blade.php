@extends('sktemplate::layout')

@section('content')

        <div class="content">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">@lang('Graphic layout department')</h1>
            </div>
        </div>


        <div class="page-name-xl mb-3 mt-2">
           <a href="">
                <img class="profile-m mr-1 my-2" src="../images/profile.jpg" href="#">
                Ime i prezime
                <span class="tag tag-neutral text-white">2</span>
            </a>
        </div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th data-title="Task">Task</th>
                <th data-title="Task Type">Task Type</th>
                <th data-title="Assigner">Assigner</th>
                <th data-title="Created">Created</th>
                <th data-title="Deadline">Deadline</th>
            </tr>
            </thead>
            <draggable>
                <tr>
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30">index+1</th>
                    <td data-title="Task" class="table-title"><a>element.name</a></td>
                    <td data-title="Task Type"><div>task_types[element.type].title</div></td>
                    <td data-title="Assigner"><a class="text-uppercase file-box-sty"><img class="profile-m mr-2">element.assigner.name</a></td>
                    <td data-title="Created">element.created_at | moment('DD.MM.</td>
                    <td data-title="Deadline">element.deadline | moment('DD.MM.</td>
                </tr>
            </draggable>
        </table> 
        <button type="button" class="btn btn-neutral btn-addon d-block ml-auto waves-effect waves-light">@lang('Save tasks priority')</button>  
        
        
        <div class="page-name-xl mb-3 mt-2">
           <a href="">
                <img class="profile-m mr-1 my-2" src="../images/profile.jpg" href="#">
                Ime i prezime
                <span class="tag tag-neutral text-white">2</span>
            </a>
        </div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th class="w-30"></th>
                <th class="w-30">#</th>
                <th data-title="Task">Task</th>
                <th data-title="Task Type">Task Type</th>
                <th data-title="Assigner">Assigner</th>
                <th data-title="Created">Created</th>
                <th data-title="Deadline">Deadline</th>
            </tr>
            </thead>
            <draggable>
                <tr>
                    <td><div class="icon icon-handler"></div></td>
                    <th class="display-e w-30">index+1</th>
                    <td data-title="Task" class="table-title"><a>element.name</a></td>
                    <td data-title="Task Type"><div>task_types[element.type].title</div></td>
                    <td data-title="Assigner"><a class="text-uppercase file-box-sty"><img class="profile-m mr-2">element.assigner.name</a></td>
                    <td data-title="Created">element.created_at | moment('DD.MM.</td>
                    <td data-title="Deadline">element.deadline | moment('DD.MM.</td>
                </tr>
            </draggable>
        </table> 
        <button type="button" class="btn btn-neutral btn-addon d-block ml-auto waves-effect waves-light">@lang('Save tasks priority')</button>  
        

        
    </div>
    


@endsection


