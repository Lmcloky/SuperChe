 
<?php $__env->startSection('title', 'Editar producto'); ?>

<?php $__env->startSection('body-class','product-page'); ?>

<?php $__env->startSection('content'); ?>
<div class="header header-filter" style="background-image: url('<?php echo e(asset('images/logonegro.png')); ?>');">
</div>

<div class="main main-raised">
<div class="container">

    <div class="section">
        <h2 class="title text-center">Editar producto</h2>
        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo e(url('/admin/products/'.$product->id.'/edit')); ?>">
            <?php echo e(csrf_field()); ?>

            
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name', $product->name)); ?>">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Descripción</label>
                    <input type="text" class="form-control" name="description" value="<?php echo e(old('description', $product->description)); ?>">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Seleccionar categoría del producto</label>
                    <select class="form-control" name="category_id">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php if($category->id == old('category_id', $product->category_id)): ?> selected <?php endif; ?>>
                            <?php echo e($category->name); ?> 
                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="<?php echo e(old('price', $product->price)); ?>">
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group label-floating">
                    <label class="control-label">Existen productos</label>
                    <select class="form-control" name="subsistence_id">
                        <?php $__currentLoopData = $subsistences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsistence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subsistence->id); ?>" <?php if($subsistence->id == old('subsistence_id', $product->subsistence_id)): ?> selected <?php endif; ?>>
                            <?php echo e($subsistence->description); ?> 
                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="col-sm-6">
                
            </div>
            <button class="btn btn-primary">Guardar cambios</button>
            <a href="<?php echo e(url('/admin/products')); ?> " class="btn btn-default">Cancelar</a>
        </form>
    </div>

</div>

</div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>