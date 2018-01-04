@extends('sktemplate::layout')

@section('content')
    <div class="content">
        <div class="quick-box">
            <div class="quick-links">
                <div class="quick-links-title mt-3">Brzi linkovi</div>
                <div class="quick-links-box">
                    <a href="/human_resources/employees">
                        <div class="quick-links-item">
                            <i class="fa fa-users fa-3x quick-item-icon" aria-hidden="true"></i>
                        </div>
                        <div class="quick-item-title">Imenik</div>
                    </a>
                    <a href="/books">
                        <div class="quick-links-item">
                            <i class="fa fa-book fa-3x quick-item-icon" aria-hidden="true"></i>
                        </div>
                        <div class="quick-item-title">Izdanja</div>
                    </a>
                    <a href="/tasks">
                        <div class="quick-links-item">
                            <i class="fa fa-thumb-tack fa-3x quick-item-icon" aria-hidden="true"></i>
                        </div>
                        <div class="quick-item-title">Moji zadaci</div>
                    </a>
                    <a href="/notifications">
                        <div class="quick-links-item">
                            <i class="fa fa-comment fa-3x quick-item-icon" aria-hidden="true"></i>
                        </div>
                        <div class="quick-item-title">Moje obavijesti</div>
                    </a>
                </div>
            </div>
        </div>


   <div class="chart mt-4">
       <div class="header">
           <div class="header__title--style">Pregled projekata</div>
       </div>

       <div class="content mt-3">
           <div class="ct-chart ct-double-octave" id="chart1"></div>
       </div>
   </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-name-xl mb-1 mt-3">@lang('New Editions')</div>
                <div class="card-box">
                    <div class="row">
                        @foreach ($editions as $edition)
                        <!--/.Card-->
                        <div class="col-md-3 align-self-end">
                            <!--Card-->
                            <a class="card mb-4" href="{{ $edition->link }}">
                                <!--Card image-->
                                <img class="img-fluid" src="{{ $edition->cover }}" alt="Card image cap">

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <h4 class="card-title">{{ $edition->title }}</h4>
                                    <!--Text-->
                                    <div class="card-text"><span class="font-weight-bold">Autor: </span>{{ $edition->formattedAuthors }}</div>
                                    <div class="card-text"><span class="font-weight-bold">Završeno: </span>{{ $edition->created_at }}</div>
                                </div>
                            </a>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
