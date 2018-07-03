<?php $__env->startSection('title', 'SuperChe | Dashboard'); ?>

<?php $__env->startSection('body-class','profile-page'); ?> 

<?php $__env->startSection('styles'); ?>
    <style>
        .profile {
            margin-left: 360px;
        }
        .team {
            padding-bottom: 50px;
        }
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="header header-filter" style="background-image: url('/images/logonegro3.png');"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile text-center">
                        <div class="avatar">
                            <img src=" <?php echo e($category->featured_image_url); ?> " alt="<?php echo e($category->name); ?> " class="img-circle img-responsive img-raised">
                        </div>
                        <div class="namer">
                            <h3 class="title">Productos de la categoría: <?php echo e($category->name); ?> </h3>
                        </div>
<!--                         <?php if(session('notification')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('notification')); ?>        
                            </div>
                        <?php endif; ?>     -->
                    </div>
                </div>
                <div class="description text-center">
                    <p><?php echo e($category->description); ?></p>
                </div>
                
                <div class="team text-center">
                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="<?php echo e($product->featured_image_url); ?> " alt="Thumbnail Image" class="img-raised img-rounded">
                                <h4 class="title"> <a href="<?php echo e(url('/products/'.$product->id)); ?> "><?php echo e($product->name); ?> </a><br />
                                    <small class="text-muted"><?php echo e($product->category_name); ?> 
                                    <br>Precio del producto: $<?php echo e($product->price); ?>

                                    
                                    </small>
                                </h4>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                   
                </div>

            </div>
        </div>
    </div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>