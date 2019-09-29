<?php
use Illuminate\Support\Facades\Route;
use App\Issue;
use App\Label;

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

    //a board is a collection of issues.
    $boards = [];
    $count = 2;

    //get issues by languages
    $featured_languages = [ 'JavaScript', 'Python', 'PHP', 'Go', 'Ruby', 'TypeScript' ];
    foreach ($featured_languages as $language) {
        $boards[] = [
            'language' => $language,
            'issues' => Issue::where('project_language', $language)->take($count)->get()
        ];
    }

    //get issues by labels
    $second_level_boards = [];
    $featured_labels = [ 'good first issue', 'help wanted', 'beginner', 'documentation' ];
    $count = 3;

    foreach ($featured_labels as $label_name) {
        $label = Label::where('name', $label_name)->first();

        if ($label) {
            $second_level_boards[] = [
                'label' => $label_name,
                'issues' => $label->issues->take($count)
            ];
        }
    }

    return view('index', [
        'boards' => $boards,
        'second_level_boards' => $second_level_boards
    ]);
});

