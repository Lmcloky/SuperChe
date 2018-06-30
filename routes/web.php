<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');
Route::get('/categories/{category}','CategoryController@show');
Route::get('/departments/{department}','DepartmentController@show');

Route::get('/search','SearchController@show');


Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order','CartController@update');


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function() {
	Route::get('/products','ProductController@index');//listado de productos
	Route::get('/products/create','ProductController@create');//formulario productos
	Route::post('/products','ProductController@store');//registro productos
	Route::get('/products/{id}/edit','ProductController@edit');//formulario de edicion
	Route::post('/products/{id}/edit','ProductController@update');//actualizar
	Route::post('/products/{id}/delete','ProductController@destroy');//eliminar

	Route::get('/products/{id}/images', 'ImageController@index');//listado
	Route::post('/products/{id}/images', 'ImageController@store');//listado
	Route::delete('/products/{id}/images', 'ImageController@destroy');//eliminar
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select');

	Route::get('categories','CategoryController@index');//listado de Categoryos
	Route::get('/categories/create','CategoryController@create');//formulario Categoryos
	Route::post('/categories','CategoryController@store');//registro Categoryos
	Route::get('/categories/{category}/edit','CategoryController@edit');//formulario de edicion
	Route::post('/categories/{category}/edit','CategoryController@update');//actualizar
	Route::delete('/categories/{category}','CategoryController@destroy');//elimina

	Route::get('departments','DepartmentController@index');//listado de Departmentos
	Route::get('/departments/create','DepartmentController@create');//formulario Departmentos
	Route::post('/departments','DepartmentController@store');//registro Departmentos
	Route::get('/departments/{department}/edit','DepartmentController@edit');//formulario de edicion
	Route::post('/departments/{department}/edit','DepartmentController@update');//actualizar
	Route::delete('/departments/{department}','DepartmentController@destroy');//elimina

	Route::get('/users','RegisterController@index');//listado de Usuarios
	Route::get('/users/{user}/edit','RegisterController@edit');//formulario de edicion
	Route::post('/users/{user}/edit','RegisterController@update');//actualizar
});