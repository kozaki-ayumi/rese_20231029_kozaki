<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_id',
        'date',
        'time',
        'num_of_users'
    ];

     public function shop()
    {
     return $this->belongsTo(Shop::class);
    }

    public function review(){
    return $this->hasOne('App\Models\Review');
    }
}
