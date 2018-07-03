<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Category;
use App\Subsistence;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));//listado
    }
    public function create()
    {
        $subsistences = Subsistence::orderBy('description')->get();
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories','subsistences'));//formulario de registro
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
        $product->category_id = $request->category_id;
    	$product->price = $request->input('price');
        $product->subsistence_id = 1 ;
    	$product->save();//insert en la tabla producto

    	return redirect('/admin/products');
    }

    public function edit($id)
    {
        $subsistences = Subsistence::orderBy('description')->get();
        $categories = Category::orderBy('name')->get();
    	$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product', 'categories','subsistences'));//formulario de registro
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
        $product->category_id = $request->category_id;
    	$product->price = $request->input('price');
        $product->subsistence_id = $request->subsistence_id;
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