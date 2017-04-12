@extends('sktemplate::layout')

@section('content')
    <div class="container-fluid">
        <div class="row header">
            <nav class="col navbar main-nav d-flex flex-row-reverse navbar-toggleable-md scrolling-navbar double-nav">
                <a class="nav-link dropdown-toggle user-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
                    <img src="https://www.gravatar.com/avatar/{{ md5( Auth::user()->email ) }}?s=50" class="header-profile">
                </a>
                <a href="#" class="nav-item nav-link-icon d-flex">
                    <i class="fa fa-bell"></i>
                    <span class="tag tag-danger">4</span>
                </a>
                <a href="#" class="nav-item nav-link-icon d-flex">
                    <i class="fa fa-search"></i>
                </a>
                <!-- Breadcrumb -->
                <ol class="breadcrumb d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
                <!--/. Breadcrumb -->
                <div class="float-right hamburger-icon">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                </div>
            </nav>
        </div>

        <div class="row tabs-wrapper">
            <ul class="col nav classic-tabs tabs-cyan" role="tablist">
                <li class="nav-item">
                    <a class="nav-link waves-light active" data-toggle="tab" href="#panel51" role="tab">Testing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" data-toggle="tab" href="#panel52" role="tab">Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" data-toggle="tab" href="#panel53" role="tab">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" data-toggle="tab" href="#panel54" role="tab">Be awesome</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" data-toggle="tab" href="#panel54" role="tab">Be awesome</a>
                </li>
            </ul>
        </div>
        <div class="content">

        </div>
    </div>
@endsection
