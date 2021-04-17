<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\OrderProducts;
use App\DailySells;
use App\User;
use DB;
use App\MyShop;
use App\ShopToShopConnections;
use App\Gift;
use App\ShopCustomerWeight;

class UserOrderController extends Controller
{


    public function __constructor()
    {
        $this->middleware('auth');
    }


    public function getOrdersPerShop($user_id, $orders, $bags)
    {

      $ordersPerShop = array();
      foreach ($bags as $bag) {
         $productsPerOrder = array();
        foreach ($orders as $order) {
          if($bag->id == $order->daily_sells_id)
            array_push($productsPerOrder, $order->id);
        }
        $ordersPerShop[$bag->my_shop_id] = $productsPerOrder;
        $productsPerOrder = [];

        //array_push($productPerShop, $bag->id);
      }

      return $ordersPerShop;

    }


    public function getTotalPerBag($user_id, $orders, $bags)
    {
      //[shop_id:total]
      $totalPerBag = array();
       foreach ($bags as $bag) {
         $total = 0;
        foreach ($orders as $order) {
          if($bag->id == $order->daily_sells_id)
            $total += $order->total;
        }
        $totalPerBag[$bag->my_shop_id] = $total;
        $total -= $total;
      }

      return $totalPerBag;

    }



    public function orderCheck($id)
    {
       return  $orders = DB::table('daily_sells')
                           ->join('order_details', 'order_details.daily_sells_id', '=', 'daily_sells.id')
                           ->select('order_details.*')
                           ->where('daily_sells.customer_id' ,$id)
                           ->get();

    }

    
    //Show Orders To Cart.

    public function check($user_id)
    {


      $orders = DB::table('daily_sells')
                           ->join('order_details', 'order_details.daily_sells_id', '=', 'daily_sells.id')
                           ->select('order_details.*')
                           ->where('daily_sells.customer_id' ,$user_id)
                           ->get();


       $customerBags = DailySells::where('customer_id', $user_id)
                                  ->where('fullfilled', 0)
                                  ->get();




      $productPerShop = array();
      foreach ($customerBags as $bag) {
         $productsPerOrder = array();
        foreach ($orders as $order) {
          if($bag->id == $order->daily_sells_id)
            array_push($productsPerOrder, $order->product_id);
        }
        $productPerShop[$bag->my_shop_id] = $productsPerOrder;
        $productsPerOrder = [];

        //array_push($productPerShop, $bag->id);
      }

      return $productPerShop;

    }



    public function index()
    {
    
      // $orders = DB::table('users')
      //           ->join('daily_sells', 'daily_sells.customer_id', '=', 'users.id')
      //           ->select('daily_sells.id')
      //           ->where('daily_sells.customer_id', auth()->user()->id)
      //           ->get();


      //{shop:total, shop2:products, total};

         $orders = $this->orderCheck(auth()->user()->id);
       
         $bags = DailySells::where('customer_id', auth()->user()->id)
                            ->where('fullfilled', 0)
                            ->get();



     

      $ordersPerShop  = $this->getOrdersPerShop(auth()->user()->id, $orders, $bags);
      $totalPerBag  = $this->getTotalPerBag(auth()->user()->id, $orders, $bags);

            
      $products = DB::select('select id, product_name from products');

      $images = DB::select('select * from image_uploads');
      
      $total = 50;

    

      $shopNetworks = array();
      foreach ($ordersPerShop as $ordered_shop => $value) {
          $shopNetworks = $this->showIncrementInPoints($ordered_shop);
      }
      

      

      //dd($shopNetworks);
      // // foreach ($orders as $order) {
      // //   $total += $order->total; 
      // // }

      // //

      // dd($shopNetworks);
      return view('pages.cart')->with([
                                      'ordersPerShop' => $ordersPerShop,
                                      'totalPerBag'   => $totalPerBag,
                                      'images'        => $images,
                                      'products'      => $products,
                                      'orders'        => $orders,
                                      'shopNetworks'  => $shopNetworks

                                    ]);

    }


    public function delete(Request $request)
    {
      $validatedOrderID = $this->validate($request, ['order_id' => 'required|numeric']);
      //dd($validatedOrderID);
      DB::table('order_details')->where('id', '=', $validatedOrderID['order_id'])->delete();
       
      //get the ds id of order_details.
     
      return back();
    }

    public function showIncrementInPoints($shop_id)
    {
        $shops = ShopToShopConnections::where('connector_shop_id', $shop_id)->get();
        $points = array();
        foreach ($shops as $shop) {
          $points[$shop->connected_shop_id] = 10;
        }

        return $points;
    }




    public function showGiftsOnPoints()
    {
      $gifts = Gift::all();
      return $gifts;
    }


    public function shopCustomerWeight($id)
    {
        return ShopCustomerWeight::findOrFail($id)->store_points;
    }


    
}
