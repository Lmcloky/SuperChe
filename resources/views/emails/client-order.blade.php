<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
	<link>
</head>
<body>
	<p>Has realizado un nuevo pedido!</p>
	<p>Estos son tus datos</p>

	<ul>
		<li>
			<strong>Nombre: </strong>
			{{ $user->name }}
		</li>
		<li>
			<strong>E-mail: </strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Fecha de pedido: </strong>
			{{ $cart->order_date }}
		</li>
	</ul>

	<hr>
		<p>Detalles del producto: </p>
	
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{ $detail->product->name }} x{{ $detail->quantity }} ($ {{ $detail->quantity * $detail->product->price }} )
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Importe a pagar: </strong>{{ $cart->total }}
	</p>
	<hr>
</body>
</html>