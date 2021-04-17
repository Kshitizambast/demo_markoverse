<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Console\Commands\InvestInShop;
use DB;
use App\Events\InvestorInvested;
use App\MyShop;
use URL;
use App\Tasks;
use App\PaymentToInvestors;
use App\Investors;
use App\Investment;
use App\InvestmentWallet;
use App\InvestmentCommerce;
use App\CreditRecharge;

class InvestmentFunctionalityController extends Controller
{
    

    public function __construct()
    {
      $this->middleware('auth');
    } 

    public function index()
    {
       

        //if shop is open for investment, then give them the code.
       //if they already have the active reference code then don't show them.

      //They get the reference code and get assigned to the task
                         

      //investment->join->investment_commerce.

          $json_shops = DB::table('investment_commerces')
                          ->join('investments', 'investments.id', '=', 'investment_commerces.investment_id')
                          ->select('investments.*', 'investment_commerces.*')
                          ->get();
        //Wallet
        $wallet = DB::select('select * from investment_wallets where investor_id = '.auth()->user()->id);
        //dd($json_shops);

        $uninvested_shops = MyShop::all();

        
       

        //SHOP To Invest 

        // $shopsFromDB = DB::select('select * from my_shops where open_for_investment =  1 and maximum_investor_count > 0 order by created_at desc');
      
        // $json_shops = json_decode(json_encode($shopsFromDB), true);

        


        
        return view('investment.index')->with(['shops' => $json_shops, 'wallet'=>$wallet, 'uninvested_shops'=>$uninvested_shops]);
        
    }

    public function letMeInvest(Investors $investor, MyShop $shop)
    {   
    
        $shop_data =  DB::select('select * from my_shops where id = '.$shop->id);
        if($shop_data[0]->open_for_investment == 1 and $shop_data[0]->maximum_investor_count !=0)
          {
            event(new InvestorInvested($investor, $shop));
            session()->flash('message', 'You Have Invested in '.$shop->shop_name);
            $reference_code =  Investment::find($investment_id)->reference_code;
            return back()->with('reference_code', $reference_code);
          }
        else
            abort(404);

    }

    public function sendToBank(Request $request)
    {
      $this->validate($request, [
        'upi_number'  => 'required|string',
        'ammount'     => 'required|numeric'
      ]);
      $ammount = $request->input('ammount');
      $upi     = $request->input('upi_number');


      //dd($upi_number);
      // $_upi = json_encode($upi_number);
    

      $wallet = InvestmentWallet::where('investor_id', auth()->user()->id)
                                  ->get();

      if($ammount <= $wallet[0]->payble_ammount)
      {
                                 
          $paymentToInvestors = new PaymentToInvestors;

          $paymentToInvestors->investor_id = auth()->user()->id;
          $paymentToInvestors->send_ammount = $ammount;
          $paymentToInvestors->upi_number = $upi;
          $paymentToInvestors->payment_id = 0;
          $paymentToInvestors->payment_date = date("Y-m-d");
          $paymentToInvestors->error = "None";
          $paymentToInvestors->fullfilled = false;
          $paymentToInvestors->save();

          InvestmentWallet::where('investor_id', auth()->user()->id)
                            ->update([
                              'payble_ammount' => $wallet[0]->payble_ammount - $ammount,
                          ]);

           session()->flash('message', 'We Have Recieved Your Request. You Will Have Your Money In 2 To 3 HRS.');
      }
      else
        session()->flash('message_danger', 'Please Enter Less Than Payble Ammount');
       return redirect('invest');
      
    }


    public function rechargeCredit(Request $request)
    {
      $this->validate($request, [
        'ammount' => 'required|numeric'
      ]);

      $ammount = $request->input('ammount');

      //If Earning Has This Much, recharge the credit
      //Else Fuck Off

      $i_wallet  =  InvestmentWallet::where('investor_id', auth()->user()->id)->get();

      $rest_of_money = $i_wallet[0]->investors_earnings - $ammount;

      if($i_wallet[0]->investors_earnings > 50 and $i_wallet[0]->investors_earnings >= $ammount and $rest_of_money >= 50)
      {
        // Begin Transaction
           DB::beginTransaction();

            try{

              CreditRecharge::create([
                                       'investor_id' => auth()->user()->id,
                                       'ammount'     => $ammount
                                      ]);

              DB::update('update investment_wallets set investors_credit = investors_credit + '.$ammount.' where id ='.$i_wallet[0]->id);
              DB::update('update investment_wallets set investors_earnings = investors_earnings - '.$ammount.' where id ='.$i_wallet[0]->id);
              DB::commit();
            
            } catch (\Exception $e) {
                
                DB::rollBack();
            }
            session()->flash('message', 'You have credited with Rs. '.$ammount);
      }
      else{
        session()->flash('message_danger', 'Not Done! your earning should always be minimum of Rs. 50');
      }

     return redirect('invest');
    }

    


    public function viewTask()
    {
        return view('investment.share');
    }

    public function shopToInvest()
    {
      return view('investment.shopsToInvest');
    }

    public function investorTransaction()
    {
      return view('investment.transaction');
    }

    public function investorWatchlist()
    {
      return view('investment.watchlist');
    }



}
