<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripePaymentsController extends Controller
{
    public function index()
    {
        return view('manager.payment_amount');
    }

    public function amount(Request $request)
    {
        $amount = $request->validate([
                'amount' => 'required|numeric',
                ]);
        return view('manager.payment',compact('amount'));
    }

    public function payment(Request $request)
    {
        try{
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array('email'=>$request->stripeEmail,
            'source' => $request->stripeToken)
            );

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->amount,
                'currency' => 'jpy')
            );

        } catch (Exception $e) {
            return back()->with('flash_alert', '決済に失敗しました！('. $e->getMessage() . ')');
        }
        return view('manager.payment_completion');
    }
}
