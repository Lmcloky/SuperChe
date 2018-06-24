<?php $__env->startSection('title', 'Agrega una categoria'); ?>

<?php $__env->startSection('body-class','product-page'); ?> 
 
<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('img/bg5.jpeg')); ?>');">
</div>

<div class="main main-raised">
<div class="container">

    <div class="section">
        <h2 class="title text-center">Registrar nueva categoria</h2>

        
       <!--  Mostrar los mensajes de error
 -->
        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo e(url('/admin/categories')); ?> ">
            <?php echo e(csrf_field()); ?>

            
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="name" value=" <?php echo e(old('name')); ?> ">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Descripción</label>
                    <input type="text" class="form-control" name="description" value=" <?php echo e(old('description')); ?> ">
                </div>
            </div>
             <br><br><br><br><br><br><br><br><br><br><br>
            <div class="col-sm-7">
                
            </div>
            <button class="btn btn-primary">Registrar categoría</button>
            <a href="<?php echo e(url('/admin/categories')); ?> " class="btn btn-default">Cancelar</a>
        </form>
    </div>

</div>

</div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>