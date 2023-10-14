<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class TestMailController extends Controller
{
    public function send(Request $request)
    {
        $email = 'test@sample.com';

        Mail::send(new TestMail($email));

        return view('reservation_thanks');
    }
}
