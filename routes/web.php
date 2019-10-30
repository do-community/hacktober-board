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

Route::get('/', 'MainController@indexAction')->name('Main.index');

Route::get('/i', 'IssueController@listAction')->name('Issue.list');

Route::get('/l', 'LabelController@listAction')->name('Label.list');

Route::get('/p', 'ProjectController@listAction')->name('Project.list');
