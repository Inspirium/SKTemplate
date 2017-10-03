@extends('sktemplate::layout')

@section('content')
    <div class="content">
        <div class="quick-box">
            <div class="quick-links">
                <div class="quick-links-title">Brzi linkovi</div>
                <div class="quick-links-box">
                    <a href="#" onclick="toastr.info('Hi! I am info message.');">
                        <div class="quick-links-item">
                            <img src="images/izdanja.svg" href="#" class="quick-item-icon">
                        </div>
                        <div class="quick-item-title">Popis izdanja</div>
                    </a>
                    <a href="#">
                        <div class="quick-links-item">
                            <img src="images/imenik.svg" class="quick-item-icon">
                        </div>
                        <div class="quick-item-title">Popis izdanja</div>
                    </a>
                    <a href="#">
                        <div class="quick-links-item">
                            <img src="images/propozicije.svg" class="quick-item-icon">
                        </div>
                        <div class="quick-item-title">Popis izdanja</div>
                    </a>
                    <a href="#">
                        <div class="quick-links-item">
                            <img src="images/izdanja.svg" class="quick-item-icon">
                        </div>
                        <div class="quick-item-title">Popis izdanja</div>
                    </a>
                    <a href="#">
                        <div class="quick-links-item">
                            <img src="images/imenik.svg" class="quick-item-icon">
                        </div>
                        <div class="quick-item-title">Popis izdanja</div>
                    </a>
                    <a href="#">
                        <div class="quick-links-item">
                            <img src="images/propozicije.svg" class="quick-item-icon">
                        </div>
                        <div class="quick-item-title">Popis izdanja</div>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="page-name-xl mb-1 mt-3">@lang('New Editions')</div>
        <div class="card-box">
            <div class="row">
                <!--/.Card--> 
                <div class="col-md-3 align-self-end">
                    <!--Card-->
                    <a class="card mb-4">
                        <!--Card image-->
                        <img class="img-fluid" src="images/061809.jpg" alt="Card image cap">

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Alfabetist</h4>
                            <!--Text-->
                            <div class="card-text"><span class="font-weight-bold">Autor: </span>Torsten Petterson</div>
                            <div class="card-text"><span class="font-weight-bold">Završeno: </span>21. 11. 2017.</div>
                        </div>
                    </a>
                </div>
                <!--/.Card--> 
                <div class="col-md-3 align-self-end">
                    <!--Card-->
                    <a class="card mb-4">
                        <!--Card image-->
                        <img class="img-fluid" src="images/061756.jpg" alt="Card image cap">

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Alfabetist</h4>
                            <!--Text-->
                            <div class="card-text"><span class="font-weight-bold">Autor: </span>Torsten Petterson</div>
                            <div class="card-text"><span class="font-weight-bold">Završeno: </span>21. 11. 2017.</div>
                        </div>
                    </a>
                </div>
                <!--/.Card--> 
                <div class="col-md-3 align-self-end">
                    <!--Card-->
                    <a class="card mb-4">
                        <!--Card image-->
                        <img class="img-fluid" src="images/061735.jpg" alt="Card image cap">

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Alfabetist</h4>
                            <!--Text-->
                            <div class="card-text"><span class="font-weight-bold">Autor: </span>Torsten Petterson</div>
                            <div class="card-text"><span class="font-weight-bold">Završeno: </span>21. 11. 2017.</div>
                        </div>
                    </a>
                </div>
                <!--/.Card--> 
                <div class="col-md-3 align-self-end">
                    <!--Card-->
                    <a class="card mb-4">
                        <!--Card image-->
                        <img class="img-fluid" src="images/061809.jpg" alt="Card image cap">

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Alfabetist</h4>
                            <!--Text-->
                            <div class="card-text"><span class="font-weight-bold">Autor: </span>Torsten Petterson</div>
                            <div class="card-text"><span class="font-weight-bold">Završeno: </span>21. 11. 2017.</div>
                        </div>
                    </a>
                </div>
                <!--/.Card--> 
                <div class="col-md-3 align-self-end">
                    <!--Card-->
                    <a class="card mb-4">
                        <!--Card image-->
                        <img class="img-fluid" src="images/061756.jpg" alt="Card image cap">

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Alfabetist</h4>
                            <!--Text-->
                            <div class="card-text"><span class="font-weight-bold">Autor: </span>Torsten Petterson</div>
                            <div class="card-text"><span class="font-weight-bold">Završeno: </span>21. 11. 2017.</div>
                        </div>
                    </a>
                </div>
                <!--/.Card--> 
                <div class="col-md-3 align-self-end">
                    <!--Card-->
                    <a class="card mb-4">
                        <!--Card image-->
                        <img class="img-fluid" src="images/061735.jpg" alt="Card image cap">

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Alfabetist</h4>
                            <!--Text-->
                            <div class="card-text"><span class="font-weight-bold">Autor: </span>Torsten Petterson</div>
                            <div class="card-text"><span class="font-weight-bold">Završeno: </span>21. 11. 2017.</div>
                        </div>
                    </a>
                </div>
                


            </div>
        </div>
    </div>
@endsection
