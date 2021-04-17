<?php

namespace App\Http\Controllers;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use Carbon\Carbon;
use App\User;
use App\MyShop;
use App\DailySells;

class BillPaymentController extends Controller
{
    //
    public function index()
    {
    	return view('payment.index');
    }

    public function recentlyPaidShop(Request $request)
    {
    	//$user = User::find($request->user_id);
   		$recentlyPaidShops = DB::select('select distinct my_shop_id from daily_sells where customer_id = '.$request->user_id .' order by updated_at DESC');

   		$recentlyPaidShopArray = [];
   		foreach ($recentlyPaidShops as $value) {
   			array_push($recentlyPaidShopArray, MyShop::find($value->my_shop_id));
   		}

		$allShops = MyShop::all();

		$fetchedResult = array('recently_paid' => $recentlyPaidShopArray, 'all_shops' => $allShops );
		return response($fetchedResult, 200);
 
    }

    public function fetchMerchants(Request $request)
    {
    	$request->validate(['shopsearch' => 'required|string']);

    		$shops = DB::table('my_shops')->where('shop_name','LIKE','%'.$request->shopsearch."%")->get();


    	
    	return response($shops, 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function paymentFromRazorpay(Request $request)
    {
        
        //$endpoint = 'https://api.razorpay.com/v1/orders';
        
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $request->validate([
        			'receipt' => 'required|string',
        			'amount' => 'required|numeric',
        			'currency' => 'required|string',
        			'shop_id'  => 'required|numeric'		
        ]);


        $order  = $api->order->create([
					  'receipt'  => $request['receipt'],
					  'amount'   => $request['amount'],
					  'currency' => $request['currency']
					]);

        //return $order['id']; 


        $ds = DailySells::create([

        	'customer_id' => 1,
        	'my_shop_id' => $request['shop_id'],
        	'payment_id' => 1,
     		'payble'    => $request['amount'], 
        	'salesTax' => 1,
        	'reference_code'=> 'JDJD',
        	'error_msg' => 1,
        	'order_id' => $order['id'],

        ]);

        $json_array = array('rp_order_id' => $ds->order_id, 'rp_amount' => $ds->payble);
        return response($json_array ,200)
        			 ->header('Content-Type', 'text/plain');
        
    }

    public function paymentFromRazorpayConfirmation(Request $request)
    {
    	$request->validate([
    		'razorpay_signature' => 'required|string|max:255',
    		'razorpay_payment_id' => 'required|string|max:255',
    		'razorpay_order_id' => 'required|string|max:255',

    	]);

    	DailySells::where('order_id', $request->razorpay_order_id)->update([
    			'razorpay_signature' => $request->razorpay_signature,
    			'razorpay_payment_id' => $request->razorpay_payment_id
    		]);




    	$api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
		$attributes  = array('razorpay_signature'  => $request->razorpay_signature,  'razorpay_payment_id'  => $request->razorpay_payment_id ,  'razorpay_order_id' => $request->razorpay_order_id);
		$check  = $api->utility->verifyPaymentSignature($attributes);

		if($check == null){
			DailySells::where('order_id', $request->razorpay_order_id)->update([
    			'fullfilled' => true,
    			'payment_date'	=> Carbon::now()
    		]);
			return response('Payment Successful', 200);
		}
		else{
			DailySells::where('order_id', $request->razorpay_order_id)->update([
    			'deleted' => true,
    			//'payment_date'	=> date() 
    		]);
			return response('Something Went Wrong', 402);
		}
		
    }
}
