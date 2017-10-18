@extends('sktemplate::layout')

@section('content')
    <div class="content">
        <div class="quick-box">
            <div class="quick-links">
                <div class="quick-links-title mt-3">Brzi linkovi</div>
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

   
   <div class="chart mt-4">
       <div class="header">
           <div class="header__title--style">Naziv grafa</div>
           <div class="header__desc--style">ovo je opis grafa ako je potreban. Ako nije, nećemo ga pikazati</div>
       </div>
       <div class="filter">
           <div class="filter-chip--style">Tjedan</div>
           <div class="filter-chip--style">Mjesec</div>
           <div class="filter-chip--style active">Godina</div>
       </div>
       <div class="content mt-3">
           <div class="ct-chart ct-double-octave"></div>
       </div>
   </div>
   
    
       
        <div class="row">
            <div class="col-md-12">
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
        </div>
    </div>
    
<script>
    var data = {
      labels: ['Propozicija', 'Pro. na odobrenju', 'Priprema teksta', 'Dizajn', 'Prijelom', 'Def. cijene', 'Priprema', 'Tisak'],
      series: [
        [23, 7, 16, 3, 11, 6, 5, 4]
      ]
    };

    var options = {
      high: 50,
      low: 0,

    };

    new Chartist.Bar('.ct-chart', data, options);
</script>



@endsection
