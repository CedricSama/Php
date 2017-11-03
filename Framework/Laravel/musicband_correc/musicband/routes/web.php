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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/mailable', function () {
    $commande = App\Commande::find(6);

    return new App\Mail\OrderNew($commande);
});


Route::get('/','Front\MainController@index')->name('homepage');
Route::get('/t-shirt/{id}','Front\MainController@show')->name('voir_tshirt');
Route::get('/products/category/{id}','Front\MainController@productsByCategory')->name('producs_by_cat');

// Process de commande
Route::get('/commande','Front\OrderController@index')->name('commande');
Route::post('/commande/validation','Front\OrderController@createCommande')->name('commande_validation');
Route::get('/commande/merci','Front\OrderController@merci')->name('commande_merci');


// PAnier
Route::post('/panier/add','Front\CartController@add')->name("panier_add");
Route::get('/panier','Front\CartController@index')->name("panier");
Route::post('/panier/update/qte','Front\CartController@updateQte')->name("panier_update_qte");
Route::get('/panier/delete/product/{id}','Front\CartController@delete')->name("panier_delete_product");
Route::post('/panier/coupon/check','Front\CartController@checkCoupon')->name("panier_check_coupon");

Route::middleware(['auth.admin'])->group(function(){
    Route::get('/backend','Backend\ProductController@index')->name('backend_homepage');
Route::get('/backend/product/create','Backend\ProductController@create')->name('backend_product_create');
Route::post('/backend/product/store','Backend\ProductController@store')->name('backend_product_store');
Route::get('/backend/product/edit/{id}','Backend\ProductController@edit')->name('backend_product_edit');
Route::post('/backend/product/update/{id}','Backend\ProductController@update')->name('backend_product_update');
Route::get('/backend/product/destroy/{id}','Backend\ProductController@destroy')->name('backend_product_destroy');
Route::get('/backend/categories','Backend\CategoryController@index')->name('backend_categories_index');
Route::get('/backend/category/create','Backend\CategoryController@create')->name('backend_category_create');
Route::post('/backend/category/store','Backend\CategoryController@store')->name('backend_category_store');
Route::get('/backend/category/edit/{id}','Backend\CategoryController@edit')->name('backend_category_edit');
Route::post('/backend/category/update/{id}','Backend\CategoryController@update')->name('backend_category_update');
Route::get('/backend/category/destroy/{id}','Backend\CategoryController@destroy')->name('backend_category_destroy');
Route::get('/backend/coupons','Backend\CouponController@index')->name('coupon_index');
Route::get('/backend/coupons/create','Backend\CouponController@create')->name('coupon_create');
Route::post('/backend/coupons/store','Backend\CouponController@store')->name('coupon_store');
Route::get('/backend/coupon/edit/{id}','Backend\CouponController@edit')->name('coupon_edit');
Route::post('/backend/coupon/update/{id}','Backend\CouponController@update')->name('coupon_update');
Route::get('/backend/coupon/destroy/{id}','Backend\CouponController@destroy')->name('coupon_destroy');
Route::get('/backend/commandes','Backend\CommandeController@index')->name('commandes');
Route::get('/backend/commande/{id}','Backend\CommandeController@show')->name('commande_show');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
