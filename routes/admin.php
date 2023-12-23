<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', ['as' => 'login', 'uses' => function() {
    return view('admin.login');
}]);

Route::post('login', ['as' => 'admin.login', 'uses' => 'Admin\AuthController@login']);

Route::group(['middleware' => ['auth:admin'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController']);

    Route::resource('admins', 'AdminController');

    Route::resource('users', 'UserController');

    Route::resource('cities', 'CityController');

    Route::resource('areas', 'AreaController');
    
    Route::resource('categories', 'CategoryController');

    Route::resource('brands', 'BrandController');

    Route::resource('services', 'ServiceController');

    Route::resource('vendors', 'VendorController');

    Route::get('settings', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);

    Route::post('settings', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);

    Route::post('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});
