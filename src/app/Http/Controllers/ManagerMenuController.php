<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerMenuController extends Controller
{
    public function reservationIndex()
    {
        return view('manager.reservation_list');
    }

    public function shopPageUpdateIndex()
    {
        
        return view('manager.shoppage_update');
    }

     public function shopPageCreateIndex()
    {
        return view('manager.shoppage_create');
    }

}
