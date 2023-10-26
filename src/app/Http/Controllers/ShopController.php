<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use Carbon\Carbon;

class ShopController extends Controller
{
   public function index ()
   {
      $shops = Shop::all();
      $areas = Area::all();
      $genres = Genre::all();

      $user = Auth::user();
      $id = Auth::id();

      return view('shop_all',compact('shops','areas','genres'));
   }


   public function search(Request $request)
   {
      if($request->area_id === '0' && $request->genre_id === '0')
      {
         $shops = Shop::KeywordSearch($request->keyword)
         ->get();

         $areas = Area::all();
         $genres = Genre::all();
         $search_keyword = $request->input('keyword');
         return view('shop_all',compact('shops','areas','genres','search_keyword'));
      }
      elseif($request->area_id === '0')
      {
         $shops = Shop::where('genre_id', $request->genre_id)
         ->KeywordSearch($request->keyword)->get();

         $areas = Area::all();
         $genres = Genre::all();
         $search_genre = Genre::find($request->genre_id);
         $search_keyword = $request->input('keyword');

         return view('shop_all',compact('shops','areas','genres','search_genre','search_keyword'));
      }
      elseif($request->genre_id === '0')
      {
         $shops = Shop::where('area_id', $request->area_id)
         ->KeywordSearch($request->keyword)
         ->get();
         $areas = Area::all();
         $genres = Genre::all();
         $search_area = Area::find($request->area_id);
         $search_keyword = $request->input('keyword');

         return view('shop_all',compact('shops','areas','genres','search_area','search_keyword'));
      }
      else
      {
         $shops = Shop::where('area_id', $request->area_id)
         ->where('genre_id', $request->genre_id)
         ->KeywordSearch($request->keyword)
         ->get();

         $areas = Area::all();
         $genres = Genre::all();
         $search_area = Area::find($request->area_id);
         $search_genre = Genre::find($request->genre_id);
         $search_keyword = $request->input('keyword');
         return view('shop_all',compact('shops','areas','genres','search_area','search_genre','search_keyword'));
      }
   }


   public function detail(Shop $shop)
   {
      $data = [
      'item' => $shop,
      'id' => Auth::id(),
      'today' => Carbon::now()->format('Y-m-d'),
      ];

      return view('shop_detail',$data);
   }

}

