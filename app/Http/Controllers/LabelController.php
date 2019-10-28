<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Label;

class LabelController extends Controller
{
    public function labelsAll()
    {
        return view('labels', [
            'labels' => Label::all()
        ]);
    }
}
