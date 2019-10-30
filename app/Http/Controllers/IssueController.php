<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;

class IssueController extends Controller
{
    public function listAction(Request $request)
    {

        return view('issues', [
            'filter' => $request->get('filter'),
            'issues' => Issue::filter($request->get('filter'))
                ->with('project')
                ->orderBy('original_created_at', 'desc')->paginate(20)
        ]);
    }
}
