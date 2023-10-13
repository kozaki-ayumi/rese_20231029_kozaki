<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminShopPageController extends Controller
{
    public function adminIndex ()
    {
        
        $areas = Area::all();
        $genres = Genre::all();
   
        

        return view('shop_page_create',compact('areas','genres'));
    }
}
