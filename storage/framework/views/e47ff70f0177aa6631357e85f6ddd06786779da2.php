<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('img/apple-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('img/favicon.png')); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php echo $__env->yieldContent('title','Super Che Store'); ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/material-kit.css')); ?>" rel="stylesheet"/>
    <?php echo $__env->yieldContent('styles'); ?>

</head>

<body class="<?php echo $__env->yieldContent('body-class'); ?>">
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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">Super Che Store</a>
            </div>

            <div class="collapse navbar-collapse" id="navigation-example">
                <ul class="nav navbar-nav navbar-right">
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Ingresar')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registro')); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role"menu">
                                    
                                    <li>
                                        <a href="<?php echo e(url('/home')); ?> ">Dashboard</a>
                                    </li>

                                    <?php if(auth()->user()->admin): ?>
                                    <li>
                                        <a href="<?php echo e(url('/admin/products')); ?> ">Gestionar productos</a>
                                    </li>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?> " onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit(); ">Desconectarse</a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?> " method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                            
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
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
        <?php echo $__env->yieldContent('content'); ?>
    </div>


</body>
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/material.min.js')); ?>"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo e(asset('js/nouislider.min.j')); ?>s" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="<?php echo e(asset('js/material-kit.js')); ?>" type="text/javascript"></script>

</html>