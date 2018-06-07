@extends('layouts.app')

@section('css')
<link href="../assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
@endsection()

@section('content')
<div class="login">
    <div class="content">
     <form class="login-form" action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <h3 class="form-title font-green">Iniciar sesion</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Ingrese su usuario y contraseña </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> 
        </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password" /> 
            </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Entrar</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Recordar
                        <span></span>
                    </label>
                </div>
            </form>
        </div>
    </div>
    @endsection