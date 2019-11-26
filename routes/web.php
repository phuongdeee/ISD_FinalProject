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
    Route::get('viewer/project','project');
    Route::get('viewer/contract', 'contract');
    Route::get('viewer/apartment','apartment');
    
    Route::get('viewer/flat','flat');
    // Route::resource('viewer/location','LocationController');
    Route::get('viewer/manager','manager');
    // Route::resource('viewer/marketting','MarkettingController');
    Route::get('viewer/customer','customer');
});
Route::group(['namespace' => 'admin'], function() {
    Route::resource('admin/project','ProjectController');
    Route::resource('admin/contract', 'ContractController');
    Route::resource('admin/apartment','ApartmentController');


    Route::resource('admin/flat','FlatController');
    Route::resource('admin/location','LocationController');
    Route::resource('admin/manager','ManagerController');
    // Route::resource('admin/marketting','MarkettingController');
    Route::resource('admin/customer','CustomerController');
});
// Route::group(['namespace' => 'viewer'], function() {
//     Route::get('viewer/project','ProjectController@in');
//     Route::get('viewer/contract', 'ContractController');
//     Route::get('viewer/apartment','ApartmentController');
    
//     Route::get('viewer/flat','FlatController');
//     // Route::resource('viewer/location','LocationController');
//     Route::get('viewer/manager','ManagerController');
//     // Route::resource('viewer/marketting','MarkettingController');
//     Route::get('viewer/customer','CustomerController');
// });
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
