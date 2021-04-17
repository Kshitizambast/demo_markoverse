<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\FollowShop;
use App\MyShop;
use App\User;
use App\Owner;
use Crypt;
use App\Library\DataModelOfShop;

class UserShopController extends Controller
{
    //This controller provides UI to the users(customer, investor)



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        //$shops = DB::select('select * from my_shops where days_left_to_deactive <> 0 order by created_at desc');
         $shops =   MyShop::orderBy('popularity', 'DESC')->get();

        $shop_images   = DB::select('select * from shop_images');
                    
        return view('shops.index')->with(['shops'=>$shops, 'shop_images'=>$shop_images]);
       
    }

    
    public function show($id)
    {
        $data = Crypt::decrypt($id);
        $shop = MyShop::findOrNew($data);
        $products = $shop->products;
        $images   = DB::select('select * from image_uploads');
        $shop_images = DB::select('select * from shop_images where my_shop_id = '.$data);
        $cards = DB::table('cards')
                     ->join('card_features', 'card_features.card_id', '=', 'cards.id')
                     ->select('cards.*', 'card_features.*')
                     ->get();
         $allShops = MyShop::all();

         $data_model = new DataModelOfShop($shop);

         $applied_card = $data_model->getShopActiveCard();

        return view('shops.show')->with([
                            'shop' => $shop, 
                            'products'=>$products, 
                            'images'=>$images, 
                            'shop_images'=>$shop_images, 
                            'cards'=>$cards,
                            'allShops'=>$allShops,
                            'applied_card', $applied_card
                        ]);
    }

    public static function myCoverImage($id)
    {
        
    }

    public function alreadySubscribed($user_id, $shop_id){
        $sql = DB::select('select * from follow_shops where user_id = '.$user_id.' and shop_id ='.$shop_id);
        if(count($sql) >= 1)
            return true;
        else
            return false;
    }


    //Subscibe for notisification
    public function follow(User $user, MyShop $shop)
    {

       $check = FollowShop::alreadySubscribed($user->id, $shop->id);

        if($check == false){
            FollowShop::create([
            'user_id' => $user->id,
            'shop_id' => $shop->id
            ]);
        }
        else{
                 DB::delete('delete from follow_shops where user_id = '.$user->id. '
                 and shop_id='.$shop->id);
        }
        

        return back();
    }


    public function transaction(User $user)
    {
        //Get Data From The Cart When Provided The username.
    }

    public function transactionDone(User $user)
    {
        //Clicking Done Will Do it And Store the Transaction to the DB;
        //Empty The Field.
    }

    public function recommendation()
    {
        //Recommend based On the search type.
    }
}
