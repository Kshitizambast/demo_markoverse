<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyShop;
use App\ShopDataPerWeek;
use App\Events\ShopPaidCovalent;
use App\Payment;
use DB;
class OwnerCovalentController extends Controller
{


	public function __construct()
	{
		$this->middleware('auth:shop');
	}

	public function takePayment()
	{
		$payment = Payment::create([
						'payment_type'       => 'online',
						'payment_purpose_id' =>	2,
						'allowed'		     => true
					]);
		return $payment->id;
	}
    public  function restartServices(Request $request)
    {
    		$this->validate($request, [
    			'code' => 'required|string'
    		]);
    		$code = $request->input('code');

    		$shop_data = ShopDataPerWeek::where('my_shop_id', auth()->user()->id)
    						->where('payment_id', 0)
    						->get();
    						
			if($code == $shop_data[0]->recovery_code){
				$shop = MyShop::find(auth()->user()->id);
				DB::beginTransaction();
				try {
					
					event(new ShopPaidCovalent($shop));
					$payment_id = $this->takePayment();
					DB::table('shop_data_per_weeks')
						->where('id', $shop_data[0]->id)
						->update(['payment_id' => $payment_id]);
						

					
					session()->flash('message', 'Successfully Restarted Services');
					DB::commit();
				} catch (Exception $e) {
					DB::rollBack();
				}
			}
				
			else
				session()->flash('message_danger', 'Please Enter A Valid Code');

			return back();

	} 
	
	public function yetToCalculate()
	{
		

		return view('sellersDashboard.undercalculation');

		//get earning from order details.
		//return {month:$100} '{key:value}' pair
	}

}
