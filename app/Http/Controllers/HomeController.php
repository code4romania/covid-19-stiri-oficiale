<?php

namespace App\Http\Controllers;

use App\DecisionsLegislation;
use App\NewsInfo;
use App\RecordVideo;
use App\UsefulTool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $output['DecisionsLegislation']=DecisionsLegislation::get();
        $output['NewsInfo']=NewsInfo::get();
        $output['RecordVideo']=RecordVideo::get();
        $output['Tool']=UsefulTool::get();
        dd($output);

    }
}
