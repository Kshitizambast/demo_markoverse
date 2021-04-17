<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Investors;
use App\MyShop;
class InvestInShop extends Command 
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



    protected $investor, $shop;


    public function __construct(Investors $investor, MyShop $shop)
    {
        $investor = $this->investor;
        $shop = $this->shop;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */


    public function handle()
    {
        event(new InvestorInvested($this->investor, $this->shop));
    }
}
