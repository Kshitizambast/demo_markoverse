<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Category;
use App\InvestmentWallet;
use App\Product;
use App\MyShop;
use App\User;
use App\Feedback;
use App\ShopToShopConnections;
use DB;
use App\Card;
use App\ShopImages;
use App\Library\DataModelOfShop;
use Artisan;


class PageController extends Controller
{


    public function index()
    {
        $shops =   MyShop::where('is_open_now', 1)->orderBy('popularity', 'DESC')->get();
        $shop_images = ShopImages::all();
        $categories = Category::orderBy('popularity', 'DESC')->get();
        $products = Product::where('disscount_price', '<>', 0)
                            ->where('is_available', 1)
                            ->orderBy('popularity', 'DESC')
                            ->get();

        $adminProducts = Product::where('is_available', 1)->orderBy('popularity', 'DESC')->get();
        $images = DB::select('select * from image_uploads');
    

        $cards = new CardController();
        $trending_cards = $cards->trendingCards();

        
        return view('pages.index')->with(['shops'=>$shops, 'products' => $products, 'images'=>$images, 'shop_images'=>$shop_images, 'categories'=>$categories, 'trending_cards'=>$trending_cards, 'adminProducts'=>$adminProducts]);
    }

    public function feedback()
    {
        return view('pages.feedback');
    }
    
    public function about()
    {
        return view('pages.about');
    }
    public function storeFeedback(Request $req)
    {
        $this->validate($req, [
            'description' => 'required|min:3|max:1000'
        ]);
        Feedback::create([
            'user_id' => auth()->user()->id,
            'description' => $req->input('description')
        ]);
        session()->flash('message', 'Thanks For Your Feedback');
        return back();
    }

    public function cards()
    {
        return view('pages.cards');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function people()
    {
        return view('pages.people');
    }

    public function trading()
    {
        return view('pages.trending');
    }

    public function openshop(Category $subcategory)
    {

        return view('loginForShop.index')->with('subcategory', $subcategory);
    }


    public function firststage()
    {
        return view('pages.shopfirststage');
    }

    public function tools()
    {
        return view('pages.tools');
    }

    public function cart()
    {
        return view('pages.cart');
    }
    public function showReview($product_id)
    {
         $reviews = DB::select('select * from review_products where product_id = '.$product_id.' order by created_at');
         return $reviews;
    }


    public function showWithOutLogin($id)
    {
        $data = Crypt::decrypt($id);
        $product = DB::select('select * from products where id ='.$data);
        $images = DB::select('select * from image_uploads where product_id = '.$data);
        $reviews = $this->showReview($data);
        $fullfilled = 1;

        $shop = MyShop::findOrNew($product[0]->my_shop_id);

         $data_model = new DataModelOfShop($shop);

         $applied_card = $data_model->getShopActiveCard();
         
         $category = Category::find($shop->category_id);
         
         $product_theme = $category->super_categories_id;
         


        $connections = ShopToShopConnections::where('connector_shop_id', $product[0]->my_shop_id)->get();;

        //App\SuperCategory::where('category_id', $product[0]->my_shop->category_id)->

        //dd($product);
        //$c_reviews = DB::select('select * from review_products where product_id = '.$data.' and user_id = '.auth()->user()->id);

        return view('pages.show')->with(['product' => $product, 'fullfilled' => $fullfilled, 'images'=>$images, 'reviews'=>$reviews, 'connections'=>$connections, 'applied_card'=>$applied_card, 'product_theme' => $product_theme]);
    }

    public function showWithLogin($id)
    { 
        $data = Crypt::decrypt($id);
        // $product = DB::select('select * from products where id ='.$data);
        $images = DB::select('select * from image_uploads where product_id = '.$data);
    

        $productFromDB = DB::select('select * from products where id ='.$data);

        //dd($productFromDB);
       
       $myBag = DB::select('select * from daily_sells where customer_id = '.auth()->user()->id.' and payment_id = 0 and my_shop_id = '.$productFromDB[0]->my_shop_id);

       $reviews = $this->showReview($data);
       $c_reviews = DB::select('select * from review_products where product_id = '.$data.' and user_id = '.auth()->user()->id);

       //dd(count($c_reviews));
       
        $fullfilled = 1;

        $connections = ShopToShopConnections::where('connector_shop_id', $productFromDB[0]->my_shop_id)->get();

         $shop = MyShop::findOrNew($productFromDB[0]->my_shop_id);

         $data_model = new DataModelOfShop($shop);

         $applied_card = $data_model->getShopActiveCard();

         
         $category = Category::find($shop->category_id);
         
         $product_theme = $category->super_categories_id;
         



        if(count($myBag) > 0 and $myBag[0]->fullfilled == 0){
             $productInBag = DB::table('products')
                                ->join('order_details', 'products.id', '=', 'order_details.product_id')
                                ->select('products.*', 'order_details.*')
                                ->where('order_details.product_id', $data)
                                ->where('order_details.daily_sells_id', $myBag[0]->id)
                                ->get();

                                //dd($productInBag);

                if($productInBag->count() > 0){
                    $product = $productInBag;
                    //dd($product);
                    $fullfilled = 0;
                    return view('pages.show')->with(['product' => $product, 'fullfilled' => $fullfilled, 'images'=>$images, 'reviews'=>$reviews, 'c_reviews'=>$c_reviews, 'connections' => $connections, 'applied_card'=>$applied_card,'product_theme' => $product_theme]);
                }
                else
                {
                    $product = $productFromDB;
                    $fullfilled = 1;
                     //dd($product);
                    return view('pages.show')->with(['product' => $product, 'fullfilled' => $fullfilled, 'images'=>$images, 'reviews'=>$reviews, 'c_reviews'=>$c_reviews, 'connections' => $connections, 'applied_card'=>$applied_card,'product_theme' => $product_theme]);
                }
                
        }

        else{
            $product = $productFromDB;
             //dd($product);
            return view('pages.show')->with(['product' => $product, 'fullfilled' => $fullfilled, 'images'=>$images, 'reviews'=>$reviews, 'c_reviews'=>$c_reviews,
                'connections' => $connections, 'applied_card'=>$applied_card, 'product_theme' => $product_theme]);
        }
       
    

    }

    public function mobileUsers()
    {
        $users = User::all();

        return response($users, 200);
    }
}
