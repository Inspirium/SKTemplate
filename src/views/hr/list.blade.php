@extends('sktemplate::layout')

@section('content')
    <div class="page-name-xl">Imenik</div>
    <!-- Search -->
    <div class="md-form input-group search-big">
        <input type="search" class="form-control" placeholder="Traži...">
        <span class="input-group-btn">
                <a class="btn btn-neutral btn-lg search-big-button" type="button"><i class="fa fa-search fa-4x left"></i></a>
            </span>
    </div>
    <!--/. Search -->
    <div class="btn-header d-flex p-2">
        <button type="button" class="btn btn-lg btn-unique"><i class="fa fa-plus left"></i>Dodaj novog zaposlenika</button>
    </div>
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
                <a class="blue-text"><i class="fa fa-user"></i></a>
                <a class="teal-text"><i class="fa fa-pencil"></i></a>
                <a class="red-text"><i class="fa fa-times"></i></a>
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
                <a class="blue-text"><i class="fa fa-user"></i></a>
                <a class="teal-text"><i class="fa fa-pencil"></i></a>
                <a class="red-text"><i class="fa fa-times"></i></a>
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
                <a class="blue-text"><i class="fa fa-user"></i></a>
                <a class="teal-text"><i class="fa fa-pencil"></i></a>
                <a class="red-text"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
