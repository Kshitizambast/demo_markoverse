<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserImage;
use Storage;
use App\User;
use App\ShopCustomerWeight;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Crypt;
use DB;
use App\DailySells;
use App\OrderDetails;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id)
    {
        $user_id = Crypt::decrypt($id); 
        $user  = User::findOrFail($user_id);

        $customer_connections = ShopCustomerWeight::where('customer_id', $user_id)->get();

        $total = 0; 
        foreach ($customer_connections as $connection) {
            $total += $connection->store_points;
        }

        $orders = DB::table('daily_sells')
                           ->join('order_details', 'order_details.daily_sells_id', '=', 'daily_sells.id')
                           ->select('order_details.*')
                           ->where('daily_sells.customer_id' ,$user_id)
                           ->where('order_details.fullfilled', 1)
                           ->get();

                           


        return view('user.profile')->with([
                                            'user' => $user, 
                                            'customer_connections' => $customer_connections,
                                            'total' => $total,
                                            'orders' => $orders
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {
        
      if($request->hasFile('file'))
      {
        $allowedfileExtension=['pdf','jpg','png','jpeg','docx', 'JPG', 'PNG', 'JPEG'];
        $file = $request->file('file');
          $filename  =   $file->getClientOriginalName();
          $extension =    $file->getClientOriginalExtension();
          $check     =    in_array($extension,$allowedfileExtension);

          
        if($check)
        {
              
          $user_id  = auth()->user()->id;

          if(UserImage::where('user_id', '=', $user_id)->exists()){
            $user_image = UserImage::where('user_id', $user_id)->get();
            Storage::disk('s3')->delete($user_image[0]->filename);

            $filename = $file->store('user_images', 's3');
            $user_image[0]->filename = $filename;
            $user_image[0]->save();


          }
          else{

             $filename = $file->store('user_images', 's3');
                  UserImage::create([
                  'user_id' => $user_id,
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
    public function edit(Request $request, $id)
    {
        
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
        $user_id = Crypt::decrypt($id);
        $validated_data = $this->validate($request, [
                            'name'      => 'required|string|max:255',
                            'email'     => ['required','string','email','max:255',Rule::unique('users')->ignore($user_id)],
                            'gender'    => 'required|string',
                            'birthday'  => 'required|date',
                            'username'  =>  ['required','string','alpha_num','max:255',Rule::unique('users')->ignore($user_id)]
                        ]);

        User::find($user_id)->update([
            'name'      => $validated_data['name'],
            'email'     => $validated_data['email'],
            'gender'    => $validated_data['gender'],
            'birthday'  => $validated_data['birthday'],
            'username'  => $validated_data['username']

        ]);

        session()->flash('message', 'Changes have been saved');
        return back();

    }


    public function updatePassword(Request $request, $id)
    {   

        $user_id = Crypt::decrypt($id);

         $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|string|min:6',
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find($user_id)->update(['password'=> Hash::make($request->new_password)]);

        session()->flash('password_message', 'Password has been changed');

        return back();
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
