<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function store(Request $request)
	{
		
		$cartDetail = new CartDetail();
		$cartDetail->cart_id = auth()->user()->cart->id;
		$cartDetail->product_id = $request->product_id;
	    $cartDetail->quantity = $request->quantity;
	    if ($cartDetail->quantity < 0) {
	    	$notificationerror = 'Usted necesita agregar producto valido!';
	    	return back()->with(compact('notificationerror'));
	    }
	    if ($cartDetail->quantity > 4) {
	    	$notificationerror = 'Nuestra politica de privacidad no permite la venta de mas de 5 productos!';
	    	return back()->with(compact('notificationerror'));
	    }
	    $cartDetail->save();

	    $notification = 'El producto se ha agregado al carrito de compras exitosamente!';
	    return back()->with(compact('notification'));
	}
		public function destroy(Request $request)
	{
		$cartDetail = CartDetail::find($request->cart_detail_id);
		if ($cartDetail->cart_id == auth()->user()->cart->id)
	    	$cartDetail->delete();

	    $notification = 'El producto se ha eliminado del carrito de compras satisfactoriamente';
	    return back()->with(compact('notification'));
	}
}
