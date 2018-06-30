<?php $__env->startSection('title', 'Lista de categorias'); ?>

<?php $__env->startSection('body-class','product-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('images/logonegro.png')); ?>');">

</div>

<div class="main main-raised">
<div class="container">

    <div class="section text-center">
        <h2 class="title">Listado de Categorias</h2>

        <div class="team">
            <div class="row">
                <a href="<?php echo e(url('/admin/categories/create')); ?> " class="btn btn-primary btn-round">Nueva Categoria</a>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th class="text-center">#</th> -->
                            <th class="col-md-2 text-center">Nombre</th>
                            <th class="col-md-4 text-center">Descripcion</th>
                            <th class="col-md-2 text-center">Departamento</th>
                            <th class="col-md-2 text-center">Imagen</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <!-- <td class="text-center"><?php echo e($category->id); ?></td> -->
                            <td><?php echo e($category->name); ?></td>
                            <td><?php echo e($category->description); ?></td>
                            <td><?php echo e($category->department_name); ?></td>
                            <td>
                                <img src="<?php echo e($category->featured_image_url); ?> " height="59">
                            </td>
                            <td class="td-actions text-right">
                                <form method="post" action="<?php echo e(url('/admin/categories/'.$category->id)); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <a href="" type="button" rel="tooltip" title="Ver categoria" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                    </a>
                                    <a href="<?php echo e(url('/admin/categories/'.$category->id.'/edit')); ?> " type="button" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
<!--                                     <button type="submit" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>     -->                                
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($categories->links()); ?>

            </div>
        </div>

    </div>

</div>

</div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>