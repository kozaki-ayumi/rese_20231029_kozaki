<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;


class AdminManagementController extends Controller
{
    public function index ()
    {
        //return view('mails.mail_draft');
        return view('admin_manager_register');
    }

    public function create (Request $request)
    {
        $manager = User::create([
                    'name' => 'Manager',
                    'email' => $request->email,
                    'email_verified_at' => '2023-10-01 00:00:00',
                    'password' => Hash::make('password'),
                    ]);
        $manager->assignRole('manager');

        $request->session()->regenerateToken();

        return view('admin_manager_register_confirm');
    }

     public function mailCreateIndex ()
    {
        $user = Auth::user();
        return view('mails.mail_draft',compact('user'));
    }
}
