<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use App\SuperCategory;
use App\MyShop;
use DB;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function selectCardsForCustomers()
    {
          $all_cards = DB::table('cards')
                ->join('card_features', 'cards.id', '=', 'card_features.card_id')
                ->select('cards.*', 'card_features.*')
                ->orderBy('weight_this_week', 'desc')
                ->get();

                //  $all_cards = DB::table('cards')
                // ->join('card_features', 'cards.id', '=', 'card_features.card_id')
                // ->select('cards.*', 'card_features.*')
                // ->get();

          return $all_cards;

    }

    public function selectCardsForInvestors()
    {
        $all_cards = DB::table('cards')
                ->join('card_features', 'cards.id', '=', 'card_features.card_id')
                ->select('cards.*', 'card_features.*')
                ->get();

          return $all_cards;
    }

     public function trendingCards()
    {
         $trending_cards = DB::table('cards')
                                ->join('card_features', 'cards.id', '=', 'card_features.card_id')
                                ->select('cards.*', 'card_features.*')
                                ->orderBy('weight_this_week', 'desc')
                                ->get();

            return $trending_cards;
   
    }


    public function jsonOut()
    {
         $cards = Card::all();

         return response($cards, 200)
                        ->header('Content-Type', 'text/plian');
    }

    public function index()
    {   
        
        $cards = $this->selectCardsForCustomers();
        $investorCards = $this->selectCardsForInvestors();
        $super_categories = SuperCategory::all();
        $shops = MyShop::all();
        
        return view('cards.index')->with(['cards'=>$cards, 'investor_cards'=>$investorCards, 'super_categories'=>$super_categories, 'shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
