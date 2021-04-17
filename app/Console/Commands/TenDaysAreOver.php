<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MyShop;
use App\User;

class TenDaysAreOver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */




    protected $shop;




    public function __construct(MyShop $shop)
    {

        $this->shop = $shop;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        event(new ShopRunOutOfDays($this->shop, $this->investor));
    }
}
