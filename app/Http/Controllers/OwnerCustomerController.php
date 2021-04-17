<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CustomerPaidToShop; 
use App\DailySells;
use App\MyShop;
use App\OrderDetails;
use DB;

class OwnerCustomerController extends Controller
{
    public function __construct()
    {   

        $this->middleware('auth:shop');
        
    }

	public function index()
	{
		
        $liveOrders =    DailySells::where('my_shop_id', auth()->user()->id)
                                ->where('fullfilled', 0)
                                ->where('order_status_id', '<>', 0)
                                ->orderBy('created_at', 'ASC')
                                ->get();

        

         return view('sellersDashboard.customer')->with(['liveOrders' => $liveOrders]);
	}

   public function myCustomers()
   {
      
                
                //   $myBags = DB::table('my_shops')
                //               ->join('daily_sells', 'daily_sells.shop_id', '=', 'my_shops.id')
                //               ->join('users', 'daily_sells.customer_id', '=', 'users.id')
                //               ->select('daily_sells.*', 'users.*')
                //               ->where('daily_sells.shop_id', '=', auth()->user()->id)
                //               ->where('daily_sells.fullfilled', '=', 1)
                //               ->get();
                              
                              
    $myBags = DB::select('select distinct customer_id from daily_sells where fullfilled=1 and my_shop_id = '.auth()->user()->id);

    return view('sellersDashboard.my-customers')->with('myBags', $myBags);
   }

   public function customerBag()
   {

   }

	public function showCustomerBag(Request $request)
    {
        //Find the user with requested email
        //Check if he has some product with this shop
        //show it if it has
        //$request = Request::all();

        $validatedUsername = $this->validate($request,['username' => 'required|alpha_num']);
        $user = DB::table('users')->where('username', $validatedUsername['username'])->first();

        if($user != NULL)
        {
            

        	$orders = DB::table('my_shops')
        					  ->join('daily_sells', 'daily_sells.my_shop_id', '=', 'my_shops.id')
        					  ->select('daily_sells.*')
        					  ->where('daily_sells.my_shop_id', '=', auth()->user()->id)
        					  ->where('daily_sells.customer_id', '=', $user->id)
                              ->where('daily_sells.fullfilled', '=', 0)
        					  ->get();		  

                            


            if(count($orders) > 0){

					$productsInBag = DB::table('products')
	                                ->join('order_details', 'products.id', '=', 'order_details.product_id')
	                                ->select('products.*', 'order_details.*')
	                                ->where('order_details.daily_sells_id', '=', $orders[0]->id)
	                                ->get();
                                    
	                 $customerOrders = $productsInBag;

                   
                     $total = 0;
                     $grand_total = 0;
                     foreach ($customerOrders as $customerOrder) {
                         $total += $customerOrder->total;
                         $grand_total += $customerOrder->price;
                     }


	                 return view('sellersDashboard.customer')->with([
                                                                    'customerOrders' => $customerOrders, 
                                                                    'total'=> $total, 
                                                                    'user' => $user,
                                                                    'grand_total' => $grand_total
                                                                    ]);
	                                
				}
                   
            else{
               session()->flash('message_danger', 'Customer Got Nothing To Show!');
                return back();
            }
           
        }
        else{
                session()->flash('message_warning', 'Check It! No Such User');
                return back();
        }
        
           

    }

    public function proceedPayment(Request $request)
    {
        $shop_id = $request->input('shop_id');
        $customer_id = $request->input('customer_id');
        $payment_purpose_id = $request->input('payment_purpose_id');
        $total = $request->input('total');
       
        event(new CustomerPaidToShop($shop_id, $customer_id, $payment_purpose_id, $total));
        session()->flash('message', 'Deal Done With Customer. Ready To Go For Next');
        return redirect('dashboard/customers');
    }
   
   public function deleteOrder(Request $request)
   {
      $order = OrderDetails::findOrFail($request->input('order_id'));
      $bag =   DailySells::findOrFail($order->daily_sells_id);
      $bag->paid = $bag->paid - $request->input('total');
      $bag->save();
      OrderDetails::destroy($order->id);

   }

}
