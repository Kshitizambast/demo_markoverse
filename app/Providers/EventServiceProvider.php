<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],

        'App\Events\OrderStatusChanged' => [
            'App\Listeners\OrderStatusChanedListener'
            
        ],
        

        'App\Events\ShopBoughtCard' => [
            'App\Listeners\UpdateCardOrdersAndShopData',
            'App\Listeners\ApplyCardsToProducts',
            'App\Listeners\IncreaseCustomerShopPoint',
            'App\Listeners\NotifyUsers'
        ],

        'App\Events\InvestorInvested' => [
            'App\Listeners\UpdateInvestmentData'
        ],

        'App\Events\CovalentPaidInvestors' => [
            'App\Listeners\EntryInPaymentTable',
            'App\Listeners\UpdateWalletAfterTransaction',
            'App\Listeners\SendInvoiceToInvestorMail'
        ],


        'App\Events\CustomerPaidToShop' => [
            'App\Listeners\UpdatePaymentData',
            'App\Listeners\PointDistribution',
            // 'App\Listeners\AssignGifts',
            // 'App\Listeners\SendNotificationToUser'
        ],

        'App\Events\TaskDone' =>[
            'App\Listeners\DecreaseTheInvestedAmmount',
            'App\Listeners\UpdateWalletAfterTask'

        ],


        'App\Events\UserParticipatedInEvent' => [
            'App\Listeners\RegisterUserForEvents',
            'App\Listeners\NotifyUsersForParticipating'
        ],

        


        'App\Events\CardValidityOver' => [
            'App\Listeners\BlockPrivilagesOfShop',
            'App\Listeners\AskToBuyCards'
        ],

        'App\Events\ShopRunOutOfDays' => [
            'App\Listeners\BlockPrivilagesOfShop',
            'App\Listeners\AskForPayments',
            'App\Listeners\UpdateInvestmentEarning'
        ],

        'App\Events\ShopPaidCovalent' => [
            'App\Listeners\ActivateShopServices',
            'App\Listeners\CreateShopNewWeekData',
            'App\Listeners\AddMoneyToInvestorsWallet'
        ],

        'App\Events\LikedByUser' => [
            'App\Listeners\UpdateEveryUser',
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
