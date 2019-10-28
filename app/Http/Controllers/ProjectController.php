<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function projectsAll()
    {
        return view('projects', [
            'projects' => Project::with('issues')->orderBy('stars', 'desc')->paginate(20)
        ]);
    }
}
