<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));//listado
    }

    public function create()
    {
    	return view('admin.products.create');//formulario de registro
    }

    public function store(Request $request)
    {
    	//mensajes
    	$messages = [
    		'name.required' => 'Por favor ingrese el nombre del producto',
    		'name.min' => 'El nombre del producto debe de tener mas de tres caracteres',
    		'description.required' => 'La descripcion es necesaria',
    		'description.max' => 'La descripcion debe de ser corta',
    		'price.required' => 'El precio es necesario',
    		'price.numeric' => 'Solo se aceptan numeros en el precio',
    		'price.min' => 'No se aceptan numeros negativos'
    	];

    	//Validaciones
    	$rules = [
    	'name' => 'required|min:5',
    	'description' => 'required|max:150',
    	'price' => 'required|numeric|min:0'
    	];
    	$this->validate($request, $rules, $messages);
    	//registrar el nuevo producto en la bd
    	//dd($request->all());
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->save();//insert en la tabla producto

    	return redirect('/admin/products');
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product'));//formulario de registro
    }

    public function update(Request $request, $id)
    {
    	$messages = [
    		'name.required' => 'Por favor ingrese el nombre del producto',
    		'name.min' => 'El nombre del producto debe de tener mas de tres caracteres',
    		'description.required' => 'La descripcion es necesaria',
    		'description.max' => 'La descripcion debe de ser corta',
    		'price.required' => 'El precio es necesario',
    		'price.numeric' => 'Solo se aceptan numeros en el precio',
    		'price.min' => 'No se aceptan numeros negativos'
    	];

    	//Validaciones
    	$rules = [
    	'name' => 'required|min:5',
    	'description' => 'required|max:150',
    	'price' => 'required|numeric|min:0'
    	];
    	$this->validate($request, $rules, $messages);
    	//registrar el nuevo producto en la bd
    	//dd($request->all());
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->save();//insert en la tabla producto

    	return redirect('/admin/products');
    }
    public function destroy($id)
    {
    	 ProductImage::where('product_id', $id)->delete();
		 //eliminar producto
		 $product=Product::find($id);
		 $product->delete();//eliminar
		 return back();
    }
}
