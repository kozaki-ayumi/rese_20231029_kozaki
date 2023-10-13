<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Bookmark;
use Carbon\Carbon;



class MenuController extends Controller
{
    public function index()
    {
        return view('guest_menu');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }
    
    public function index2()
    {
        
        return view('member_menu');
    }

    public function myPageIndex(Request $request)
   {

    $user = Auth::user();
    $user_id = Auth::id();

    $today = Carbon::now()->format('Y-m-d');
    $before_threeMonth = Carbon::now()->subMonth(3);
    $reservations = Reservation::where('user_id',$user_id)
    ->where('date','>=',$today)->oldest('date')->get();
    $reservationPasts = Reservation::where('user_id',$user_id)
    ->where('date','>',$before_threeMonth)
    ->where('date','<',$today)->latest('date')->get();

    $shops = $user->bookmark_shops()->get();
    return view('my_page',compact('user','reservations','reservationPasts','shops','today'));
   }
}
