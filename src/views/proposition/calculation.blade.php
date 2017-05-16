@extends('sktemplate::layout')

@section('content')
</div>
<div class="profile-head pt-3 pb-2 d-flex flex-column justify-content-center align-items-center">
    <h6 class="text-center no-border display-e text-white">@lang('Total Cost')</h6>
    <h1 class="text-center display-2 mb-2 text-white">215.000 kn</h1>
</div>
    <div class="content profile-head">
    <div class="row text-white d-flex justify-content-center text-center">
        <div class="col-md-4">
            <div class="page-name-l-white text-center border-white">@lang('Direct Cost Cover')</div>
            <div>
                <h6 class="no-border text-white">@lang('Number of Sold Copies')</h6>
                <h3 class="mb-2">451</h3>
            </div>
        </div>
           <div class="col-md-4">
            <div class="page-name-l-white text-center">@lang('Complete Cost Cover')</div>
            <div>
                <h6 class="no-border text-white">@lang('Number of Sold Copies')</h6>
                <h3 class="mb-2">865</h3>
            </div>
        </div>
    </div>
</div>

<!-- Display fileds -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="page-name-xl mb-2 mt-2">Povlači broj naklade za ovu opciju</div>

            <!-- First column -->
            <div class="row">
                <div class="col-md-6">
                    <div class="page-name-l mb-2">@lang('Book Block')</div>

                    <!-- Dropdown menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Hard/Soft Cover')</option>
                                <option value="1" >@lang('None')</option>
                                <option value="2" >@lang('Hard Cover')</option>
                                <option value="3" >@lang('Soft Cover')</option>
                                <option value="3" >@lang('Hard and Soft Cover')</option>
                            </select>
                            <label>@lang('Hard/Soft Cover')</label>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" disabled>
                                <label for="form1" class="">@lang('Soft Cover Circulation')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" name="first_name" placeholder="" disabled>
                                <label for="form1" class="">@lang('Hard Cover Circulation')</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Choose Colors')</option>
                            </select>
                            <label>@lang('Colors')</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Colors - First Pages')</option>
                            </select>
                            <label>@lang('Colors - First Pages')</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Colors - Last Pages')</option>
                            </select>
                            <label>@lang('Colors - Last Pages')</label>
                        </div>
                    </div>
                    <div class="md-form">
                        <input type="text" id="form1" class="form-control" name="first_name" placeholder="" disabled>
                        <label for="form1" class="">@lang('Additional Work')</label>
                    </div>
                </div>

            <!-- Second column -->
                <div class="col-md-6">
                    <div class="page-name-l mb-2">@lang('Cover')</div>

                    <!-- Dropdown menu -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Paper Type')</option>
                            </select>
                            <label>@lang('Paper Type')</label>
                        </div>
                    </div>

                    <!-- Input fileds -->
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Choose Colors')</option>
                            </select>
                            <label>@lang('Colors')</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select class="mdb-select" name="department_id" disabled>
                                <option disabled >@lang('Plastification')</option>
                            </select>
                            <label>@lang('Plastification')</label>
                        </div>
                    </div>

                    <!--/. Checkbox -->
                    <div class="page-name-m">@lang('Film Print')</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio11" value="M" disabled>
                            <label for="radio11">@lang('No')</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio21" value="F" disabled>
                            <label for="radio21">@lang('Yes')</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">@lang('Blind Print')</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio11" value="M" disabled>
                            <label for="radio11">@lang('No')</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio21" value="F" disabled>
                            <label for="radio21">@lang('Yes')</label>
                        </fieldset>
                    </div>

                    <div class="page-name-m">@lang('UV Film')</div>
                    <div class="form-inline mb-3">
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio11" value="M" disabled>
                            <label for="radio11">@lang('No')</label>
                        </fieldset>
                        <fieldset class="form-group">
                            <input name="sex" type="radio" id="radio21" value="F" disabled>
                            <label for="radio21">@lang('Yes')</label>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="page-name-xl mb-1">@lang('Calculation')</div>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>@lang('Expense')</th>
            <th>@lang('Precentage')</th>
            <th>@lang('Expense Total')</th>
            <th>@lang('Expense Per Unit')</th>
        </tr>
        </thead>
        <tbody class="white">
        <tr class="table-display-1">
            <th scope="row">1</th>
            <td>Autorski honorar ukupno</td>
            <td></td>
            <td>9444,96</td>
            <td>9,44 kn</td>
        </tr>
        <tr>
            <th scope="row">1.1</th>
            <td>Autorski honorar ukupno</td>
            <td></td>
            <td>9444,96</td>
            <td>9,44 kn</td>
        </tr>
        <tr>
            <th scope="row">1.2</th>
            <td>Ostali autorski ugovori</td>
            <td></td>
            <td>9444</td>
            <td>999</td>
        </tr>
        <tr class="table-display-1">
            <th scope="row">2</th>
            <td>Tiskarski troškovi</td>
            <td></td>
            <td>9444,96</td>
            <td>9,44 kn</td>
        </tr>
        <tr class="table-display-2">
            <th scope="row">3</th>
            <td>Ukupno 1 i 2</td>
            <td></td>
            <td>9444,96</td>
            <td>9,44 kn</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Plaće izdavačkog sektora</td>
            <td></td>
            <td>9444</td>
            <td>9999</td>
        </tr>
        <tr class="table-display-1">
            <th scope="row">5</th>
            <td>Direktni troškovi</td>
            <td></td>
            <td>9444,96</td>
            <td>9,44 kn</td>
        </tr>
        <tr class="table-display-1">
            <th scope="row">6</th>
            <td>Indirektni troškovi</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr class="table-display-2">
            <th scope="row">7</th>
            <td>Direktni + Indirektni</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
            <th scope="row">8</th>
            <td>Ostatak AH ugovorenog po prodaji</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr class="table-display-2">
            <th scope="row">9</th>
            <td>Ukupno pokrivanje troška</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
            <th scope="row">10</th>
            <td>Dotacija</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr class="table-display-1">
            <th scope="row">11</th>
            <td>Ukupno pokrivanje troška - dotacije</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
            <th scope="row">12</th>
            <td>Ukalkulirana dobit</td>
            <td class="table-editable text-center">15%</td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
            <th scope="row">13</th>
            <td>Prodajna cijena proizvođača</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
            <th scope="row">14</th>
            <td>Udio trgovine</td>
            <td class="table-editable text-center">15%</td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
            <th scope="row">15</th>
            <td>Maloprodajna cijena</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
            <th scope="row">16</th>
            <td>PDV</td>
            <td class="table-editable text-center">15%</td>
            <td>9444</td>
            <td>9545</td>
        </tr>
        <tr>
        <tr class="table-display-3">
            <th scope="row">17</th>
            <td>MPC + PDV</td>
            <td></td>
            <td>9444</td>
            <td>9545</td>
        </tr>

        </tbody>
    </table>



     <!-- Textarea -->
    <div class="md-form mt-3">
        <textarea type="text" id="form76" class="md-textarea"></textarea>
        <label for="form76">@lang('Note')</label>
    </div>

    <div class="page-name-l text-center mb-2">@lang('Download as...')</div>
    <div class="file-box file-box-l d-flex align-items-center">
        <a src="" href="http://homestead.app/images/profile.pdf" class="file-icon">.pdf</a>
        <a src="" href="http://homestead.app/images/profile.doc" class="file-icon">.doc</a>
    </div>


    <!-- Footer buttons -->
    <div class="btn-footer mt-2 mb-5 flex-column flex-md-row d-flex p-2">
        <button type="submit" class="btn btn-lg btn-save">@lang('Save')</button>
        <button type="submit" class="btn btn-lg btn-assign btn-assign-icon">@lang('Assign to...')</button>
    </div>

</div>


@endsection
