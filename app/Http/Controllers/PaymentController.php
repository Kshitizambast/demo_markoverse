<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function create()
    {        
        return view('payment.payWithRazorpay');
    }

    public function paymentFromRazorpay(Request $request)
    {
        $input = $request->all();
        $endpoint = 'https://api.razorpay.com/v1/orders';
       

        $response = Http::withHeaders([
                            'Content-Type' => 'application/json'
                        ])->post($endpoint, [
                            "amount" => $request->amount,
                            "currency" => $request->currency,
                            "receipt" => $request->receipt
                        ]);
        return $response;
    }

    public function payment(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZOR_LIVE_KEY'), env('RAZOR_LIVE_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        
        \Session::put('success', 'Payment successful');
        return redirect()->back();
    }

    public function saveCard(Request $request)
    {
        $endpoint = 'https://api.razorpay.com/v1/customers';
        $header = 'Content-Type: application/json';


        $response = Http::withHeader([
                        'Content-Type' => 'application/json'
                    ])
                    ->post($endpoint, [
                        
                    ]);
    }


}
