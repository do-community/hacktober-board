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

Route::get('/', 'MainController@main');

Route::get('/b/{language}', 'MainController@languageBoard')->name('board.list');

Route::get('/l/{label_name}', 'MainController@labelBoard')->name('label.list');

Route::get('/l', 'MainController@labelsAll')->name('labels.all');
