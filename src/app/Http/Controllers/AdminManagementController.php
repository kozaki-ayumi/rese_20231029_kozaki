<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Shop;
use App\Models\Management;



class AdminManagementController extends Controller
{
    public function index ()
    {
        $shops = Shop::all();
        return view('admin_manager_register',compact('shops'));
    }

    public function create (Request $request)
    {
       $manager = User::where('email',$request->email)->first();
       $manager->assignRole('manager');

       $manager_id = User::where('email',$request->email)->value('id');

    

       $management = [
        'user_id' => $manager_id,
        'shop_id' => $request->shop_id,
       ];
       management::create($management);

       return view('admin_manager_register_confirm');
    }
}
