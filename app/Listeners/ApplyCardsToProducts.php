<?php

namespace App\Listeners;

use App\Events\ShopBoughtCard;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class ApplyCardsToProducts
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ShopBoughtCard  $event
     * @return void
     */
    public function applyToPorducts($card_disscount, $shop_id, $min_range, $max_range)
    {
        //Get The regular Price
        $products = DB::select('select * from products where my_shop_id = '.$shop_id.' and  regular_price between '.$min_range.' and '.$max_range);
        foreach ($products as $product) {
            $disscount_price = $product->regular_price - ($product->regular_price * ($card_disscount/100));

            DB::table('products')
            ->where('id', $product->id)
            ->update(['disscount_price' => $disscount_price]);

        }
    }

    public function handle(ShopBoughtCard $event)
    {
        
        $card = DB::table('cards')
                ->join('card_features', 'cards.id', '=', 'card_features.card_id')
                ->where('cards.id', '=', $event->card_id)
                ->select('cards.*', 'card_features.*')
                ->get();

         $this->applyToPorducts($card[0]->disscount, $event->shop_id, $card[0]->min_range, $card[0]->max_range);

         

    }
}
