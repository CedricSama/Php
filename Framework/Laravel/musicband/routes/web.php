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
    /* Route ::get('/', function(){
         return view('welcome');
     });*/
    Route::get('/', 'Front\MainController@index') -> name('liste_tshirt');
    Route::get('/t-shirt/{id}', 'Front\MainController@show') -> name('voir_tshirt');
    Route::get('/products/categody/{id}', 'Front\MainController@productsByCategory') -> name('product_by_cat');
    
    Route::get('/backend', 'Backend\ProductController@index') -> name('backend_homepage');
    Route::get('/backend/product/create', 'Backend\ProductController@create') -> name('backend_product_create');
    Route::post('/backend/product/store', 'Backend\ProductController@store') -> name('backend_product_store');
    Route::get('/backend/product/edit/{id}', 'Backend\ProductController@edit') -> name('backend_product_edit');
    Route::post('/backend/product/update/{id}', 'Backend\ProductController@update') -> name('backend_product_update');
    Route::get('/backend/product/delete/{id}', 'Backend\ProductController@delete') -> name('backend_product_delete');
    
    Route::get('/backend/categories', 'Backend\CategoryController@index') -> name('backend_categories');
    Route::get('/backend/category/create', 'Backend\CategoryController@create') -> name('backend_category_create');
    Route::post('/backend/category/store', 'Backend\CategoryController@store') -> name('backend_category_store');
    Route::get('/backend/category/edit/{id}', 'Backend\CategoryController@edit') -> name('backend_category_edit');
    Route::post('/backend/category/update/{id}', 'Backend\CategoryController@update') -> name('backend_category_update');
    Route::get('/backend/category/destroy/{id}', 'Backend\CategoryController@destroy') -> name('backend_category_destroy');
    
    Route::post('/panier/add', 'Front\CartController@add')->name('panier_add');
    Route::get('/panier', 'Front\CartController@index')->name('panier');
    Route::post('/panier/update/qte', 'Front\CartController@updateQte')->name('panier_qte_update');
    Route::get('/panier/delete/product/{id}', 'Front\CartController@delete')->name('panier_delete_product');
    Route::post('/panier/coupon/check', 'Front\CartController@compare') -> name('panier_check_coupon');
    
    Route::get('/backend/coupons', 'Backend\CouponController@index') -> name('backend_coupons');
    Route::get('/backend/coupon/create', 'Backend\CouponController@create') -> name('backend_coupon_create');
    Route::post('/backend/coupon/store', 'Backend\CouponController@store') -> name('backend_coupon_store');
    Route::get('/backend/coupon/edit/{id}', 'Backend\CouponController@edit') -> name('backend_coupon_edit');
    Route::post('/backend/coupon/update/{id}', 'Backend\CouponController@update') -> name('backend_coupon_update');
    Route::get('/backend/coupon/destroy/{id}', 'Backend\CouponController@destroy') -> name('backend_coupon_destroy');
    
