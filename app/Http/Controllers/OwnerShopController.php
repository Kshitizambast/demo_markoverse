<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\User;
use App\Owner;
use DB;
use App\Events\ShopBoughtCard;
use App\ImageUpload;
use App\Card;
use App\DailySells;
use App\ShopDataPerWeek;
use App\Product;
use App\Category;
use App\ShopImages;
use App\MyShop;
use App\ProductTagsToSearch;
use App\Library\DataModelOfShop;

class OwnerShopController extends Controller
{  
    //This controller provides the controller to the owner.

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {   

        $this->middleware('auth:shop');
        
    }

    public function totalProducts()
    {
        return  DB::select('select * from products where my_shop_id = '.auth()->user()->id);
    }


    public function getDataOfShop($my_shop_id)
    {
      return ShopDataPerWeek::where('my_shop_id', $my_shop_id)
                             ->where('payment_id', 0)   
                             ->get();
    }

    public function index()
    {
       
       if(count($this->totalProducts()) > 0){

        $data_of_shop = $this->getDataOfShop(auth()->user()->id);
        $shop = MyShop::find(auth()->user()->id);

        $data_models = new DataModelOfShop(auth()->user());
        $analyzeProducts = $data_models->productSellComparision();

        arsort($analyzeProducts);

        


                                        
        return view('sellersDashboard.dashboard')->with(['shop_data'=>$data_of_shop, 'shop'=>$shop, 'analyzeProducts' => $analyzeProducts]);
       }
       else
        return view('sellersDashboard.default');
       
    }

    public function shopProfile($id)
    {
      $shop = MyShop::findOrFail($id);
      return  view('sellersDashboard.shop-profile')->with('shop', $shop);
    }


   public function getShopActiveCard($my_shop_id)
   {

      $data_of_shop = $this->getDataOfShop($my_shop_id);
      $cards_of_shops = DB::table('cards')
            ->leftJoin('order_cards', 'cards.id', '=', 'order_cards.card_id')
            ->where('order_cards.id', '=', $data_of_shop[0]->order_cards_id)
            ->select('cards.*')
            ->get();
     
      return $cards_of_shops;
      
   }


   public function applyCardToProduct($card_discount, $min_range, $max_range, $product_price)
   {

      if($product_price >= $min_range and $product_price <= $max_range){
        $discount_price = $product_price - ($product_price * ($card_discount/100));
        return $discount_price;
      }
      else
        return;
   }

   public function addproducts()
    {
        //Find super_category_id then find the si_units for that.
        $super_category_id = DB::select('select  super_categories_id from categories where id = '.auth()->user()->category_id);


        $get_super_id = $super_category_id[0]->super_categories_id;
        

        //si_units for pricing
        $si_units = DB::select('select si_unit  from s_i_unit_of_products where super_category_id = '.$get_super_id);


        //categories of products
        $product_categories = DB::select('select * from product_categories where shop_category_id = '.auth()->user()->category_id);

        //Tags 

        $tags = DB::select('select * from tags_to_searches where super_cat_id= '.$get_super_id);

        
        return view('sellersDashboard.product_entry_form')->with([
                                                                    'si_units' => $si_units, 
                                                                    'product_categories' => $product_categories,
                                                                    'tags'          => $tags
                                                                ]);
    }

      

    //Store The Product
    public function storeProducts(Request $request)
    {

       

        $si_units = DB::select('select id from s_i_unit_of_products where si_unit = "'.$request->input('si_unit').'"');
        
        $product_category = DB::select('select id from product_categories where product_categories = "'.$request->input('categories').'"');


        $validatedProduct = $this->validate($request, [
            'product_name'        => 'required|string|max:255',
            'product_category_id' => 'numeric',
            's_i_unit_id'         =>  'numeric',
            'my_shop_id'          => 'required|numeric',
            'description'         => 'required|min:10|max:2000',
            'regular_price'       => 'required|numeric',
            'cost_price'          => 'required|numeric',
        ]);
        $validatedProduct['s_i_unit_id'] = $si_units[0]->id;
        $validatedProduct['product_category_id'] = $product_category[0]->id;

        
        $string = $request->input('tags');
        $tags = explode (",", $string);

        



        $product =  Product::create($validatedProduct);

        if($product->my_shop->can_buy_cards == 0)
        {
        $product_price = $product->regular_price;

        $card_data = $this->getShopActiveCard(auth()->user()->id);        

        $discount_price = ceil($this->applyCardToProduct($card_data[0]->discount, $card_data[0]->min_range, $card_data[0]->max_range, $product->regular_price));

        DB::table('products')
            ->where('id', $product->id)
            ->update(['discount_price' => $discount_price]);
        }

        //tags update

         $id = Crypt::encrypt($product->id);

         $this->storeProductsImages($request, $id);

        foreach($tags as $tag) {
         $sql = DB::select('select id from tags_to_searches where tag_name = "'.$tag.'"');
         ProductTagsToSearch::create([
                                'tags_to_search_id' => $sql[0]->id,
                                'product_id' => $product->id
                              ]);
       }

      

       //Update the current price.
        session()->flash('message', 'Product entry Successful, Now add pictures by clicking the link to product in table');
        return redirect('dashboard/products');
        
    }



    // public function storeImages($files, $id)
    // {

    // }


    public function showProductsDetails($id)
    {
        $data = Crypt::decrypt($id);
        $product = DB::select('select * from products where id ='.$data);
        $images  = DB::select('select * from image_uploads where product_id = '.$data);
        foreach ($product as $value) {
                if($value->my_shop_id == auth()->user()->id)
                    return view('sellersDashboard.product_details')->with(['product' => $product, 'images' => $images]);
                else
                    return abort(403, 'Unauthorized action.');
        }
        
    }

    public function storeProductsImages(Request $request, $id)
    {
      $product_id = Crypt::decrypt($id);  

      if($request->hasFile('file'))
      {
        $allowedfileExtension=['pdf','jpg','jpeg','png','docx'];
        $files = $request->file('file');
        foreach($files as $file){
          $filename  =   $file->getClientOriginalName();
          $extension =    $file->getClientOriginalExtension();
          $check     =    in_array($extension,$allowedfileExtension);

          //dd($check);
        if($check)
        {
          foreach($files as $file) {

          $filename = $file->store('product_images', 's3');

          ImageUpload::create([
          'product_id' => $product_id,
          'filename' => $filename
          ]);

        }

        session()->flash('message', 'Picture entry successful');
        return back();
      }

      else
        echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
      }
    }
  }

    public function saveShopImages(Request $request)
    {

      $this->validate($request, [
      'my_shop_id' => 'required',
      'shop_photos'=>'required'
      ]);
      
      if($request->hasFile('shop_photos'))
      {
        $allowedfileExtension=['pdf','jpg','jpeg','png','docx'];
        $files = $request->file('shop_photos');
        foreach($files as $file){
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $check=in_array($extension,$allowedfileExtension);
        if($check)
        {
          foreach ($request->shop_photos as $photo) {
          
          $filename = $photo->store('shop_images', 's3');
          ShopImages::create([
          'my_shop_id' => $request->my_shop_id,
          'filename' => $filename
          ]);
        }
        session()->flash('message', 'Picture entry successful');
        return back();
      }
      else
      {
      echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
      }
      
      }
    }
    else
      echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
  }



  public function imageController()
  {
    $images = ShopImages::all();
    return view('sellersDashboard.images')->with('images', $images);
  }


    public function showProducts()
    {
        
        $products = $this->totalProducts();
        if(count($products) > 0){
          $images   = DB::select('select * from image_uploads');
            return view('sellersDashboard.product')->with(['products' => $products, 'images'=>$images]);
        }
            
        else
            return view('sellersDashboard.default');

    }

    public function changeProductActivity(Request $request)
    {

      $this->validate($request, [
        'product_id' => 'required|numeric'
      ]);
       $product = Product::find($request->input('product_id'));
      //dd($product);
       if($product->is_available == 1) {
              
               $product->is_available	 = 0;
               $product->save();
        return back();
       } elseif($product->is_available == 0) {
          $product->is_available = 1;
          $product->save();
         return back();
       }
       else
        return back();
       

    }

    public function orders()
    {
        if(count($this->totalProducts()) > 0){

          $orders = DB::table('daily_sells')
                       ->leftJoin('order_details', 'daily_sells.id', '=', 'order_details.daily_sells_id')
                       ->get();
                       //dd($orders);
          //$orders = DailySells::where('my_shop_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('sellersDashboard.order')->with('orders', $orders);
       }
       else
        return view('sellersDashboard.default');
    }



    public function customersToShop()
    {

        if(count($this->totalProducts()) > 0){
        return view('sellersDashboard.customer');
       }
       else
        return view('sellersDashboard.default');
    }

    public function InvestorsToShop()
    {
        if(count($this->totalProducts()) > 0){
        return view('sellersDashboard.investor');
       }
       else
        return view('sellersDashboard.default');
    }


    public function showCards()
    {
      if(count($this->totalProducts()) > 0)
      {

        $cards = DB::table('cards')
                ->join('card_features', 'cards.id', '=', 'card_features.card_id')
                ->select('cards.*', 'card_features.*')
                ->get();
          return view('sellersDashboard.cards')->with('cards', $cards);
      }
      
      else
        return view('sellersDashboard.default');
    }

    public function buyCard(Request $request)
    {
        $shop_id = auth()->user()->id;
        $card_id = $request->input('card_id');
        event(new ShopBoughtCard($shop_id, $card_id));

        session()->flash('message', 'Card Successfuly Applied, Check-Out New Prices In Products Table');

        return redirect('dashboard/cards');

    }



    public function editProduct($id)
    {
      $product = Product::find($id);

      if(auth()->user()->id != $product->my_shop_id)
        return back()->with('error', 'Unauthorized Page');
      else{
        //Find super_category_id then find the si_units for that.
        $super_category_id = DB::select('select  super_categories_id from categories where id = '.auth()->user()->category_id);

        $get_super_id = $super_category_id[0]->super_categories_id;

        //si_units for pricing
        $si_units = DB::select('select si_unit  from s_i_unit_of_products where super_category_id = '.$get_super_id);


        //categories of products
        $product_categories = DB::select('select * from product_categories where shop_category_id = '.auth()->user()->category_id);

        //Tags 

        $tags = DB::select('select * from tags_to_searches');

        
        return view('sellersDashboard.edit-product-form')->with([   'product' => $product,
                                                                    'si_units' => $si_units, 
                                                                    'product_categories' => $product_categories,
                                                                    'tags'          => $tags
                                                                ]);
       }
      }



    public function updateProduct(Request $request, $id)
    {

       $si_units = DB::select('select id from s_i_unit_of_products where si_unit = "'.$request->input('si_unit').'"');
        
        $product_category = DB::select('select id from product_categories where product_categories = "'.$request->input('categories').'"');

      $validatedProduct = $this->validate($request, [
            'product_name' => 'required|string|max:255',
            'product_category_id' => 'numeric',
            's_i_unit_id'       =>  'numeric',
            'my_shop_id' => 'required|numeric',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
        ]);

       $validatedProduct['s_i_unit_id'] = $si_units[0]->id;
       $validatedProduct['product_category_id'] = $product_category[0]->id;

       $tags = $request->input('tags');


      Product::where('id', $id)
              ->update($validatedProduct);


      foreach ($tags as $tag) {
         $sql = DB::select('select id from tags_to_searches where tag_name = "'.$tag.'"');
         ProductTagsToSearch::where('product_id', $id)
                      ->update([
                                'tags_to_search_id' => $sql[0]->id
                              ]);
      }

      session()->flash('message', 'Product edited Successful');
      return redirect('dashboard/products');

    }
    

    public function showCommerce()
    {
        if(count($this->totalProducts()) > 0){
        return view('sellersDashboard.shop_commerce');
       }
       else
        return view('sellersDashboard.default');
    }

  
    public function deleteProduct(Request $request)
    {
      $request->validate(['product_id' => 'required|numeric']);
      $images = DB::select('select * from image_uploads where product_id = '.$request->input('product_id'));
      foreach ($images as $image) {
        Storage::disk('s3')->delete($image->filename);
      }

      DB::delete('delete from image_uploads where product_id = '.$request->input('product_id'));

      Product::destroy($request->input('product_id'));
      return redirect('dashboard/products');
    }


    public function showImages()
    {
      $images = DB::select('select * from shop_images where my_shop_id = '.auth()->user()->id);
      return view('sellersDashboard.pics')->with('images', $images);
    }


    public function removeImage(Request $request)
    { 
      $this->validate($request, [
      'image' => 'required|numeric'
      ]);
      $image = ShopImages::find($request->input('image'));
      Storage::disk('s3')->delete($image->filename);
      DB::delete('delete from shop_images where id = '.$image->id);
      return back();
    }

     public function removeProductImage(Request $request)
    { 
      $this->validate($request, [
      'image_id' => 'required|numeric'
      ]);
      $image = ImageUpload::find($request->input('image_id'));
      Storage::disk('s3')->delete($image->filename);
      DB::delete('delete from image_uploads where id = '.$image->id);
      return back();
    }
    



}
