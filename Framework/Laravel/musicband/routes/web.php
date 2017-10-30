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
    //Front
    Route::get('/', 'Front\MainController@index') -> name('liste_tshirt');
    Route::get('/t-shirt/{id}', 'Front\MainController@show') -> name('voir_tshirt');
    Route::get('/products/categody/{id}', 'Front\MainController@productsByCategory') -> name('product_by_cat');
    
    //Backend
    Route::get('/backend', 'Backend\ProductController@index') -> name('backend_homepage');
    Route::get('/backend/product/create', 'Backend\ProductController@create') -> name('backend_product_create');
    Route::post('/backend/product/store', 'Backend\ProductController@store') -> name('backend_product_store');
    Route::get('/backend/product/edit/{id}', 'Backend\ProductController@edit') -> name('backend_product_edit');
    Route::post('/backend/product/update/{id}', 'Backend\ProductController@update') -> name('backend_product_update');
    Route::get('/backend/product/delete/{id}', 'Backend\ProductController@delete') -> name('backend_product_delete');
    
    //Crud Catégories
    Route::get('/backend/categories', 'Backend\CategoryController@index') -> name('backend_categories');
    Route::get('/backend/category/create', 'Backend\CategoryController@create') -> name('backend_category_create');
    Route::post('/backend/category/store', 'Backend\CategoryController@store') -> name('backend_category_store');
    Route::get('/backend/category/edit/{id}', 'Backend\CategoryController@edit') -> name('backend_category_edit');
    Route::post('/backend/category/update/{id}', 'Backend\CategoryController@update') -> name('backend_category_update');
    Route::get('/backend/category/destroy/{id}', 'Backend\CategoryController@destroy') -> name('backend_category_destroy');
    
    //Panier
    Route::post('/panier/add', 'Front\CartController@add')->name('panier_add');
    Route::post('/panier/addOne', 'Front\CartController@addOne')->name('panier_add_one');
    Route::get('/panier', 'Front\CartController@index')->name('panier');
    Route::post('/panier/update/qte', 'Front\CartController@updateQte')->name('panier_qte_update');
    Route::get('/panier/delete/product/{id}', 'Front\CartController@delete')->name('panier_delete_product');
    Route::post('/panier/coupon/check', 'Front\CartController@compare') -> name('panier_check_coupon');
    
    //Crud Coupons de réductions
    Route::get('/backend/coupons', 'Backend\CouponController@index') -> name('backend_coupons');
    Route::get('/backend/coupon/create', 'Backend\CouponController@create') -> name('backend_coupon_create');
    Route::post('/backend/coupon/store', 'Backend\CouponController@store') -> name('backend_coupon_store');
    Route::get('/backend/coupon/edit/{id}', 'Backend\CouponController@edit') -> name('backend_coupon_edit');
    Route::post('/backend/coupon/update/{id}', 'Backend\CouponController@update') -> name('backend_coupon_update');
    Route::get('/backend/coupon/destroy/{id}', 'Backend\CouponController@destroy') -> name('backend_coupon_destroy');
    Route::get('backend/commandes', 'Backend\CommandeController@index') -> name('commandes');
    Route::get('backend/commande/{id}', 'Backend\CommandeController@show') -> name('commande_show');
    
    //Passer une commande
    Route::get('/order', 'Front\OrderController@index') -> name('order');
    Route::post('/order/validation', 'Front\OrderController@createCommande') -> name('order_validation');
    Route::get('/order/merci', 'Front\OrderController@merci') -> name('merci');
    
    //mail
    Route::get('/mailable', function () {
        $invoice = App\Commande::find(1);
        return new App\Mail\OrderNew($invoice);
    });
    
    //Authentification
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
    
    //MiddleWare (controle des paths qui sont accecible qu'en Admin)
    Route::middleware(['auth.admin'])->group(function(){
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
        Route::get('/backend/coupons', 'Backend\CouponController@index') -> name('backend_coupons');
        Route::get('/backend/coupon/create', 'Backend\CouponController@create') -> name('backend_coupon_create');
        Route::post('/backend/coupon/store', 'Backend\CouponController@store') -> name('backend_coupon_store');
        Route::get('/backend/coupon/edit/{id}', 'Backend\CouponController@edit') -> name('backend_coupon_edit');
        Route::post('/backend/coupon/update/{id}', 'Backend\CouponController@update') -> name('backend_coupon_update');
        Route::get('/backend/coupon/destroy/{id}', 'Backend\CouponController@destroy') -> name('backend_coupon_destroy');
        Route::get('backend/commandes', 'Backend\CommandeController@index') -> name('commandes');
        Route::get('backend/commande/{id}', 'Backend\CommandeController@show') -> name('commande_show');
    });
    
    
