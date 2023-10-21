<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;


class ManagerShopPageUpdateController extends Controller
{
     public function shopPageIndex ()
    {
        return view('manager.shop_menu');
    }


   public function shopListIndex ()
    {        
        $user = Auth::user();
        $managements = Management::where('user_id',$user->id)->get();

        $shops = $user->management_shops()->get();
        return view('manager.shop_list',compact('shops'));
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
       return view('manager.shop_modify',$data);
    }

   



    public function updateConfirm (Request $request)
    {
        $shop_modify = $request->only(['id','name','image_url','area_id','genre_id','description']);
        $area = Area::find($request->area_id);
        $genre = Genre::find($request->genre_id);
        
        return view('manager.shop_confirm',compact('shop_modify','area','genre'));
    }

    public function update (Request $request)
    {
        $shop_confirm = $request->only(['id','name','image_url','area_id','genre_id','description']);
        Shop::find($request->id)->update($shop_confirm);

        $document = $request->only(['image_url']);
        $document -> store('public');

        $request->session()->regenerateToken();  
        
        return view('manager.shop_completion');
    }

}
