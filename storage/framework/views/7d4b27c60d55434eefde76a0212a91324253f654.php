<?php $__env->startSection('title', 'Lista de productos'); ?>

<?php $__env->startSection('body-class','product-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('images/logonegro.png')); ?>');">

</div>

<div class="main main-raised">
<div class="container">

    <div class="section text-center">
        <h2 class="title">Listado de Productos</h2>

        <div class="team">
            <div class="row">
                <a href="<?php echo e(url('/admin/products/create')); ?> " class="btn btn-primary btn-round">nuevo Producto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="col-md-2 text-center">Nombre</th>
                            <th class="col-md-3 text-center">Descripcion</th>
                            <th>Categoria</th>
                            <th class="text-right">Precio</th>
                            <th>Disponibilidad</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->description); ?></td>
                            <td><?php echo e($product->category_name); ?></td>
                            <td class="text-right">$ <?php echo e($product->price); ?></td>
                            <td><?php echo e($product->subsistence->description); ?></td>
                            <td class="td-actions text-right">
                                <form method="post" action="<?php echo e(url('/admin/products/'.$product->id.'/delete')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <a href="<?php echo e(url('/products/'.$product->id)); ?> " type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                    <i class="fa fa-info"></i>
                                    </a>
                                    <a href="<?php echo e(url('/admin/products/'.$product->id.'/edit')); ?> " type="button" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="<?php echo e(url('/admin/products/'.$product->id.'/images')); ?>" type="button" rel="tooltip" title="Imágenes del producto" class="btn btn-warning  btn-simple btn-xs">
                                    <i class="fa fa-image"></i>
                                    </a>
                                    <button type="submit" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>                                    
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($products->links()); ?>

            </div>
        </div>

    </div>

</div>

</div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>