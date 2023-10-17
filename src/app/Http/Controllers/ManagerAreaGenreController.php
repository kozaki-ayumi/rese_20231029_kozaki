<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Management;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;

class ManagerAreaGenreController extends Controller
{
    public function areaGenreIndex ()
    {        

        $areas = Area::all();
        $genres = genre::all();
        
        return view('manager.area_genre',compact('areas','genres'));
    }
    
    public function areaStore (Request $request)
    {
       $area = $request->only(['name']);
       Area::create($area);
       return back();
    }

    public function genreStore (Request $request)
    {
       $genre = $request->only(['category']);
       Genre::create($genre);
       return back();
    }

    public function areaDelete (Request $request)
    {
       Area::find($request->area_id)->delete();
       $request->session()->regenerateToken();  
       return redirect('/manager/area/delete')->with('message','地域を削除しました。');
    }

    public function genreDelete (Request $request)
    {
       Genre::find($request->genre_id)->delete();
       $request->session()->regenerateToken();  
       return redirect('/manager/genre/delete')->with('message','ジャンルを削除しました。');
    }

    
}
