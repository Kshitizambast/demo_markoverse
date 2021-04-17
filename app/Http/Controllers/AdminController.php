<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User\Admin;
use DB;
use App\MyShop;
use App\Feedback;
use App\User;
use App\PaymentToInvestors;
use App\Console\Commands\SendShopConfirmationMail;
use App\Events\CovalentPaidInvestors;
use App\ShopCustomerWeight;
use App\DailySells;

class AdminController extends Controller
{


  public function __construct()
    {   

        $this->middleware('covalent_admin');
        
    }
    
    public function index()
    {
        if(\Auth::check() and auth()->user()->is_admin == 1){

            $total = 0;
            $sells = DailySells::where('fullfilled', 1)->get();
            foreach ($sells as $sell) {
                $total += $sell->paid;
            }
    	   return view('admin.index')->with('total', $total);
        }
        else
            abort(404);
    }

    public function investorMoneyReq()
    {
        
        $users = User::all();

        $user_points = ShopCustomerWeight::all();
        $pointsPerCustomers = array();

        foreach ($users as $user) {
            $total =  0;
            foreach ($user_points as $point) {
                if($user->id == $point->customer_id)
                    $total += $point->store_points;
                else
                    continue;
            }
            $pointsPerCustomers[$user->id] = $total;
            $total -= $total;
        }

        arsort($pointsPerCustomers);

        //dd($pointsPerCustomers);
       

        return view('admin.investors-request')->with('pointsPerCustomers', $pointsPerCustomers);
    }

    public function cards()
    {
        $cards = DB::select('select * from cards');
    	return view('admin.cards')->with('cards', $cards);
    }

    public function shops()
    {
        $shops = MyShop::all();
        return view('admin.shop')->with('shops', $shops);

    }


    public function createcard()
    {
        return view('admin.createcard');
    }
	
	public function payInvestors(Request $request)
    {

        $payment_record_id = $request->input('id');
        event(new CovalentPaidInvestors($payment_record_id));
        return back();
    }
	
	
	public function shopCashManagement()
    {
        
        $requests = MyShop::where('days_left_to_deactive', 0)->get();
        return view('admin.shop-cash-management')->with('requests', $requests);

    }

    public function sendConfirmationCode(Request $request)
    {
        
        $this->validate($request, ['shop_id' => 'required|numeric']);

        $shop_id = $request->input('shop_id');

        $shop = MyShop::find($shop_id);

        $shop = MyShop::find($shop_id);

        $this->dispatch(new SendShopConfirmationMail($shop));
        

        return back();

    }

    public function orders()
    {
           
    }
    public function investors()
    {
        return view('admin.investors');
    }
    public function product()
    {
        return view('admin.products');
    }

    public function customer()
    {
        $users = DB::select('select * from users');

        return view('admin.customer')->with('users',$users);
    }
    public function feedback()
    {   $orders = DB::table('daily_sells')
                       ->leftJoin('order_details', 'daily_sells.id', '=', 'order_details.daily_sells_id')
                       ->where('order_details.fullfilled', '=', 1)
                       ->get();

                    
        return view('admin.feedback')->with('orders', $orders);
    }

    
}
