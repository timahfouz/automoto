<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'API'], function() {
    
    // Route::get('places/{id?}', ['as' => 'places', 'uses' => 'PlaceController']);

    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
        Route::post('register', ['as' => 'register', 'uses' => 'AuthController@register']);
        Route::post('resend-code', ['as' => 'resend.code', 'uses' => 'AuthController@resendCode']);
        Route::post('activate', ['as' => 'activate', 'uses' => 'AuthController@activate']);

        // Route::get('profile', ['as' => 'profile', 'uses' => 'UserController'])->middleware('auth:api');
        // Route::put('update', ['as' => 'profile.update', 'uses' => 'UserController@update'])->middleware('auth:api');

        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout'])->middleware('auth:api');
    });
    
    Route::get('cities', ['as' => 'cities.index', 'uses' => 'CityController']);
    Route::get('areas/{id}', ['as' => 'areas.index', 'uses' => 'AreaController']);
    Route::get('categories', ['as' => 'categories', 'uses' => 'CategoryController']);
    Route::get('brands', ['as' => 'brands', 'uses' => 'BrandController']);
    Route::get('services/{categoryID}', ['as' => 'services', 'uses' => 'ServiceController']);
    Route::get('vendors', ['as' => 'vendors', 'uses' => 'VendorController']);
    Route::get('reviews/{vendorID}', ['as' => 'reviews', 'uses' => 'ReviewController']);
    Route::get('jobs', ['as' => 'jobs', 'uses' => 'JobController']);
    Route::get('drivers', ['as' => 'drivers', 'uses' => 'DriverController']);
    Route::get('banners', ['as' => 'banners', 'uses' => 'BannerController']);
    
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('favorites/{vendorID}', ['as' => 'favorites.toggle', 'uses' => 'FavoriteController']);
        Route::get('favorites', ['as' => 'favorites', 'uses' => 'FavoriteController@index']);

        Route::post('brands-alert', ['as' => 'brands.alert', 'uses' => 'BrandAlertController']);
        Route::get('brands-alert', ['as' => 'alerts', 'uses' => 'BrandAlertController@index']);
    });

    //     Route::group(['prefix' => 'auth'], function () {
    //         Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
    //         Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout'])->middleware('auth:carrier');
    //     });
        
    //     Route::get('orders', ['as' => 'orders.index', 'uses' => 'OrderController@index'])->middleware('auth:carrier');;
    //     Route::get('orders/{id}', ['as' => 'orders.show', 'uses' => 'OrderController@show'])->middleware('auth:carrier');;
    //     Route::put('orders/{id}', ['as' => 'orders.update', 'uses' => 'OrderController@update'])->middleware('auth:carrier');;
    // });


});