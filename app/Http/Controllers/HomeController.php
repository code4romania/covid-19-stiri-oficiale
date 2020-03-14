<?php

namespace App\Http\Controllers;

use App\DecisionsLegislation;
use App\NewsInfo;
use App\Video;
use App\SidebarItem;
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
        $output['DecisionsLegislation'] = DecisionsLegislation::get();
        $output['NewsInfo'] = NewsInfo::get();
        $output['RecordVideo'] = Video::get();
        $output['Tool'] = SidebarItem::get();
        dd($output);
    }
}
