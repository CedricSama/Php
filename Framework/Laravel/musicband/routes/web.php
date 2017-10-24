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
