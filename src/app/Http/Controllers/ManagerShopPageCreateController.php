<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ManagerShopPageCreateController extends Controller
{
     public function shopRegisterIndex ()
    {
        $areas = Area::all();
        $genres = Genre::all();

        return view('manager.shop_draft',compact('areas','genres'));

    }

    public function registerConfirm (Request $request)
    {
       
        $shop_draft = $request->only(['name','image_url','area_id','genre_id','description']);

        $area = Area::find($request->area_id);
        $genre = Genre::find($request->genre_id);

        return view('manager.shop_register',compact('shop_draft','area','genre'));

    }

    public function create (Request $request)
    {
       if ($request->get('action') === 'back') {
            return redirect()->route('form.register')->withInput();
        }
        
        $shop = $request->only(['name','image_url','area_id','genre_id','description']);

        Shop::create($shop);

        $request->session()->regenerateToken();  

        return view('manager.shop_completion');

    }
}
