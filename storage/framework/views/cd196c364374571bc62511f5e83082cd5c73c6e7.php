<?php $__env->startSection('title', 'Imagenes de los productos'); ?>

<?php $__env->startSection('body-class','product-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('images/logonegro.png')); ?>');">

</div>

<div class="main main-raised">
<div class="container">

    <div class="section text-center">
        <h2 class="title">Imagenes del Producto "<?php echo e($product->name); ?>"</h2>
        
        <form method="post" action="" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

        <input type="file" name="photo" required>
        <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
        <a href="<?php echo e(url('/admin/products')); ?> " class="btn btn-default btn-round">Ir al listado del producto</a>
        </form>

        <hr>

        <div class="row">

        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="<?php echo e($image->url); ?>" width="250">
                    <form method="post" action="">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                        <input type="hidden" name="image_id" value="<?php echo e($image->id); ?> "> 
                        <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                        <?php if($image->featured): ?>
                        <button type="button"  class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada de este producto">
                            <i class="material-icons">favorite</i>
                        </button>
                        <?php else: ?>
                        <a href=" <?php echo e(url('/admin/products/'.$product->id.'/images/select/'.$image->id)); ?> " class="btn btn-primary btn-fab btn-fab-mini btn-round">
                            <i class="material-icons">favorite</i>
                        </a>
                        <?php endif; ?>
                    </form>
                   
                </div>
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