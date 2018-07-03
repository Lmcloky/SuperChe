<?php $__env->startSection('title', 'Bienvenido a ' . config('app.name')); ?>

<?php $__env->startSection('body-class','landing-page'); ?> 

<?php $__env->startSection('styles'); ?>
    <style>
        /*.features {
            margin-top: -100px;
        }*/
        .section-landing{
            margin-top: -130px;
        }
        .team .row .col-md-4 {
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('images/Chedraui-3.jpg')); ?>');">
<div class="container">
    <div class="row">
        <div class="profile text-center">
            <div class="avatar">
                <img src="/images/che.png" alt="Imagen de super che en linea" class="img img-responsive img-rounded">
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="title">
            Bienvenido a <?php echo e(config('app.name')); ?>.</h1>
            <h4>Realiza tus pedidos en linea, facil y rapido.</h4>
            <br />
<!--             <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                <i class="fa fa-play"></i> Watch video
            </a> -->
        </div>
    </div>
</div>
</div>

<div class="main main-raised">
<div class="container">


    <div class="section text-center">
        <h2 class="title">Busca dentro de nuestros departamentos</h2><br>

        <form class="form-inline" method="get" action="<?php echo e(url('/search')); ?> ">
            <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" />
            <button class="btn btn-primary btn-just-icon" type="submit">
                <i class="material-icons">search</i>
            </button>
        </form>

        <div class="team">
            <div class="row">
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="team-player">
                        <img src="<?php echo e($department->featured_image_url); ?> " alt="<?php echo e($department->name); ?>" class="img-raised img-rounded">
                        <h4 class="title"> <a href="<?php echo e(url('/departments/'.$department->id)); ?> "><?php echo e($department->name); ?> </a><br />
                        </h4>
                        <p class="description"><?php echo e($department->description); ?> </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

        <div class="section text-center section-landing">
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

    <div class="section landing-section">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center title">¿Aun no te registras?</h2>
                <h4 class="text-center description">Registrate en nuestra pagina ingresando tus datos básicos para poder realizar tus pedidos a travez de nuestro carrito de compras. Si todavia no te decides, de todas formas, mandanos un mensaje con las dudas que tengas y con gusto te atenderemos.</h4>
                <form class="contact-form" method="get" action="<?php echo e(('/register')); ?> ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 text-center">
                            <button class="btn btn-primary btn-raised">
                                Registrarce
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>