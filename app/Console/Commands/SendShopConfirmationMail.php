<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MyShop;
use App\ShopDataPerWeek;
use Mail;
use App\Mail\RenewalConfirmationMail;

class SendShopConfirmationMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:renewal-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Confirmation Code To Shop';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $shop;
    public function __construct(MyShop $shop)
    {
        parent::__construct();
        $this->shop = $shop;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $shop = $this->shop;
        $data = ShopDataPerWeek::where('my_shop_id', $shop->id)
                                 ->where('payment_id', 0)
                                 ->get();
                                 
        Mail::to($shop->email)->queue(new RenewalConfirmationMail($shop, $data[0]->recovery_code));
    
    }
}
