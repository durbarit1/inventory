<?php

Route::get('/', function () {return redirect()->route('login');});

Auth::routes(['register' => false]);
// Home Controller
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.`
	');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');


//Category Controller
Route::post('/insert/category', 'CategoryController@categoryinsert');
Route::get('/list/category', 'CategoryController@categoryview'); 
Route::get('/delete/category/{category_id}', 'CategoryController@deletecategory');
Route::get('/edit/category/{category_id}', 'CategoryController@editcategory');
Route::post('/edit/category/insert', 'CategoryController@editinsertcategory');


// Brand Controller
Route::get('/list/brand', 'BrandController@brandview');
Route::post('/insert/brand', 'BrandController@brandinsert');
Route::get('/delete/brand/{brand_id}', 'BrandController@branddelete');
Route::get('/edit/brand/{brand_id}', 'BrandController@editbrand');
Route::post('/edit/brand/insert', 'BrandController@editinsbrand');
// Designation Controller
Route::get('/list/designation', 'DesignationController@degview');
Route::post('/insert/designation', 'DesignationController@deginsert');
Route::get('/delete/designation/{deg_id}', 'DesignationController@degdelete');
Route::get('/edit/designation/{deg_id}', 'DesignationController@degedit');
Route::post('/edit/designation/insert', 'DesignationController@degeditins');
// Employe Controller
Route::get('/add/employee', 'EmployeeController@empadd');
Route::get('/list/employee', 'EmployeeController@empview');
Route::post('/insert/employee', 'EmployeeController@empinsert');
Route::get('/delete/employee/{emp_id}', 'EmployeeController@empdelete');
Route::get('/edit/employee/{emp_id}', 'EmployeeController@empedit');
Route::post('/edit/employee/update', 'EmployeeController@empeditins');

