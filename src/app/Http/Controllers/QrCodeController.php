<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\BaconQrCode\Encoder\QrCode;

class QrCodeController extends Controller
{
    public function index()
    {
       $id = 10;
        return view('top', compact('id'));
       
    }
}