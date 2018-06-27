<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Department;

class TestController extends Controller
{
    public function welcome()
    {
    	$departments = Department::has('categories')->get();
    	return view('welcome')->with(compact('departments'));
    }
}