<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\MyShop;
use DB;
use App\User;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
   
    //Index
    public function index()
    {
        //
        $shops = MyShop::all();

        return view('shops.index')->with('shops', $shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //validate the form.
      $validatedShop = request()->validate([
                'shop_name' =>['required' ,  'unique:shops, shop_name',  'alpha' , 'max:255'],
                'shop_phone' => ['required',  'numeric' , 'min:10'],
                'password' => ['required', 'aplha_num', 'confirmed', 'min:8'],
                'description' => ['required', 'max:255'],
                'cards.card_id' =>['nullable'],
                'users.owner_id'=>auth()->user()->id,
                'category_id' =>['nullable'],
                'landmark_id' =>['nullable'],
                'comment_id' =>['nullable'],
                'city_id' =>['nullable'],
                'current_profit' => ['required' ,'numeric'],
                'min_price_range_of_goods' => ['required' ,'numeric'],
                'max_price_range_of_goods' =>[ 'required' ,'numeric'],
                'affordable_discount' => ['required', 'numeric', 'min:30' ,'max:100']
            ]);
        //open a shop and fill the database.
        MyShop::create($validatedShop);
        
        return view('cards.index');

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
