<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
         $items = Information::all();
        return view('pages.frontend.home',compact('items'));
    }
     public function detail($id)
    {
         $item = Information::find($id);
         $items = Information::all();
        return view('pages.frontend.detail',compact('item','items'));
    }
}
