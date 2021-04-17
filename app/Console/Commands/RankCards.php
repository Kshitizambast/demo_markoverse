<?php

namespace App\Console\Commands;
use App\Library\RankOfCard;
use DB;


use Illuminate\Console\Command;

class RankCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:rank';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ranking cards';

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

       
        // $rank_this_week = new RankOfCards();
        // $rank_this_week->store_rank(2);
        $cardsId = DB::select('select id from cards');
        foreach ($cardsId as $cardId) {
            $rank_this_week = new RankOfCard();
            $rank_this_week->store_rank($cardId);
        }


    }
}
