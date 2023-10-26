<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
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

    public function shopModify (Request $request)
    {
        $areas = Area::all();
        $genres = genre::all();
        $shop = Shop::find($request->id);
        $data = [
            'item' => $shop,
            'areas' => $areas,
            'genres' => $genres,
        ];
        return view('manager.shop_modify',$data);


    }


    //public function shopModify (Shop $shop)
    //{
       // $areas = Area::all();
       // $genres = genre::all();
       // $data = [
        //    'item' => $shop,
        //    'areas' => $areas,
         //   'genres' => $genres,
        //];
       // return view('manager.shop_modify',$data);
    //}

    public function updateConfirm (Request $request)
    {

        if($request->new_image_url === null){
            $shop_modify = $request->only(['id','name','old_image_url','area_id','genre_id','description']);

            $area = Area::find($request->area_id);
            $genre = Genre::find($request->genre_id);

            return view('manager.shop_confirm',compact('shop_modify','area','genre'));

        }else{
            $shop_modify = $request->only(['id','name','old_image_url','new_image_url','area_id','genre_id','description']);

            $area = Area::find($request->area_id);
            $genre = Genre::find($request->genre_id);

            $imgtitlename=$request->new_image_url->getClientOriginalName();
            $shop_img = $request->new_image_url->storeAs('public',$imgtitlename,);

            return view('manager.shop_confirm',compact('shop_modify','area','genre','imgtitlename'));
        }
    }

    public function update (Request $request)
    {

        if ($request->get('action') === 'back') {

            $shop_modify = $request->only(['old_image_url']);;
            return redirect()->route('form.modify')->withInput();
        }

        $shop_confirm = $request->only(['id','name','image_url','area_id','genre_id','description']);
        Shop::find($request->id)->update($shop_confirm);

        //$document = $request->only(['image_url']);
        //$document -> store('public');

        $request->session()->regenerateToken();

        return view('manager.shop_completion');
        }
    }
