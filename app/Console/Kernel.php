<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use DB;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\UpdateValidityOfShop::class,
        Commands\RankCards::class,
        Commands\UpdateInvestmentEarning::class,
        Commands\TaskAssigner::class,
        Commands\TaskToInvestors::class,
        Commands\ShopNewWeekData::class,
        Commands\SendShopConfirmationMail::class,
        Commands\TestEverythingHere::class,
        Commands\CustomerShopConnectionUpdate::class,
        Commands\CelebrateJobs::class

    ];

    // define your queues here in order of priority
    protected $queues = 'default';


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('shop:validity_update')
                 ->daily();

        
         // run the queue worker "without overlapping"
        // // this will only start a new worker if the previous one has died
        // $schedule->command($this->getQueueCommand())
        //     ->everyMinute()
        //     ->withoutOverlapping();

        $schedule->command('queue:work --stop-when-empty')
                 ->everyMinute()->withoutOverlapping();

        $schedule->command('markoverse:email')
                 ->daily();

         

        // // // // restart the queue worker periodically to prevent memory issues
        $schedule->command("up")
            ->everyMinute();

    }
    // protected function getQueueCommand()
    // {
    //     // build the queue command
    //     $params = implode(' ',[
    //         '--daemon',
    //         '--tries=3',
    //         '--sleep=3',
    //         '--queue='.implode(',',$this->queues),
    //     ]);

    //     return sprintf('queue:work %s', $params);
    // }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
