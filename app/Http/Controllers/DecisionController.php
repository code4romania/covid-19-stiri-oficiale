<?php

namespace App\Http\Controllers;

use App\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function index ()
    {
        $data = Decision::paginate(10);
        return view('decision.index', compact('data'));
    }

    public function show ($slug)
    {
        $data = Decision::where('slug', $slug);
        return view('decision.show', compact('data'));

    }
}
