@extends('sktemplate::layout')

@section('content')
<div class="login">
    <div class="container">

        <div class="col card mx-auto">
            <div class="card-block">
                    <!--Header-->
                    <div class="form-header form-header-reset">
                        <h2>Resetiraj lozinku</h2>
                    </div>

                    <!--Body-->
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                @lang(session('status'))
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Upišite vaš e-mail</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>@lang($errors->first('email'))</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-success">
                                        Pošalji
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>

    </div>
</div>
@endsection
