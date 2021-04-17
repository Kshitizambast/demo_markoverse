<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Owner;
use App\Category;
use Artisan;
use DB;
use Mail;
use Str;
use Auth;
use App\Console\Commands\ShopNewWeekData;
use App\Mail\ShopCreated;
use App\ShopToShopConnections;
use App\MyShop;
use App\City;
use App\State;
use App\ShopImages;
use App\ShopDataPerWeek;
use App\Jobs\ShopFirstWeekData;
use App\Jobs\SendOpenShopEmail;
use App\Jobs\CreateShopToShopConnection;

class RegisterShopController extends Controller
{
      

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function openShop(Category $subcategory)
    {   
        $states =   State::all();
        $cities   = City::all();


        return view('registerShop.test')->with(['subcategory' => $subcategory, 'states'=>$states, 'cities'=>$cities]);
    }


    public function store(Request $request)
    {  
        //MyShop::create($request->all());

        //$owner_email = DB::select('select email from users where id = '.$request->owner_id);



        $validatedShop = $this->validate($request, [
            'shop_name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'shop_phone' => 'required|numeric|unique:my_shops',
            'email'      =>  'required|string|email|max:255|unique:my_shops',
            'owner_id' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'city_id'       => 'numeric',
            'zip_or_pin'     => 'required|numeric',
            'close_on'      => 'required|string'
        ]);

        //dd($validatedShop);

        //Find Id Of City
        $state = DB::select('select * from states where state_name = "'.$request->input('state_name').'"');
        
         $city = City::where('city', $request->input('city'))
                     ->get();
        
        $validatedShop['password'] = bcrypt($validatedShop['password']);
        $validatedShop['city_id'] = $city[0]->id;


         $shop = MyShop::create($validatedShop);
          DB::update('update users set is_owner = 1 where id = '.$validatedShop['owner_id']);
          
            //Create Shop Weekly Data.
        

           
            dispatch(new ShopFirstWeekData($shop))
                    ->delay(now()->addSeconds(5));

                    
            dispatch(new CreateShopToShopConnection($shop->id, $validatedShop['category_id'], $city[0]->id))
                    ->delay(now()->addSeconds(7));


            dispatch(new SendOpenShopEmail($shop))->delay(now()->addSeconds(9));


            //After registration login the use then redirect
       if (Auth::guard('shop')
                 ->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->action('OwnerShopController@index');
        }
        
    }

    public function saveImages(Request $request)
  
      $this->validate($request, [
      'my_shop_id' => 'required|numeric',
      'photos'=>'required',
      ]);

      if($request->hasFile('photos'))
      {
        $allowedfileExtension=['pdf','jpg','png','docx', 'jpeg'];
        $files = $request->file('photos');
        foreach($files as $file){
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $check=in_array($extension,$allowedfileExtension);
          //dd($check);
        if($check)
        {
          foreach ($request->photos as $photo) {
          $filename = $photo->store('shop_images');
          ShopImages::create([
          'my_shop_id' => $request->product_id,
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
  }



 


  public function shopProfile($id)
  {
        $states =   State::all();
        $cities   = City::all();

        $shop = MyShop::findOrFail($id);


        return view('sellersDashboard.shop-profile')->with(['shop' => $shop, 'states'=>$states, 'cities'=>$cities]);
  }

 



  public function shopLocation()
  {
    //Ask for location permission.
    //Get the data.
    //store the data.
    //Display the data.
  }

}
