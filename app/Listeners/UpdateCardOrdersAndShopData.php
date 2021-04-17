<?php

namespace App\Listeners;

use App\Events\ShopBoughtCard;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\OrderCards;
use App\Payment;
use App\Card;
use Carbon\Carbon;
use DB;

class UpdateCardOrdersAndShopData
{
    


    public function makePayment($paid_amount)
    {
      $payment =     Payment::create([
                          'payment_type'       => 'cash',
                          'payment_purpose_id' => 1,
                          'allowed'            => 1,
                          'paid_amount'       => $paid_amount
                    ]);

      return $payment->id;
    }


    public function orderCards($card_id, $paid_amount)
    {
        $order_card = OrderCards::create([
                            'card_id'    => $card_id,
                            'start_date' => Carbon::now(),
                            'end_date'   => Carbon::now()->addDays(5),
                            'payment_id' => $this->makePayment($paid_amount)
                          ]);

        return $order_card->id;
    }

    public function handle(ShopBoughtCard $event)
    {

        // Begin Transaction
           $card = Card::findOrNew($event->card_id);

           //dd($this->orderCards($event->card_id, $card->price));

           DB::beginTransaction();

            try{

                $order_card_id = $this->orderCards($event->card_id, $card->price);

                DB::insert('insert into shop_weekly_cardss (my_shop_id, order_cards_id) values (?, ?)', [$event->shop_id, $order_card_id]);

                 DB::table('cards')
                    ->where('id', '=', $event->card_id)
                    ->update([
                      'open_for_voting' => 0,
                      'activated' => true
                    ]);
                 DB::commit();
            
            } catch (\Exception $e) {
                echo $e;
                DB::rollBack();
            }
      
    }
}
