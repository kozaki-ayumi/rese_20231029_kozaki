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

        //Imgpath::create([
      //'imgpaths' => $request->file('image_url')->storeAs('shop',$imgtitlename),
     //]);
     
        //$data = Imgpath::create($shop_img);

        //$file = $request->file('image_url');
        //$imgtitlename=$request->image_url->getClientOriginalName();
        //$extension = $file->getClientOriginalExtension();
        //$file_token = Str::random(32);
        //$filename = $file_token . '.' . $extension;
        //$shop_draft['image_url'] =  $imgtitlename;
        //$shop_draft['image_url'] =  $filename;
        //$file->move('uploads/shops', $imgtitlename);
        

        $area = Area::find($request->area_id);
        $genre = Genre::find($request->genre_id);

        return view('manager.shop_register',compact('shop_draft','area','genre','imgtitlename'));
    }

    public function create (Request $request)
    {
        if ($request->get('action') === 'back') {
            //$back_area = $request->area_id;
            //$back_genre = $request->genre_id;

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

        //$dir = 'shop';
        //$request->file('image_url')->store('public/' . $dir);

        $request->session()->regenerateToken();

        return view('manager.shop_completion');

    }
}
