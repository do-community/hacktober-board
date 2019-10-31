<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.list', [
            'projects' => Project::with('issues')->orderBy('stars', 'desc')->paginate(20)
        ]);
    }
}
