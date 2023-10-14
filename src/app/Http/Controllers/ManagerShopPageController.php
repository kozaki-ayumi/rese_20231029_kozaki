<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ManagerShopPageController extends Controller
{
    public function shopListIndex ()
    {
        $user = Auth::user();
        $managements = Management::where('user_id',$user->id)->get();
        $management = Management::where('user_id',$user->id)->first();
        $shops = Shop::where('id',$management->shop_id)->get();
        return view('manager_shop_list',compact('shops'));
    }

    public function shopModify (Shop $shop)
    {
       $areas = Area::all();
       $genres = genre::all();
       $data = [
            'item' => $shop,
            'areas' => $areas,
            'genres' => $genres,
       ];

      return view('manager_shop_modify',$data);
    }

    public function updateConfirm (Request $request)
    {
        $shop_modify = $request->only(['id','name','image_url','area_id','genre_id','description']);
        $area = Area::find($request->area_id);
        $genre = Genre::find($request->genre_id);
        
        return view('manager_shop_confirm',compact('shop_modify','area','genre'));
    }

    public function update (Request $request)
    {
        $shop_confirm = $request->only(['id','name','image_url','area_id','genre_id','description']);
        Shop::find($request->id)->update($shop_confirm);

        $request->session()->regenerateToken();  
        
        return view('manager_shop_completion');
    }

     public function shopRegisterIndex ()
    {
        $areas = Area::all();
        $genres = Genre::all();

        return view('manager_shop_draft',compact('areas','genres'));

    }

    public function registerConfirm (Request $request)
    {
       
        $shop_draft = $request->only(['name','image_url','area_id','genre_id','description']);

        $area = Area::find($request->area_id);
        $genre = Genre::find($request->genre_id);

        return view('manager_shop_register',compact('shop_draft','area','genre'));

    }

    public function create (Request $request)
    {
       
        $shop = $request->only(['name','image_url','area_id','genre_id','description']);

        Shop::create($shop);

        $request->session()->regenerateToken();  

        return view('manager_shop_completion');

    }
}

    
    
