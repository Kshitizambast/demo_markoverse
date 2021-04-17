<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\InvestmentWallet;

class UpdateInvestmentEarning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investor:earning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update earning of investors';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $earn = InvestmentWallet::find(1)->increment('investors_earnings', 100);
        InvestmentWallet::find(1)->increment('payble_ammount', $earn);
        return 0;

    }
}
