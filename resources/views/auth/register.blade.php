@extends('layouts.app')
 
 @section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('images/chida2.jpg') }}'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-signup">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li> {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form" method="POST" action="{{ route('register') }}"">
                                @csrf

                                <div class="header header-warning text-center">
                                    <h4>Registro</h4>
<!--                                    <div class="social-line">
                                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
 -->                               </div>
                                <p class="text-divider">Completa los campos</p>
                                <div class="content">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nombre's" name="name" value="{{ old('name', $name) }}" required autofocus>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <input id="email" type="email" placeholder="Correo electronico" class="form-control" name="email" value="{{ old('email', $email) }}">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">phone</i>
                                        </span>
                                        <input id="phone" type="phone" placeholder="Telefono" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">room</i>
                                        </span>
                                        <input id="address" type="text" placeholder="Dirección(Comunidad, Municipio, Estado)" class="form-control" name="address" value="{{ old('address') }}" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña" />
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required placeholder="Confirmar contraseña" />
                                    </div>

                                </div>
                                <div class="footer text-center" >
                                    <button type="submit" class="btn btn-simple btn-primary btn-lg">Confirmar registro</a>
                                </div>
                                <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @include('includes.footer')

        </div>
@endsection
