<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
	<link>
</head>
<body>
	<p>Se ha realzado un nuevo pedido!</p>
	<p>Estos son los datos del cliente que realizó el pedido</p>

	<ul>
		<li>
			<strong>Nombre: </strong>
			<?php echo e($user->name); ?>

		</li>
		<li>
			<strong>E-mail: </strong>
			<?php echo e($user->email); ?>

		</li>
		<li>
			<strong>Fecha de pedido: </strong>
			<?php echo e($cart->order_date); ?>

		</li>
	</ul>

	<hr>
		<p>Detalles del producto: </p>
	
	<ul>
		<?php $__currentLoopData = $cart->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li>
			<?php echo e($detail->product->name); ?> x<?php echo e($detail->quantity); ?> ($ <?php echo e($detail->quantity * $detail->product->price); ?> )
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
	<p>
		<strong>Importe a pagar: </strong><?php echo e($cart->total); ?>

	</p>
	<hr>
	<p>
		<a href=" <?php echo e(url('/admin/orders/'.$cart->id)); ?> ">Haz clic aquí</a>
		para ver mas informacion sobre este pedido.
	</p>
</body>
</html>