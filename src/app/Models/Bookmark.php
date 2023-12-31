<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_id'
    ];

    public function shop(){
    return $this->belongsTo('App\Models\Shop');
    }

    public function User(){
    return $this->belongsTo('App\Models\User');
    }

}


