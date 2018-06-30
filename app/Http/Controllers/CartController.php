<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Cart;
use App\Mail\NewOrder;
use App\Mail\ClientOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user();
    	$cart = $client->cart;
        if ($cart->total > 0) {
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $cart->save();

        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder($client, $cart));
        Mail::to($client)->send(new ClientOrder($client, $cart));

        $notification = 'Tu pedido se ha registrado correctamente. Los datos han sido enviados a tu email!';
        return back()->with(compact('notification'));
        }

    	$notificationerror = 'No tienes nada en tu carrito, agrega productos!';
    	return back()->with(compact('notificationerror'));
    }
}
