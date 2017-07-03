@extends('sktemplate::layout')

@section('content')

</div>
<div class="profile-head py-5 d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-3 text-white">{{ $author->name }}</h1>
</div>
<div class="content">
    <div class="row">
        <div class="col col-md-4">
            <img src="{{ $author->image }}" class="profile-xl mt-2 mx-auto">
        </div>
        <div class="col-md-8 showdata-box">

        </div>
    </div>



    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 d-flex p-2">
            <a href="{{ url('books/author/edit/'.$author->id) }}" class="btn btn-lg btn-neutral">@lang('Edit Author')</a>
    </div>
    <!--/. Footer buttons -->
</div>
@endsection