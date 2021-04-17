<?php

namespace App\Console\Commands;
use App\Mail\RenewShopValidity;
use App\Notifications\CustomerCardApplied;
use App\User;
use Mail;
use Notification;
use App\ShopDataPerWeek;
use App\Mail\ShopPaidToCovalent;
use App\Notifications\UserCardApplied;
use DB;
use App\Card;
use App\MyShop;
use App\LikesOfCustomers;
use App\ShopCustomerWeight;
use App\CardFeature;
use App\Events\UserParticipatedInEvent;

use Illuminate\Console\Command;

class TestEverythingHere extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:me';

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
     * @return mixed
     */
    public function handle()
    {
        event(new UserParticipatedInEvent(1, 1));

        return 'Fired';
    }
}
// 