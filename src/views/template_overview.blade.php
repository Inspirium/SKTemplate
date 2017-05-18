@extends('sktemplate::layout')

@section('content')
    
</div>
<div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
    <h1 class="display-3 text-white text-center">Ime task</h1>
</div>

<!-- Display fileds -->
<div class="content">
    <div class="profile-head pb-2 row">
       <div class="col-md-3">
            <a href="#">
                <img class="profile-m-2 mr-1 float-left" src="../images/profile.jpg" href="#">
                <h6 class="white-label">@lang('Assigner')</h6>
                <h3 class="mb-1 text-white">Jelena Lončarić</h3>
            </a>
        </div>
       <div class="col-md-3">
            <a href="#">
                <img class="profile-m-2 mr-1 float-left" src="../images/profile.jpg" href="#">
                <h6 class="white-label">@lang('Assign to')</h6>
                <h3 class="mb-1 text-white">Unknown</h3>
            </a>
        </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Task Sent')</h6>
            <h3 class="mb-1 text-white">22.09.</h3>
       </div>
       <div class="col-md-3">
            <h6 class="white-label">@lang('Deadline / Priority')<span class="badge badge-danger display-d mt-1 float-right">@lang('High')</span></h6>
            <h3 class="mb-1 text-white">25.9.</h3>
       </div>
    </div>    
    
    
    

    <!-- File/document table -->
    <div class="files mt-2 mb-2">
        <div class="file-box file-box-l d-flex align-items-center">
            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
                    </a></div>
            <div class="file-box-sty">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Jelena Lončarić
                </a></div>
            <div class="file-box-sty">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
    </div>

    
    <!-- File/document table -->
    <div class="page-name-xl mb-1">@lang('Documents')</div>     
    <div class="files mt-2">
        <div class="file-box file-box-l d-flex align-items-center">
            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Stjepan Drmić</a>
            </div>
            <div class="file-box-sty">24.07.2017.</div>
            <div class="file-box-sty icon icon-approval-pending">@lang('Approval Pending...')</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Stjepan Drmić</a>
            </div>
            <div class="file-box-sty">24.07.2017.</div>
            <div class="file-box-sty icon icon-approval-comments">@lang('Comments')</div>
            <div class="file-box-sty icon icon-approval-no">@lang('Approval Denied')</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto d-flex">
                <a href=""><img class="profile-m-1 mr-1 align-self-center" src="../images/profile.jpg" href="#">Stjepan Drmić</a>
            </div>
            <div class="file-box-sty">24.07.2017.</div>
            <div class="file-box-sty icon icon-approval-yes">@lang('Approved')</div>
        </div>
    </div>   
  
   
    <!-- Circulation Number -->
    <div class="col-md-12">
        <h6 class="text-center no-border display-e">@lang('Circulation')</h6>
        <h1 class="text-center display-2">10.000</h1>
    </div>

    <!-- Textarea -->
    <div class="md-form mt-3">
        <textarea id="form76" class="md-textarea"></textarea>
        <label for="form76">@lang('Note')</label>
    </div>

    <!-- Styles -->
    <h1 class="mt-3">H1 Testing</h1>
    <h2>H2 Testing</h2>
    <h3>H3 Testing</h3>
    <h4>H4 Testing</h4>
    <h5>H5 Testing</h5>
    <h6>H6 Testing</h6>
    <div class="file-box-sty">file_box_sty</div>
    <div class="total-sty">total_sty</div>



    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Submit')</button>
        <button type="submit" class="btn btn-lg btn-cancel">@lang('Delete')</button>
        <button type="submit" class="btn btn-lg btn-neutral">@lang('Nesto')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>
    <!--/. Footer buttons -->

    <!-- Documents upload -->
    <div class="page-name-m mt-2">@lang('Documents')</div>
    <button class="btn btn-neutral btn-addon" type="button">@lang('Add Documents')</button>


    <!-- Notification -->
    <div class="notification-bar btn-attention d-flex flex-md-row flex-column justify-content-start align-items-center mt-2">
        <div class="file-box-sty text-white btn-clock-icon">@lang('Task Sent')</div>
        <div class="file-box-sty text-white">@lang('Publisher Director')</div>
        <div class="file-box-sty text-white">@lang('25.11.2017.')</div>
        <div class="file-box-sty text-white">@lang('Waiting time'): 2 days 15 hours</div>
    </div>


    <!-- File/document table -->
    <div class="files">
        <div class="file-box file-box-l d-flex align-items-center">
            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
        <div class="file-box file-box-l d-flex align-items-center">
            <a href="http://homestead.app/images/profile.pdf" class="file-icon">Fizika i društvo.doc</a>
            <div class="file-box-sty ml-auto">19.07.2017.</div>
            <div class="file-box-sty icon icon-download">Preuzmi</div>
            <div class="file-box-sty icon icon-cancel">Obriši</div>
        </div>
    </div>

    <!-- Display fields -->
    <div class="row">
        <div class="col-md-4">
            <img src="http://homestead.app/images/profile.jpg" class="profile-xl mt-2">
        </div>
        <div class="col-md-8 showdata-box">
            <div class="page-name-l mb-2">@lang('Basic Info')</div>
            <div>
                <h6 class="no-border">@lang('Email')</h6>
                <h3 class="mb-1">stjepan@drmic.com</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('Mobile Phone')</h6>
                    <h3 class="mb-1">345345345</h3>
                </div>
                <div class="col-md-6">
                    <h6>@lang('VPN Mobile Phone')</h6>
                    <h3 class="mb-1">250</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('Phone')</h6>
                    <h3 class="mb-1">456456456</h3>
                </div>
                <div class="col-md-6">
                    <h6>@lang('VPN phone')</h6>
                    <h3 class="mb-1">432</h3>
                </div>
            </div>
        </div>
    </div>
    <!--/. Display fields -->


    <!-- Table -->
    <table class="table table-striped table-hover">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Org. jedinica</th>
            <th>Mobitel</th>
            <th>Mob. VPN</th>
            <th>Telefon</th>
            <th>Tel. VPN</th>
            <th>Grad</th>
            <th>Lokacija</th>
            <th>Uredi</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Snežana</td>
            <td>Dobra</td>
            <td>Tajništvo uprave i nadzornog odbora</td>
            <td>098370271</td>
            <td>515</td>
            <td>01/4830491</td>
            <td>4491</td>
            <td>Zagreb</td>
            <td>Soba 315</td>
            <td>
                <a class="color-grey"><i class="fa fa-pencil"></i></a>
                <a class="color-grey"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Snežana</td>
            <td>Dobra</td>
            <td>Tajništvo uprave i nadzornog odbora</td>
            <td>098370271</td>
            <td>515</td>
            <td>01/4830491</td>
            <td>4491</td>
            <td>Zagreb</td>
            <td>Soba 315</td>
            <td>
                <a class="color-grey"><i class="fa fa-pencil"></i></a>
                <a class="color-grey"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Snežana</td>
            <td>Dobra</td>
            <td>Tajništvo uprave i nadzornog odbora</td>
            <td>098370271</td>
            <td>515</td>
            <td>01/4830491</td>
            <td>4491</td>
            <td>Zagreb</td>
            <td>Soba 315</td>
            <td>
                <a class="color-grey"><i class="fa fa-pencil"></i></a>
                <a class="color-grey"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
    <!--/. Table -->

    <!-- Table -->
            <div class="page-name-xl mb-2 mt-3">Proposition Archive
                <span class="tag tag-neutral text-white">154</span>
            </div>
            <table class="table table-striped table-hover">
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
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><a href=""><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</a></td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td> 12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Fizika oko nas — udžbenik za fiziku </td>
                    <td><img class="profile-m mr-2" src="../images/profile.jpg" href="#">Jelena Lončarić</td>
                    <td>9444,96</td>
                    <td>12.12.2017.</td>
                </tr>
                </tbody>
            </table>



    <!-- Input fields -->
    <div class="page-name-xl mb-3">@lang('Name And Surname')</div>
    <div class="row">
        <div class="col-md-6">
            <div class="page-name-l mb-2">@lang('First and Last Name')</div>

            <!-- Input field -->
            <div class="md-form">
                <input type="text" id="form1" class="form-control" name="first_name" placeholder="neko ime" required>
                <label for="form1" class="">@lang('First Name')</label>
            </div>
            <!--/. Input field -->

            <!--/. Checkbox -->
            <div class="page-name-m">Spol</div>
            <div class="form-inline mb-3">
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio11" value="M" required>
                    <label for="radio11">@lang('M')</label>
                </fieldset>
                <fieldset class="form-group">
                    <input name="sex" type="radio" id="radio21" value="F" required>
                    <label for="radio21">@lang('F')</label>
                </fieldset>
            </div>
            <!--/. Checkbox -->

            <!-- Input fileds Expenses Calculation -->
            <div class="row">
                <div class="col-md-5">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('Currency')" required>
                        <label for="form1" class="">@lang('Translation')</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="@lang('')" required>
                        <label for="form1" class="">@lang('Amount')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <label for="form1" class="">@lang('Total')</label>
                        <div class="total-sty color-nav-sub">@lang('12.568 kn')</div>
                    </div>
                </div>
            </div>


           <!-- Dropdown menu -->
            <div class="pos-rel">
                <select class="mdb-select" name="department_id" required>
                    <option disabled >@lang('Choose Department')</option>
                </select>
                <label>@lang('Department')</label>
            </div>
            <!--/. Dropdown menu -->

            <div class="row">
                <div class="col-md-3">
                <select class="mdb-select" name="phone_pre">
                    <option disabled>@lang('Choose')</option>
                </select>
                </div>
                <div class="col-md-6">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile" placeholder="test">
                        <label for="form4" class="">@lang('Mobile Phone')</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" md-form">
                        <input type="tel" id="form4" class="form-control" name="mobile_vpn" placeholder="test">
                        <label for="form4" class="">@lang('VPN Mobile')</label>
                    </div>
                </div>
            </div>

            <!-- Textarea -->
            <div class="md-form">
                <textarea id="form76" class="md-textarea"></textarea>
                <label for="form76">Basic textarea</label>
            </div>
        </div>
    </div>
    <!--/. Input fields -->
    
    

    
    <!-- Modal -->
    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title w-100 text-center" id="myModalLabel">Modal title</h1>
                </div>
                <!--Body-->
                <div class="modal-body">
                    ...
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal -->
             
    

    <!-- Central Modal Medium Warning -->
    <div class="modal fade" id="centralModalWarning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header flex-column px-3 pt-3">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                    <div class="d-flex">
                        <i class="fa fa-check fa-4x mb-1 animated rotateIn"></i>
                        <h1 class="modal-title w-100 text-center">Upload Files</h1>
                    </div>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-1 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione fuga, enim,
                            ab officiis totam.</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer btn-footer">
                    <button type="button" class="btn btn-lg btn-cancel" data-dismiss="modal">@lang('Close')</button>
                    <button type="button" class="btn btn-lg btn-save" v-on:click="fileUpload">@lang('Upload')</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Warning-->

                                                        
                   
                      
                         
                            
                               
                                  
                                     
                                        
                                           
                                              
                                                    
    <!-- Button trigger modal -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#centralModalSuccess">Launch demo modal</button>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#centralModalWarning">Launch warning modal</button>
    </div>

                
                                            
    
    
    
    



@endsection


