@extends('layouts.app')

@section('css')
<link href="../assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
@endsection()


@section('content')
<div class="login">
    <div class="content">



                        <form class="login-form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <h3 class="form-title font-green">Registro</h3>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Nombre</label>

                                    <input class="form-control form-control-solid placeholder-no-fix" type="text" placeholder="Nombre" autocomplete="off" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label visible-ie8 visible-ie9">Email</label>

                                    <input class="form-control form-control-solid placeholder-no-fix" type="email" placeholder="Email" autocomplete="off" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
          
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label visible-ie8 visible-ie9">Contraseña</label>

      
                                     <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password" required/> 

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
       
                            </div>

                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Confirmar contraseña</label>

                                <input class="form-control form-control-solid placeholder-no-fix" placeholder="Confirmar contraseña" id="password-confirm" type="password" name="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
             

    </div>
</div>
@endsection
