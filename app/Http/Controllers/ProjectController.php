<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    public function listAction()
    {
        return view('projects', [
            'projects' => Project::with('issues')->orderBy('stars', 'desc')->paginate(20)
        ]);
    }
}
