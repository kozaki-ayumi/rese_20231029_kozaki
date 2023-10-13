<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function store($shopId)
    {
        $user = Auth::user();
        if (!$user->is_bookmark($shopId)) {
            $user->bookmark_shops()->attach($shopId);
        }
        return back();
        
    }

     public function destroy($shopId)
    {
        $user = Auth::user();
        if ($user->is_bookmark($shopId)) {
            $user->bookmark_shops()->detach($shopId);
        }
        return back();
    }    
}
