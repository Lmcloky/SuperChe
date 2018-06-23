@extends('layouts.app')

@section('title', 'Bienvenido a Super Che en linea')

@section('body-class','landing-page') 

@section('styles')
    <style>
        .team .row. .col-md-4 {
            margin-bottom: 5em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        .row > [class*='col-']{
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg5.jpeg') }}');">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="title">Bienvenido a Super Che Store.</h1>
            <h4>Realiza tus pedidos en line, facil y rapido.</h4>
            <br />
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                <i class="fa fa-play"></i> Watch video
            </a>
        </div>
    </div>
</div>
</div>

<div class="main main-raised">
<div class="container">
    <div class="section text-center section-landing">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="title">¿Porqué Super Che Store?</h2>
                <h5 class="description">Puedes entrar, observar y decidir que productos gustas, que te convence y realizar tus pagos cuando estes seguro.</h5>
            </div>
        </div>

        <div class="features">
            <div class="row">
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-primary">
                            <i class="material-icons">chat</i>
                        </div>
                        <h4 class="info-title">Dudas</h4>
                        <p>Ponte e contacto con nosotros en cualquier momento y atenderemos cualquier duda que tengas, siempre estamos a su servicio.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-success">
                            <i class="material-icons">verified_user</i>
                        </div>
                        <h4 class="info-title">Pagos seguros</h4>
                        <p>Realiza tus pagos con toda seguridad, ya que este sera confirmado a travez de una llamada o si prefieres puedes pagar al recibir la entrega.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="material-icons">fingerprint</i>
                        </div>
                        <h4 class="info-title">Información privada</h4>
                        <p>Toda tu informacion otorgada sera solo visible para ti, tanto tus datos como tus compras, nadie mas tendra acceso a estos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section text-center">
        <h2 class="title">Productos disponibles</h2>

        <div class="team">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="{{ $product->featured_image_url }} " alt="Thumbnail Image" class="img-raised img-rounded">
                        <h4 class="title"> <a href="{{ url('/products/'.$product->id)}} ">{{$product->name}} </a><br />
                            <small class="text-muted">{{ $product->category->name }}</small>
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>


    <div class="section landing-section">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center title">¿Aun no te registras?</h2>
                <h4 class="text-center description">Registrate en nuestra pagina ingresando tus datos básicos para poder realizar tus pedidos a travez de nuestro carrito de compras. Si todavia no te decides, de todas formas, mandanos un mensaje con las dudas que tengas y con gusto te atenderemos.</h4>
                <form class="contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Correo electrónico</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label">Tu mensaje</label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 text-center">
                            <button class="btn btn-primary btn-raised">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</div>

@include('includes.footer')
@endsection
