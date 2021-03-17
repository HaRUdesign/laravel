<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Host;
use App\Models\User;
use App\Models\Post;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

class PaymentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    //   }
    //

    public function pay(Request $request){
     Stripe::setApiKey(env('STRIPE_SECRET_KEY'));//シークレットキー

       $charge = Charge::create(array(
            'amount' => 50,
            'currency' => 'jpy',
            'source'=> request()->stripeToken,
        ));
      return back();
     }


/*単発決済用のコード*/
    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1000,
                'currency' => 'jpy'
            ));

            return back();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }







     public function show(Post $post){
      if (Auth::check()) {
        // ログイン済みのときの処理
        return view('payment.index',compact('post'));
      } else {
      // ログインしていないときの処理

      }



     }

}
