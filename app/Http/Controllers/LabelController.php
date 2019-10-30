<?php

namespace App\Http\Controllers;

use App\Label;

class LabelController extends Controller
{
    public function listAction()
    {
        return view('label.list', [
            'labels' => Label::all()
        ]);
    }
}
