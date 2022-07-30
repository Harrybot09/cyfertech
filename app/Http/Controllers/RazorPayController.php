<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;

class RazorPayController extends Controller
{
        
    public function razorpay()
    {        
        return view('index');
    }

    public function payment(Request $request)
    {   
        $request->razorpay_payment_id;  

        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        dd($payment);

        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } 
            catch (\Exception $e) 
            {
                // return  $e->getMessage();
                // \Session::put('error',$e->getMessage());
                // return redirect()->back();
            }            
        }
                $payment2 = $api->payment->fetch($input['razorpay_payment_id']);
                dd($payment2);
      
    }
}
