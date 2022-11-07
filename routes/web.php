<?php

use Illuminate\Support\Facades\Route;

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


/*роутинг crud коллекций*/
Route::resource('collection', 'CollectionController');

/*страница подтверждения удаления коллекции*/
Route::get('/collection/{id}/destroy', 'CollectionController@destroy_show');

/*роутинг crud товаров*/
Route::resource('goods', 'GoodsController');

/*страница подтверждения удаления товара*/
Route::get('/goods/{id}/destroy', 'GoodsController@destroy_show');

/*страница просмотра коллекций и товаров*/
Route::get('/show', 'MainController@show');

