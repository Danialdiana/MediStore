<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function confirm(Cart $cart){
        $cart->update([
            'sales'=>"Ryksat"
        ]);
        return back()->with('message','Ryksat berildi!');
    }

    public function payment(){
        return view('payment.index');

    }
}
