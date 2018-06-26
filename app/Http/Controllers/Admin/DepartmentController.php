<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Department;
use File;

class DepartmentController extends Controller
{
    public function index()
    {
    	$departments = Department::orderBy('name')->paginate(10);
    	return view('admin.departments.index')->with(compact('departments'));//listado
    }

    public function create()
    {
        $departments = Department::orderBy('name','desc')->get();
    	return view('admin.departments.create')->with(compact('departments'));//formulario de registro
    }

    public function store(Request $request)
    {
    	//mensajes
    	$messages = [
    		'name.required' => 'Por favor ingrese el nombre del departamento',
    		'name.min' => 'El nombre del departamento debe de tener mas de tres caracteres',
    		'description.max' => 'La descripcion debe de ser corta'
    	];

    	//Validaciones
    	$rules = [
    	'name' => 'required|min:5',
    	'description' => 'max:150'
    	];
    	$this->validate($request, $rules, $messages);

    	$department = Department::create($request->only('name','description')); //asignacion masiva de datos

            if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/departments';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved){
                $department->image = $fileName;
                $department->save();
            }
        }

    	return redirect('/admin/departments');
    }

    public function edit(Department $department)
    {
    	return view('admin.departments.edit')->with(compact('department'));//formulario de registro
    }

    public function update(Request $request,Department $department)
    {
    	$messages = [
    		'name.required' => 'Por favor ingrese el nombre del departamento',
    		'name.min' => 'El nombre del departamento debe de tener mas de 5 caracteres',
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
    	$department->update($request->only('name','description'));

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = public_path() . '/images/departments';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved){
                $previousPath = $path . '/' . $department->image;

                $department->image = $fileName;
                $saved = $department->save();

                if ($saved)
                    File::delete($previousPath);
            }
        }

    	return redirect('/admin/departments');
    }

    //NO PODEMOS ELIMINAR DEBIDO A QUE LAS CATEGORIAS TIENEN PRODUCTOS
    public function destroy(Category $category)
    {
    	Product::where('category_id', $id)->delete();
		$category->delete();//eliminar
		return back();
    }
}
