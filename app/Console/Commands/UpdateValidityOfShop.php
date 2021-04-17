<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MyShop;
use App\Events\ShopRunOutOfDays;
use DB;

class UpdateValidityOfShop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:validity_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating Validity Of Shop';


    public function handle()
    {
        $my_shops = DB::select('select * from my_shops');
        foreach ($my_shops as $shop) {
            if($shop->days_left_to_deactive == 0)
                event(new ShopRunOutOfDays($shop));
            else
                DB::update('update my_shops set days_left_to_deactive = days_left_to_deactive - 1  where id = '.$shop->id); 
        }

        return 0;

    }
}
