<?php
use Illuminate\Support\Facades\Route;
use App\Issue;
use App\User;

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

    $limit = 4;

    //get PHP issues
    $php_issues = Issue::where('project_language', 'PHP')->take($limit)->get();

    //get JS issues
    $js_issues = Issue::where('project_language', 'JavaScript')->take($limit)->get();

    //get Python issues
    $python_issues = Issue::where('project_language', 'Python')->take($limit)->get();

    //get TypeScript issues
    $ts_issues = Issue::where('project_language', 'TypeScript')->take($limit)->get();



    //get CSS issues
    $css_issues = Issue::where('project_language', 'CSS')->take(2)->get();

    //get GO issues
    $go_issues = Issue::where('project_language', 'CSS')->take(2)->get();

    //get C++ issues
    $cplus_issues = Issue::where('project_language', 'C++')->take(2)->get();


    //get Ruby issues
    $ruby_issues = Issue::where('project_language', 'Ruby')->take(2)->get();

    return view('index', [
        'php_issues' => $php_issues,
        'js_issues'  => $js_issues,
        'python_issues' => $python_issues,
        'go_issues' => $go_issues,
        'css_issues' => $css_issues,
        'ruby_issues' => $ruby_issues,
        'ts_issues' => $ts_issues,
        'cplus_issues' => $cplus_issues,
    ]);
});

