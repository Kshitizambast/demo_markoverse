<?php

namespace App\Listeners;

use App\Events\CovalentPaidInvestors;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Payment;

class EntryInPaymentTable
{
   
    public function handle(CovalentPaidInvestors $event)
    {
        DB::beginTransaction();
        try{

                
            $payment = Payment::create([
                         'payment_type' => 'online',
                         'allowed'      => true,
                         'payment_purpose_id'=>3
                        ]);

        


            DB::update('update payment_to_investors set payment_id = '.$event->payment_record_id.' , fullfilled = 1 where id = '.$event->payment_record_id);

                
            DB::commit();   
        }
        catch(Exception $e){
            DB::rollback();
            echo $e;
        }
    }
}
