<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Reservation;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class ManagerManagementController extends Controller
{
    public function reservationListIndex ()
    {
        $user = Auth::user();
        $managements = Management::where('user_id',$user->id)->get();
        $management = Management::where('user_id',$user->id)->first();

        $format_date = Carbon::now()->format('Y-m-d');
        $reservations = Reservation::where('shop_id',$management->shop_id)
                                    ->where('date',$format_date)
                                    ->oldest('time')->get();

        return view('manager.reservation_list',compact('managements','reservations','format_date'));
    }

    public function search (Request $request)
    {
        $reservations = Reservation::where('shop_id',$request->shop_id)
                                    ->where('date',$request->date)
                                    ->oldest('time')->get();

        $user = Auth::user();
        $managements = Management::where('user_id',$user->id)->get();

        $format_date = $request->date;
        $search_management = $request->shop_id;

        return view('manager.reservation_list',compact('managements','format_date','reservations','search_management'));
    }

    public function mailCreateIndex ()
    {
        $user = Auth::user();
        return view('mails.mail_draft',compact('user'));
    }

    //public function index()
    //{
       // $src = base64_encode(QrCode::format('png')->size(100)->generate//('https://qiita.com/nobuhiro-kobayashi'));

       // return response('<img src="data:image/png;base64, ' . $src . '">');
    //}
}