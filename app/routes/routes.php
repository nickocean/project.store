<?php

namespace App\Routes;

use Src\Route\Route;

Route::get('/', 'PagesController@index');
Route::get('/basket', 'PagesController@basket');
Route::get('/product', 'PagesController@product');

