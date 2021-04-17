<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Validation\ValidationException;

class ShopLoginController extends Controller
{
    


	public function __constructor()
	{
		$this->middleware('guest:shop');
	}

    public function showLoginForm()
    {
        \Auth::logout();
    	return view('sellersDashboard.loginform');
    }


    public function shopLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('shop')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){

            return redirect()->action('OwnerShopController@index');
        }
        return $this->sendFailedLoginResponse($request);
    }


      protected function sendFailedLoginResponse(Request $request)
      {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
            'password'=> [trans('auth.failed')]
        ]);
      } 
}

