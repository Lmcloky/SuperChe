<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Department;
use File;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories'));//listado
    }

    public function create()
    {
        $departments = Department::orderBy('name','desc')->get();
    	return view('admin.categories.create')->with(compact('departments'));//formulario de registro
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

    	$category = Category::create($request->only('name','description','department_id'));

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved){
                $category->image = $fileName;
                $category->save();
            }
        }

    	return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        $departments = Department::orderBy('name','desc')->get();
    	return view('admin.categories.edit')->with(compact('category','departments'));//formulario de registro
    }

    public function update(Request $request,Category $category)
    {
    	$messages = [
    		'name.required' => 'Por favor ingrese el nombre de la categoria',
    		'name.min' => 'El nombre de la categoria debe de tener mas de 5 caracteres',
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
    	$category->update($request->only('name','description','department_id'));

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved){
                $previousPath = $path . '/' . $category->image;

                $category->image = $fileName;
                $saved = $category->save();

                if ($saved)
                    File::delete($previousPath);
            }
        }

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
 