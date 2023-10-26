<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    
    use HasApiTokens, HasFactory,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function bookmark_shops()
    {
        return $this->belongsToMany(shop::class, 'bookmarks', 'user_id', 'shop_id');
    }

    public function is_bookmark($shopId)
    {
        return $this->bookmarks()->where('shop_id', $shopId)->exists();
    }


    public function managements()
    {
        return $this->hasMany(Management::class);
    }

    public function management_shops()
    {
        return $this->belongsToMany(shop::class, 'managements', 'user_id', 'shop_id');
    }

    public function is_management($shopId2)
    {
        return $this->managements()->where('shop_id', $shopId2)->exists();
    }
}
