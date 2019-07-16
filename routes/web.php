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

Route::get('/', function () {
    return view('welcome');
});

//login logout
Route::get('admin/login', 'UserController@getLogin');
Route::post('admin/login', 'UserController@postLogin')->name('admin.login');
Route::get('admin/logOut', 'UserController@getLogout');

Route::group(['prefix' => 'admin','middleware'=>'loginAdmin'], function (){
    //day la route group: category
    //quan ly cac phan lien quan toi category
    Route::group(['prefix' => 'category',], function (){
        //de goi dc route add thif viet url: localhost/admin/category/add. tu cha den con nha
        Route::get('list','CategoryController@index')->name('category.list');
        //dat ten cho route dung de goi trong view khong thi dung admin/category/list
        Route::get('add', 'CategoryController@create');
        Route::post('add', 'CategoryController@store');
        Route::get('edit/{id_category}', 'CategoryController@edit');
        Route::post('update/{id_category}', 'CategoryController@update');
        Route::get('delete/{id_category}', 'CategoryController@destroy');
    });
    Route::group(['prefix' => 'product-type'], function (){
        Route::get('list','ProductTypeController@index')->name('product-type.list');
        Route::get('add', 'ProductTypeController@create');
        Route::post('add', 'ProductTypeController@store');
        Route::get('edit/{id_product_type}', 'ProductTypeController@edit');
        Route::post('update/{id_product_type}', 'ProductTypeController@update');
        Route::get('delete/{id_product_type}', 'ProductTypeController@destroy');
    });
    Route::group(['prefix' => 'product'], function (){
        Route::get('list','ProductController@index')->name('product.list');
        Route::get('add', 'ProductController@create');
        Route::post('add', 'ProductController@store');
        Route::get('edit/{id_product}', 'ProductController@edit');
        Route::post('update/{id_product}', 'ProductController@update');
        Route::get('delete/{id_product}', 'ProductController@destroy');
    });
    Route::group(['prefix' => 'user'], function (){
        Route::get('list','UserController@index')->name('user.list');
        Route::get('add', 'UserController@create');
        Route::post('add', 'UserController@store');
        Route::get('edit/{id_user}', 'UserController@edit');
        Route::post('update/{id_user}', 'UserController@update');
        Route::get('delete/{id_user}', 'UserController@destroy');
    });

});
