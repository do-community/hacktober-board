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

Route::get('/', 'MainController@main')->name('home');

Route::get('/i', 'IssueController@Issues')->name('issues');

Route::get('/l', 'LabelController@labelsAll')->name('labels.all');

Route::get('/p', 'ProjectController@ProjectsAll')->name('project.all');
