<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
    	$products = $category->products->where('subsistence_id','=','1');
    	return view('categories.show')->with(compact('category','products'));
    }
}