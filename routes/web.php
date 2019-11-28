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

use App\category;

Route::get('/', function () {
    return view('admin.masterAdmin');
})->name('home');//->middleware(\App\Http\Middleware\LoginMidelware::class);

Route::get('/tes',function (){
    return view('user.categoryPublic');
});

Route::get('/category','CategoryController@viewCategory')->name('categories');

/**
 * applay search for a specific data API
 */

Route::get('/category/search/price/{category}/{price}' , "CategoryController@searchPrice");

/**
 * applay a ajax for get element in SPA
 */
Route::get('/category/{category}','CategoryController@singleCategory')->name('singleCategory');
Route::get('/category/{category}/products','CategoryController@singleCategoryProducts')->name('singleCategoryProducts');


Route::get('/products/{product}','ProductController@viewProduct')->name('viewProduct');

Route::get('/products/design/{product}','ProductController@getDesignView')->name('getDesignView');

Route::get('/products/{product}/addToChart/{user}','ShoppingCartController@addToChart')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('addToChart');
//"{{route('viewProduct',$subCategory->products->last()->id)}}"



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/**
 * view shopping carts process
 */
Route::get('/view-cart','ShoppingCartController@view_cart')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('view-cart');



