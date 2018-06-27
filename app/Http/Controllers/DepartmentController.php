<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Department;

class DepartmentController extends Controller
{
	public function show(Department $department)
	{

		$categories = $department->categories()->paginate(10);
		return view('departments.show')->with(compact('department','categories'));
		
	} 
}