<?php

namespace App\Http\Controllers;

use App\SidebarItem;
use Illuminate\Http\Request;

class SidebarItemController extends Controller
{
    public function index()
    {
        $card=SidebarItem::paginate(10);
        return view('partials.sidebar',compact('card'));
    }

}
