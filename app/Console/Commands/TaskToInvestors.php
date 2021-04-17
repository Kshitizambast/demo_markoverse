<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\TaskToInvestor;
use App\Investors;
class TaskToInvestors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:to-investor';

    /**
     * The console command description.
     *
     * @var stringm
     */
    protected $description = 'Command description';

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

        $investors = Investors::getInvestedShop(1);

        foreach ($investors as $investor) {
            TaskToInvestor::create([
                                        'task_id' => 1,
                                        'investment_id'=> $investor->investor_id
                                    ]);
        }
    }
}
