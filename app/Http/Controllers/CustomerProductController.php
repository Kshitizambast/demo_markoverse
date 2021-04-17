<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\OrderPlaced;
use App\DailySells;
use App\Product;
use App\Card;
use App\MyShop;
use App\User;
use App\Events\OrderStatusChanged;
use App\OrderDetails;
use DB;
use Crypt;

class CustomerProductController extends Controller
{
    //
    public function __constructor()
    {
    	$this->middleware('auth');
    }


    public function main($product,  $customer, Request $request)
    {   
        $this->validate($request, [
            'quantity'   => 'required|numeric',
           
        ]);
        $customer_id =  Crypt::decrypt($customer);
        $product_id  =  Crypt::decrypt($product);
        $shop_id     =  Product::findOrFail($product_id)->my_shop_id;
        $quantity    =  $request['quantity'];


        $this->createOrderDetails($customer_id, $shop_id, $product_id, $quantity);

        return back();
    }


    public function applyCoupon(Request $request)
    {
        $ds_id = $request['id'];
        $ds_coupon_id = $request['coupon_id'];
        $total = $request['total'];
        $card  =  Card::find($ds_coupon_id);
    
        $orders = OrderDetails::where('daily_sells_id', $ds_id)->get();
        
        //dd($orders[0]->discount);
        $total_now = 0;

        if(count($orders) > 0)
        {   
            foreach ($orders as $order) {
              $order->price == $order->total ?  $total_now += $order->total : $total_now+=0;
            }
        }
        else
            $orders[0]->price == $order[0]->total ?  $total_now += $order->total : $total_now+=0;
        
            //dd($total_now);
            if($total_now >= $card->min_range){
                $total_now -= ceil((($total_now * $card->discount) /100 ));
                DailySells::where('id', $ds_id)
                            ->update([
                                'payble' => $total_now,
                                'extra_off' => $card->discount
                            ]);
                $new_ds = DailySells::find($ds_id);
                
               return response()->json($new_ds, 200);
            }
            
           else
              return response('Range Not Satisfy')->setStatusCode(300);
                

        
    }

    public function placeOrder(Request $request)
    {
        $ds_id = $request['ds_id'];
        //$shop_id   =  $request['shop_id'];
                 
        DailySells::where('id', $ds_id)
                    ->update([
                        'order_status_id' => 1
                    ]);



      
        $ds = DailySells::find($ds_id);

        $user_name = User::find($ds->customer_id)->name;


        $shop = MyShop::find($ds->my_shop_id);

        
        
        event(new OrderStatusChanged($ds));
        $shop->notify(new OrderPlaced($user_name));
        return response('Order Placed')->setStatusCode(200);
    }


    public function checkBag($customer_id, $shop_id)
    {
        $check = DB::select('select id from daily_sells where customer_id = '.$customer_id.' and my_shop_id = '.$shop_id.' and fullfilled = 0');
        if(count($check) > 0 )
            return $check[0]->id;
        else
            $ds = $this->addToBag($customer_id, $shop_id);
            return $ds->id;

    }

    //Attach that with daily orders.


    public function addToBag($customer_id, $shop_id)
    {
       
       return DailySells::create([
                        'customer_id' => $customer_id,
                        'my_shop_id'     => $shop_id,
                        'order_date'  => date('Y-m-d'),
                        'error_msg'   => 'None',
                        'payment_date'=> date('Y-m-d')
                         ]);


    }


    public function alreadyExist($bag_id, $product_id)
    {
        $order = OrderDetails::where('daily_sells_id', $bag_id)
                              ->where('product_id', $product_id)
                              ->get();

                              //dd($bag_id);

        if(count($order) > 0 and $order[0]->fullfilled == 0)
            return true; 
        else
            return false; 


    }

    public function updatePaybleInBag($bag_id)
    {
        return  DailySells::where('id', $bag_id)
                        ->update([
                            'payble' => $payble
                        ]);
    }


    public function createOrderDetails($customer_id, $shop_id, $product_id, $quantity)
    {
        
        $checkBagID = $this->checkBag($customer_id, $shop_id);


        $pricePerProduct = DB::select('select discount_price, regular_price from products where id = '.$product_id);

        //dd($pricePerProduct);

        $product_price = $pricePerProduct[0]->discount_price;
        $grand_total_price = $this->total($quantity,  $pricePerProduct[0]->regular_price);

        $total = $this->total($quantity, $pricePerProduct[0]->discount_price);

        $alreadyExist = $this->alreadyExist($checkBagID, $product_id);

        if($alreadyExist == false){
            OrderDetails::create([
                'daily_sells_id' => $checkBagID,
                'product_id'     => $product_id,
                'quantity'       => $quantity,
                'discount'      => $product_price,
                'price'          => $grand_total_price,
                'total'          => $total,
                'fullfilled`'    => false,
                'sales_tax'       => 30,
                'bill_date'      => date('Y-m-d')
     
            ]);
        }
        else{

            OrderDetails::where('product_id', $product_id)
                          ->where('daily_sells_id', $checkBagID)
                          ->update([
                            'quantity'       => $quantity,
                            'discount'      => $product_price,
                            'price'          => $grand_total_price,
                            'total'          => $total,
                            'sales_tax'       => 0,
                          ]);
        }
        
      
    }



    public function editRecord(Request $request)
    {
        
       $order_details_id = Crypt::decrypt($request['order_details_id']);

       $validated = $this->validate($request, [
            'quantity' => 'required|numeric'
        ]);

        //Get new quantity.
       //check if it's less than the current.
       //if true than resolve the grand total.
    

        $details = DB::select('select quantity, discount, product_id from order_details where id = '.$order_details_id);


        //dd($details);

        $newQuantity = $validated['quantity'];
        $product_price = Product::findOrFail($details[0]->product_id)->regular_price;
        $newtotal = $this->total($newQuantity, $details[0]->discount);
        $newPrice = $this->total($newQuantity, $product_price);

            DB::table('order_details')
                ->where('id', $order_details_id)
                ->update([
                    'quantity' => $newQuantity,
                    'price'    => $newPrice,
                    'total'    => $newtotal
                    ]);
      

        

        return back();
    }


    public function total($quantity, $discount_price)
    {
        $total = $quantity * $discount_price;
        return $total;
    }


    public function delete(Request $request)
    {
         $validatedOrderID = Crypt::decrypt($request['order_id']);

    	DB::table('order_details')->where('id', '=', $validatedOrderID)->delete();
        return back();
    }
        


}
