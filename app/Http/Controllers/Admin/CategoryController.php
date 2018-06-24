<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories'));//listado
    }

    public function create()
    {
    	return view('admin.categories.create');//formulario de registro
    }

    public function store(Request $request)
    {
    	//mensajes
    	$messages = [
    		'name.required' => 'Por favor ingrese el nombre de la categoria',
    		'name.min' => 'El nombre de la categoria debe de tener mas de tres caracteres',
    		'description.max' => 'La descripcion debe de ser corta'
    	];

    	//Validaciones
    	$rules = [
    	'name' => 'required|min:5',
    	'description' => 'max:150'
    	];
    	$this->validate($request, $rules, $messages);
    	//registrar la nueva categoria en la bd
    	//dd($request->all());
    	Category::create($request->all()); //asignacion masiva de datos

    	return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
    	return view('admin.categories.edit')->with(compact('category'));//formulario de registro
    }

    public function update(Request $request,Category $category)
    {
    	$messages = [
    		'name.required' => 'Por favor ingrese el nombre del producto',
    		'name.min' => 'El nombre del producto debe de tener mas de tres caracteres',
    		'description.max' => 'La descripcion debe de ser corta'
    	];

    	//Validaciones
    	$rules = [
    	'name' => 'required|min:5',
    	'description' => 'max:150'
    	];
    	$this->validate($request, $rules, $messages);
    	//registrar el nuevo producto en la bd
    	//dd($request->all());
    	$category->update($request->all());

    	return redirect('/admin/categories');
    }

    //NO PODEMOS ELIMINAR DEBIDO A QUE LAS CATEGORIAS TIENEN PRODUCTOS
    public function destroy(Category $category)
    {
    	Product::where('category_id', $id)->delete();
		$category->delete();//eliminar
		return back();
    }
}
 