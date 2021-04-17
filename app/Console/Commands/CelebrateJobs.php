<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CongratulateUsers;
use App\User;

class CelebrateJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markoverse:mail';

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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            dispatch(new CongratulateUsers($user))
                    ->delay(now()->addSeconds(5));
        }
    }
}
