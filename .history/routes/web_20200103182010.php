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


Route::get('/db', function() {
    if(DB::connection()->getDatabaseName())
    {
       echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
    }
 });

Route::group(['middleware' => ['auth','admin']], function () {
    
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::get('/admin', 'Admin\DashboardController@registered');

    Route::get('/users', function () {
        return view('admin.users');
    });
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
