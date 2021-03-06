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

//Route::get('/', function () {
//    return view('admin.masterAdmin');
//})->name('home');//->middleware(\App\Http\Middleware\LoginMidelware::class);

Route::get('/tes',function (){
    return view('user.categoryPublic');
});

Route::get('/   ','CategoryController@viewCategory')->name('h');
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
Route::get('/view-cart/delete/{cart}','ShoppingCartController@delete_cart')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('view-cart.delete');
Route::get('/checkout/{user}','ShoppingCartController@checkout')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('checkout');
Route::get('/checkout/{user}/place_order','OrderController@place_order')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('place_order');
Route::get('/checkout/{user}/place_order/invoice_print/{order}','OrderController@invoice_print')->middleware(\App\Http\Middleware\LoginMidelware::class)->name('invoice_print');

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

    return auth()->user()->messagesToMe;
    return auth()->user()->messagesFromMe;
    return view("test");
});


/**
 * Data Mining Algorithm
 */

Route::get('/FPTreeAlgorithm','DMController@FPTreeAlgorithm')->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('FPTree');


/**
 * Admin routes
 */



Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard')->middleware("admin");

Route::get('/admin/dashboard/allOrders','AdminController@allOrders')->name('allOrders')->middleware("admin");
Route::get('/admin/dashboard/allUpdatedProducts','AdminController@allUpdatedProducts')->name('allUpdatedProducts')->middleware("admin");

Route::post('/admin/dashboard/allUpdatedProducts/{product}/save','AdminController@saveChanges');


Route::get("/","HomeController@index")->name("home");


/**
 * messages routes
 */
Route::get("/admin/messages","AdminController@messages")->name("messages");

Route::get("/admin/getMessages/{userID}/{authID}","MessageController@getMessages");

Route::get("/admin/writing/{userID}/{authID}","WritingController@userWriteing")->name("userWriteing");
Route::get("/admin/writingFalse/{userID}/{authID}","WritingController@userWriteingFalse")->name("userWriteingFalse");
Route::get("/admin/isWriting/{authID}","WritingController@isWriting")->name("isWriting");

Route::get("/AMassage","MessageController@AMassage");


 /**
  * chat
  */

 Route::get("/testChat",function (){
    // broadcast(new \App\Events\WebsocketDemoEvent("some Data Ahmed"));
    broadcast(new MessageSend(\App\message::first()));
    return view("welcome");
 });

 Route::get("/chats/{user?}","ChatController@index")->name("chats");
 Route::get("/messages","ChatController@fetchMessages");

 Route::get("/userMessages/{sender}/{recever}","ChatController@userMessages");

 Route::post("/messageSend/{user}","ChatController@messageSend");

 Route::get("/user/typing/{userID}/{authID}","ChatController@typing");
 Route::get("/user/typingFalse/{userID}/{authID}","ChatController@typingFalse");


 Route::get("/ttt",function (){
     return \App\User::with("unseenMessages")->get();
 });

 Route::get("/chats/users",function(){

 });


Route::get("/admin/categories/create_category","CategoryController@CreateCategory")
     ->name("categories.create_category")->middleware("admin");

Route::post("/admin/categories/create_category","CategoryController@SaveCategory")
     ->name("categories.save_category")->middleware("admin");
Route::get("/admin/categories/create_brand","CategoryController@CreateBrand")
    ->name("categories.create_brand")->middleware("admin");
Route::post("/admin/categories/create_brand","CategoryController@SaveBrand")
    ->name("categories.save_brand")->middleware("admin");
Route::get("/admin/categories/browse_brands","CategoryController@BrowseBrand")
    ->name("categories.browse_brand")->middleware("admin");


Route::get("/admin/products/create_product","ProductController@CreateProduct")
    ->name("products.create_product")->middleware("admin");
Route::post("/admin/products/create_product","ProductController@SaveProduct")
    ->name("products.save_product")->middleware("admin");
Route::get("/admin/products/browse_products","ProductController@BrowseProducts")
    ->name("products.browse_products")->middleware("admin");
Route::get("/admin/products/{product}/add_color","ProductColorsController@addColor")
    ->name("products.add_color")->middleware("admin");
Route::get("/admin/products/delete_product/{product}","ProductController@deleteProduct")
    ->name("products.delete_product")->middleware("admin");
Route::post("/admin/products/{product}/add_color","ProductColorsController@SaveColor")
    ->name("products.save_color")->middleware("admin");
//update product
Route::get("/admin/products/update_product/{product}","ProductController@updateProduct")
    ->name("products.update_product")->middleware("admin");
Route::get("/admin/products/save_update_product/{product}","ProductController@saveUpdateProduct")
    ->name("products.save_update_product")->middleware("admin");

Route::get("/search_form","SearchController@SearchForm")
    ->name("search.search_form");
Route::post("/search_form","SearchController@SearchResult")
    ->name("search.search_result");
