<?php $__env->startSection('title', 'SuperChe | Dashboard'); ?>

<?php $__env->startSection('body-class','profile-page'); ?> 

<?php $__env->startSection('styles'); ?>
    <style>
        .profile {
            margin-left: 390px;
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
                            <img src=" <?php echo e($department->featured_image_url); ?> " alt="Circle Image" class="img-circle img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title">Categoria: <?php echo e($department->name); ?> </h3>
                        </div>
                        
                        <?php if(session('notification')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('notification')); ?>        
                            </div>
                        <?php endif; ?>    

                    </div>
                </div>
                <div class="description text-center">
                    <p><?php echo e($department->description); ?></p>
                </div>
                
                <div class="team text-center">
                    <div class="row">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="<?php echo e($category->featured_image_url); ?> " alt="<?php echo e($category->name); ?>" class="img-raised img-rounded">
                                <h4 class="title"> <a href="<?php echo e(url('/categories/'.$category->id)); ?> "><?php echo e($category->name); ?> </a><br />
                                </h4>
                                <p class="description"><?php echo e($category->description); ?> </p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Modal Core -->

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>