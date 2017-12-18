@extends('sktemplate::layout')

@section('content')
    <div class="content">
        <div class="quick-box">
            <div class="quick-links">
                <div class="quick-links-title mt-3">Brzi linkovi</div>
                <div class="quick-links-box">
                    <a href="#" onclick="toastr.info('Hi! I am info message.');">
                        <div class="quick-links-item">
                            <i class="fa fa-users fa-3x quick-item-icon" aria-hidden="true"></i>
                        </div>
                        <div class="quick-item-title">Imenik</div>
                    </a>
                    <a href="#">
                        <div class="quick-links-item">
                            <i class="fa fa-book fa-3x quick-item-icon" aria-hidden="true"></i>
                        </div>
                        <div class="quick-item-title">Izdanja</div>
                    </a>
                    <a href="#">
                        <div class="quick-links-item">
                            <i class="fa fa-thumb-tack fa-3x quick-item-icon" aria-hidden="true"></i>
                        </div>
                        <div class="quick-item-title">Moji zadaci</div>
                    </a>
                    <a href="#">
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
           <div class="header__title--style">Naziv grafa</div>
           <div class="header__desc--style">ovo je opis grafa ako je potreban. Ako nije, nećemo ga pikazati</div>
       </div>
       <div class="filter">
           <div class="filter-chip--style">Tjedan</div>
           <div class="filter-chip--style">Mjesec</div>
           <div class="filter-chip--style active">Godina</div>
       </div>
       <div class="content mt-3">
           <div class="ct-chart ct-double-octave" id="chart1"></div>
       </div>
   </div>
      
   <div class="chart mt-4">
       <div class="header">
           <div class="header__title--style">Naziv grafa</div>
           <div class="header__desc--style">ovo je opis grafa ako je potreban. Ako nije, nećemo ga prikazati</div>
       </div>
       <div class="filter">
           <div class="filter-chip--style">Tjedan</div>
           <div class="filter-chip--style">Mjesec</div>
           <div class="filter-chip--style active">Godina</div>
       </div>
       <div class="content mt-3">
           <div class="ct-chart ct-double-octave" id="chart2"></div>
       </div>
   </div>   
   
    <div class="row">     
        <div class="col-md-6">         
           <div class="chart mt-4">
               <div class="header">
                   <div class="header__title--style">Naziv grafa</div>
                   <div class="header__desc--style">ovo je opis grafa ako je potreban. Ako nije, nećemo ga prikazati</div>
               </div>
               <div class="filter">
                   <div class="filter-chip--style">Tjedan</div>
                   <div class="filter-chip--style">Mjesec</div>
                   <div class="filter-chip--style active">Godina</div>
               </div>
               <div class="content mt-3">
                   <div class="ct-chart ct-double-octave" id="chart3"></div>
               </div>
           </div> 
        </div>
        <div class="col-md-6">                 
           <div class="chart mt-4">
               <div class="header">
                   <div class="header__title--style">Naziv grafa</div>
                   <div class="header__desc--style">ovo je opis grafa ako je potreban. Ako nije, nećemo ga prikazati</div>
               </div>
               <div class="filter">
                   <div class="filter-chip--style">Tjedan</div>
                   <div class="filter-chip--style">Mjesec</div>
                   <div class="filter-chip--style active">Godina</div>
               </div>
               <div class="content mt-3">
                   <div class="ct-chart ct-double-octave" id="chart4"></div>
               </div>
           </div>  
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
    new Chartist.Bar('#chart1', {
        labels: ['Propozicija', 'Pro. na odobrenju', 'Priprema teksta', 'Dizajn', 'Prijelom', 'Def. cijene', 'Priprema', 'Tisak'],
        series: [[23, 7, 16, 3, 11, 6, 5, 4]]
    });

    new Chartist.Line('#chart2', {
        labels: ['Propozicija', 'Pro. na odobrenju', 'Priprema teksta', 'Dizajn', 'Prijelom', 'Def. cijene', 'Priprema', 'Tisak'],
        series: [[11, 2, 11, 5, 23, 15, 15, 1]]
    });
    
    var data = {
      labels: ['Bananas', 'Apples', 'Grapes'],
      series: [20, 15, 40]
    };
    var options = {
      labelInterpolationFnc: function(value) {
        return value[0]
      }
    };
    var responsiveOptions = [
      ['screen and (min-width: 640px)', {
        chartPadding: 30,
        labelOffset: 20,
        labelDirection: 'explode',
        labelInterpolationFnc: function(value) {
          return value;
        }
      }],
      ['screen and (min-width: 1024px)', {
        labelOffset: 40,
        chartPadding: 20
      }]
    ];
    new Chartist.Pie('#chart3', data, options, responsiveOptions);  
    
    
    new Chartist.Pie('#chart4', {
        series: [20, 10, 30, 40]
    }, {
      donut: true,
      donutWidth: 60,
      donutSolid: true,
      startAngle: 270,
      showLabel: true
    });
</script>



@endsection
