<?php
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Route::get('/', function () {
	 return view('welcome');
 });
 Route::group(['middleware' => ['test']], function () {
       Route::get('customer',			['as'=>'customer.index',		'uses'=>'CustomerController@index']);
});
Route::get('customer/create',		['as'=>'customer.create',			'uses'=>'CustomerController@create']);
Route::post('customer/store',		['as'=>'customer.store',			'uses'=>'CustomerController@store']);
Route::get('customer/edit/{id}',	['as'=>'customer.edit',				'uses'=>'CustomerController@edit']);
Route::put('customer/update/{id}',	['as'=>'customer.update',			'uses'=>'CustomerController@update']);
Route::get('customer/delete/{id}',	['as'=>'customer.delete',			'uses'=>'CustomerController@destroy']);

Route::get('employee',				['as'=>'employee.index',			'uses'=>'EmployeeController@index']);
Route::get('employee/create',     	['as'=>'employee.create',   		'uses'=>'EmployeeController@create']);
Route::post('employee/store',		['as'=>'employee.store',			'uses'=>'EmployeeController@store']);
Route::get('employee/edit/{id}',	['as'=>'employee.edit',				'uses'=>'EmployeeController@edit']);	
Route::post('employee/update/{id}',	['as'=>'employee.update',			'uses'=>'EmployeeController@update']);
Route::get('employee/delete/{id}',	['as'=>'employee.delete',			'uses'=>'EmployeeController@destroy']);

Route::get('role',					['as'=>'role.index',				'uses'=>'RoleController@index']);
Route::get('role/create',			['as'=>'role.create',				'uses'=>'RoleController@create']);
Route::post('role/store',			['as'=>'role.store',				'uses'=>'RoleController@store']);			
Route::get('role/edit/{id}',		['as'=>'role.edit',					'uses'=>'RoleController@edit']);			
Route::post('role/update/{id}',		['as'=>'role.update',				'uses'=>'RoleController@update']);			
Route::get('role/delete/{id}',		['as'=>'role.delete',				'uses'=>'RoleController@destroy']);			

Route::get('admin/user/tests',	['middleware'=>'test', function(){

	return "hii";
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('laravelajax/create', 	['as'=>'laravelajax.create',	'uses'=>'LaravelajaxController@create']);
// Route::post('laravelajax-store', 	['as'=>'laravelajax.store',	'uses'=>'LaravelajaxConatroller@store']);

Route::resource('laravelajax', 'LaravelajaxController');


