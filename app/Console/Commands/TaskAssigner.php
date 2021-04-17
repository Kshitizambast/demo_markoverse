<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MyShop;
use App\Tasks;
use DB;

class TaskAssigner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:assign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For Marketing Of Shops ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    protected $shop;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $shops = DB::select('select id from my_shops');
      
       foreach ($shops as $shop) {
           Tasks::create(['tasks_recovery_percentage' => 10,
                           'shop_id' => $shop->id]);
       }
    }
}
