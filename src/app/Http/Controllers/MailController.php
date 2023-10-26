<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;

class MailController extends Controller
{
    public function mailCreateIndex ()
    {
        $user = Auth::user();
        return view('mails.mail_draft',compact('user'));
    }
    
    public function send(Request $request)
    {

        $data = $request->validate([
            'manager_email' =>'required',
            'title'=>'required|string|max:255',
            'content' => 'required|string',
        ]);

        $emails = User::select('email')->get();
        Mail::to($emails)->send(new SendMail($data));
        return view('mails.mail_complete');
    }
}
