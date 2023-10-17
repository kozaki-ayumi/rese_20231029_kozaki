<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
          protected $fillable = [
         'name',
         'area_id',
         'genre_id',
         'description',
         'image_url'
       ];

     public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
        $query->where('name', 'like', '%' . $keyword . '%');
        }
    }   

    public function area(){
    return $this->belongsTo('App\Models\Area');
    }


    public function genre(){
    return $this->belongsTo('App\Models\Genre');
    }

   

    public function bookmark(){
    return $this->hasMany('App\Models\Bookmark');
    }

    public function bookmark_shops()
    {
        $articles = \Auth::user()->bookmark_shops()->get();
        $data = [
            'shops' => $shops,
        ];
        return view('shops.bookmarks', $data);
    }

     public function management(){
    return $this->hasMany('App\Models\Mangement');
    }

    public function management_shops()
    {
        $articles2 = \Auth::user()->management_shops()->get();
        $data2 = [
            'shops' => $shops,
        ];
        return view('shops.bookmarks', $data2);
    }
}
