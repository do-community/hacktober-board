<?php

namespace App\Http\Controllers;

use App\Label;

class LabelController extends Controller
{
    public function index()
    {
        return view('label.list', [
            'labels' => Label::all()
        ]);
    }

    public function show($label)
    {
        $label = Label::where('slug', $label)->first();

        return view('label.show', [
            'label' => $label,
            'issues' => $label->issues()->orderBy('original_created_at', 'desc')->paginate()
        ]);
    }
}
