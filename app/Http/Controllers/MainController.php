<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Issue;
use App\Label;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    public function __construct()
    {
        $languages = Project::distinct()->get('language');

        View::share('all_languages', $languages);
    }

    public function main()
    {

        //a board is a collection of issues.
        $boards = [];
        $count = 2;

        //newest issues
        $newest_issues = Issue::orderBy('original_created_at', 'desc')->take(4)->get();


        //get issues by languages
        $featured_languages = ['JavaScript', 'Python', 'PHP', 'Ruby', 'Go', 'TypeScript'];
        foreach ($featured_languages as $language) {
            $boards[] = [
                'language' => $language,
                'issues' => Issue::where('project_language', $language)->orderBy('original_created_at', 'desc')->take($count)->get()
            ];
        }

        //get issues by labels
        $second_level_boards = [];
        $featured_labels = ['good first issue', 'documentation'];
        $count = 3;

        foreach ($featured_labels as $label_name) {
            $label = Label::where('name', $label_name)->first();

            if ($label) {
                $second_level_boards[] = [
                    'label' => $label_name,
                    'issues' => $label->issues()->orderBy('original_created_at', 'desc')->take($count)->get()
                ];
            }
        }

        return view('index', [
            'newest_issues' => $newest_issues,
            'boards' => $boards,
            'second_level_boards' => $second_level_boards
        ]);
    }

    public function issues(Request $request)
    {

        return view('issues', [
            'filter' => $request->get('filter'),
            'issues' => Issue::filter($request->get('filter'))
                ->with('project')
                ->orderBy('original_created_at', 'desc')->paginate(20)
        ]);
    }

    public function labelsAll()
    {
        return view('labels', [
            'labels' => Label::all()
        ]);
    }

    public function projectsAll()
    {
        return view('projects', [
            'projects' => Project::with('issues')->orderBy('stars', 'desc')->paginate(20)
        ]);
    }

}
