@extends('sktemplate::layout')

@section('content')
<div class="login">
    <div class="container">

        <div class="col card mx-auto">
            <div class="card-block">
                <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <!--Header-->
                <div class="form-header">
                    <h2>Školska knjiga prijava</h2>
                </div>

                <!--Body-->
                <div class="md-form">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="email" id="form2" name="email" class="form-control" required value="{{ old('email') }}">
                    <label for="form2">Email</label>
                </div>

                <div class="md-form">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="form4" name="password" class="form-control" required>
                    <label for="form4">Lozinka</label>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-neutral mb-4">Prijavi se</button>
                </div>
                </form>
            </div>

            <!--Footer-->
            <div class="modal-footer text-center">
                <div class="options">
                    <p>Zaboravili ste <a href="{{ route('password.request') }}">pristupne podatke?</a></p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
