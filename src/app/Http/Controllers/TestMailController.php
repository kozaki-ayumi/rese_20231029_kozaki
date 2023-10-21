<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\User;

class TestMailController extends Controller
{
    public function send(Request $request)
    {

        $data = $request->validate([
            'manager_email' =>'required',
            'shop_name' =>'required',
            'title'=>'required|string|max:255',
            'content' => 'required|string',
        ]);

        $emails = User::select('email')->get();
        Mail::to($emails)->send(new TestMail($data));
        return view('reservation_thanks');
    }

}
