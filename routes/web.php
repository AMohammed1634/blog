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



Route::get('/products/{product}/addToChart/{user}','ShoppingCartController@addToChart')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('addToChart');

Route::get('/products/design/{product}','ProductController@getDesignView')->name('getDesignView')->middleware(\App\Http\Middleware\LoginMidelware::class);

Route::post('/products/design/{product}/addImage','ProductController@addImage')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('addImage');

Route::get("/updateRow/{product}","UserImagesController@updateRow")->middleware(\App\Http\Middleware\LoginMidelware::class);

//"{{route('viewProduct',$subCategory->products->last()->id)}}"

Route::post("/product/{product}/addComment", 'ReviewController@addReview')->middleware(\App\Http\Middleware\LoginMidelware::class)->name("addReview");

/**
 * user profile routes
 */
Route::get('user/profile/{user}', 'UserController@viewProfile')->middleware(\App\Http\Middleware\LoginMidelware::class)->name("viewProfile");
Route::post('user/profile/changeImage/{user}', 'UserController@changeImage')->middleware(\App\Http\Middleware\LoginMidelware::class)->name("changeImage");



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/**
 * view shopping carts process
 */
Route::get('/view-cart','ShoppingCartController@view_cart')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('view-cart');

Route::get('/asd/asd',function (){
    return "AhmedMAHROUS";
});

/**
 * test python API
 */
Route::get("/py/","Controller@callPythonTest");

/**
 * call python APIs
 */

Route::get("/saveDesign/{product}","CallPythonAPIsController@saveChanges")->middleware(\App\Http\Middleware\LoginMidelware::class)->name("saveChanges");

/**
 * call add text
 */
Route::get("/addText/{product}","CallPythonAPIsController@addText")->middleware(\App\Http\Middleware\LoginMidelware::class)->name("addText");


Route::get('/customization/saveResult/{product}','CallPythonAPIsController@saveResult')->middleware(\App\Http\Middleware\LoginMidelware::class)->name("CustomizationSaveResult");
/**
 * End Call To Python Section
 */

/**
 * customization
 */


Route::get("/customization/viewCustomization/{product}","CustomizationController@viewCustomizationLayout");


Route::get("/test",function (){
    return view("test");
});


/**
 * Data Mining Algorithm
 */

Route::get('/FPTreeAlgorithm','DMController@FPTreeAlgorithm');
