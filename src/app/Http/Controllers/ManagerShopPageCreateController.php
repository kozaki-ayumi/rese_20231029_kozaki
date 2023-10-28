<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
//use Illuminate\Support\Str;
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

    public function registerConfirm (ShopRequest $request)
    {
        $shop_draft = $request->only(['name','image_url','area_id','genre_id','description']);
        $imgtitlename=$request->image_url->getClientOriginalName();
        $shop_img = $request->image_url->storeAs('public',$imgtitlename,);

        $area = Area::find($request->area_id);
        $genre = Genre::find($request->genre_id);

        return view('manager.shop_register',compact('shop_draft','area','genre','imgtitlename'));
    }

    public function create (Request $request)
    {
        if ($request->get('action') === 'back') {

            return redirect()->route('form.register')->withInput();
        }

        $shop = $request->only(['name','image_url','area_id','genre_id','description']);
        Shop::create($shop);

        $newShop = Shop::latest()->first();
        $user = Auth::user();
        Management::create([
            'user_id' => $user->id,
            'shop_id' => $newShop->id
        ]);

        $request->session()->regenerateToken();

        return view('manager.shop_completion');
    }
}
