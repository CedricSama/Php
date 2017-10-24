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
   Route::get('/', 'Front\MainController@index')->name('liste_tshirt');
   Route::get('/t-shirt/{id}', 'Front\MainController@show')->name('voir_tshirt');
   Route::get('/backend', 'Backend\ProductController@index')->name('backend_homepage');
   Route::get('/backend/product/create', 'Backend\ProductController@create')->name('backend_product_create');
   Route::post('/backend/product/store', 'Backend\ProductController@store')->name('backend_product_store');
   Route::get('/backend/product/edit/{id}', 'Backend\ProductController@edit')->name('backend_product_edit');
   Route::post('/backend/product/update/{id}', 'Backend\ProductController@update')->name('backend_product_update');
   Route::get('/backend/product/delete/{id}', 'Backend\ProductController@delete')->name('backend_product_delete');
