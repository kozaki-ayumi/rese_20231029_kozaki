<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Shop;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
   public function store(ReservationRequest $request)
   {
      $reservation = $request->only(['user_id','shop_id','date','time','num_of_users']);
      Reservation::create($reservation);

      $request->session()->regenerateToken();

      return view('reservation_thanks');
   }

   public function delete(Request $request)
   {
      Reservation::find($request->reservation_id)->delete();

      $request->session()->regenerateToken();

      return redirect('/mypage')->with('message','予約をキャンセルしました。');
   }


   public function update(Request $request)
   {
      $reservation = $request->only(['date','time','num_of_users']);
      Reservation::find($request->reservation_id)->update($reservation);

      $request->session()->regenerateToken();

      return redirect('/mypage')->with('message','予約を変更しました。');
   }
}
