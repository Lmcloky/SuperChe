<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title',config('app.name') )</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"/>
    @yield('styles')

</head>

<body class="@yield('body-class')">
    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">{{config('app.name')}}</a>
            </div>

            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                            </li>
                        @else 
                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role"menu">
                                    <li>
                                        <a data-toggle="modal" data-target="#modalPolitics">
                                         politicas de privacidad
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/home') }} ">Carrito de compras</a>
                                    </li>

                                    @if (auth()->user()->admin)
                                    <li>
                                        <a href="{{ url('/admin/departments') }} ">Gestionar departamentos</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/categories') }} ">Gestionar categorias</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/products') }} ">Gestionar productos</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }} " onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit(); ">Cerar Sesión</a>
                                        <form id="logout-form" action="{{ route('logout')}} " method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
<!--                <li>
                        <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
-->             </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        @yield('content')
    </div>

<div class="modal fade" id="modalPolitics" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Politicas de privacidad</h4>
      </div>
      <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="team-player">
                    <!-- <h4 class="title">Politicas de privacidad<br />
                    </h4> -->
                    <p>AVISO DE PRIVACIDAD <br>
Su privacidad y confianza son lo primordial para la empresa lo cual permite a la empresa de tiendas Chedraui S.A. de C.V. brindar integridad y salvaguardar sus datos personales y brindar protección y privacidad
Identidad  <br>
La identidad estará conformada a los datos registrados del usuario mediante el uso de la pagina con la finalidad de identificarse con el comprador el cual tendrá que identificarse como una persona real mediante los siguientes datos personales. <br>
•   Identificación: Nombre, apellidos, genero, estado civil, firma autógrafa, RFC, IFE o INE, lugar y fecha de nacimiento, domicilio, residencia y correo electrónico. <br>
•   De contacto: Dirección del domicilio (calle, numero, código postal, estado, teléfono móvil). <br>
Finalidad del uso de datos <br>
Los datos personales que el usuario proporcione tienen como finalidad establecer una relación contractual-comercial y de negocios con el usuario para ser utilizados con fines publicitario y promocionales. <br>
Transferencia de datos <br>
Chedraui se compromete a no transferir a un tercero sus datos personales, asimismo, para garantizar la protección y confidencialidad de los Datos Personales ha establecido mecanismos de seguridad administrativos, técnicos y físicos.
No obstante, Chedraui podrá llevar a cabo transferencias nacionales o internacionales de datos personales sin el consentimiento del Titular, siempre que la transferencia sea efectuada a sociedades controladoras, subsidiarias o afiliadas bajo el control común de Tiendas Chedraui, S.A. de C.V., o una sociedad matriz o a cualquier sociedad que opere bajo los mismos procesos y políticas internas; o cuando sea necesaria en virtud de un contrato celebrado o por celebrar en interés del Titular, por Chedraui y un tercero; y cuando la transferencia sea precisa para el mantenimiento o cumplimiento de una relación jurídica entre Chedraui y el Titular, cuidando el cumplimiento de todos los principios legales de protección en torno a la transferencia de sus datos personales a sus compañías controladoras, subsidiarias o afiliadas, así como, a terceros nacionales o extranjeros, manteniendo los mecanismos de seguridad señalados anteriormente con el objetivo de evitar el daño, pérdida, alteración, acceso y uso indebido de los datos proporcionados.
<br><br>
Limitación del uso y divulgación de datos <br>
Para que el usuario pueda limitar el uso o divulgación de su información personal, le ofrecemos incorporarse en la lista denominada “Lista de Exclusión para Clientes”, a fin de que sus datos personales no sean tratados para finalidades secundarias por nuestra parte <br>
Cambios al aviso de privacidad <br>
Chedraui se reserva su derecho a realizar cambios en el presente Aviso de Privacidad originadas por nuevos requerimientos legales o por propias necesidades derivadas de los productos y/o servicios que ofrecemos.
Términos y condiciones  <br>
Promociones <br>
Mediante las promociones dadas en la pagina web de promociones esta deberá realizar el uso y manejo de periodicidad de cada publicación conforme el descuento establecido en la página. <br>
Si la publicación ya expiro  conforme a la promoción dada en la fecha límite de la promoción esta no será válida ya que el tiempo de la promoción ha expirado para poder ofrecer nuevas promociones en nuestro servicio de la página web.
Devolución y cancelación <br>
Mediante que la devolución o cancelación  de dicho pedido será valido siempre y cuando el usuario realice escribiendo al correo luis_19951105@hotmail.com para poder ser válida su cancelación de compra junto con el caso de la devolución del producto siempre y cuando realice una captura de pantalla del correo o mensaje de la realización de la compra mediante la página web de Chedraui. <br>
Modalidades de pedidos <br>
Los pedidos serán realizados conforme a la realización de la compra de dicho producto en la página oficial Chedraui.
Envíos  <br>
Los envió serán seleccionados únicamente con el código postal en el interior de la republica mexicana , de lo contrario si se realiza una compra internacional o exterior al país, esta no realizara la compra mediante la ejercían de envíos ya que la empresa se limita a realizar envíos fuera del país dando como resultado la cancelación de la compra. <br>
Formas de pago <br>
Disponibilidad de los productos <br>
La disponibilidad de los Productos está sujeta a la cantidad existente en la Sucursal seleccionada así como  sean adecuadas para su venta. En el supuesto de que no se cuente con la cantidad de los Productos solicitados por el Usuario en el Pedido, Chedraui lo informará previamente en su confirmación de artículos del Pedido, donde el Usuario tendrá la opción de modificar, sustituir o solicitar una cantidad menor de los productos originalmente ordenados, tomando en cuenta que estos pueden variar en precio, peso, presentación o, en su caso, características físicas, etc.; por lo tanto el Usuario podrá optar por la aceptación, o bien, cancelar la compra del mismo, obligándose a pagar el diferencial correspondiente. <br>
De acuerdo con la disponibilidad de los Productos de los departamentos establecidos en las tiendas Chedraui, en caso de comprar varios artículos, éstos pueden llegar en paquetes separados y en tiempos diferentes con tickets independientes y la facturación independiente, de acuerdo a cada paquete. <br>
Se tendrá como limitante la adquisición de diversos productos al mayoreo, cuyo otorgamiento estará a consideración de la tienda seleccionada.<br> <br>

Modificaciones al sitio <br>
Chedraui podrá en cualquier momento y cuando lo considere conveniente, sin necesidad de aviso al usuario, realizar correcciones, adiciones, mejoras o modificaciones al contenido, presentación, información, servicios, áreas bases de datos y demás elementos del Sitio, sin que ello dé lugar a ninguna reclamación o indemnización, ni que lo mismo implique reconocimiento de responsabilidad alguna a favor del Usuario. <br>
De igual manera, las ofertas y promociones que se liberen en el Sitio quedarán sujetas a las especificaciones que se señalen en el mismo, y serán exclusivas de la tienda en línea, no acumulables con otras promociones y   en cualquier momento podrán sufrir modificaciones y actualizaciones.
</p>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


</body>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('js/nouislider.min.j') }}s" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>

</html>