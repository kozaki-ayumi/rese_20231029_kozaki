<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;

    protected $table = 'Managements'; 

    protected $fillable = [
         'user_id',
         'shop_id'
       ];


    public function user(){
    return $this->belongsTo('App\Models\User');
    }

    public function shop(){
    return $this->belongsTo('App\Models\Shop');
    }

}
