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

    public function show($project)
    {
        $project = Project::where('full_name', $project)->first();

        return view('project.show', [
            'project' => $project,
            'issues' => $project->issues()->orderBy('original_created_at', 'desc')->paginate()
        ]);
    }
}
