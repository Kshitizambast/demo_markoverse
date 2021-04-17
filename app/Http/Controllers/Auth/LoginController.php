<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hash;
use Str;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginViaMobile(Request $request)
    {
        try {

            $request->validate([
                'email' => 'email|required',
                'password' => 'required|string'
            ]);

            $credentials = $request(['email', 'password']);

            if(!Auth::attempt($credentials)){
                return response()->json([
                    'status_code' => 500,
                    'message'     => 'Unauthorized'
                ]);
            }

            $user = User::where('email', $request->email)->first();

            if(!Hash::check($request->password, $user->password, [])){
                throw new \Exception("Error in login");
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type'   => 'Bearer'
            ]);
            
        } catch (Exception $e) {
            
            return response()->json([
                'status_code' => 500,
                'message'   => 'Error in login',
                'error'     => $error
            ]);
        }
    }


    public function redirectFacebook()
    {

    }
    /**
     * Redirect to facebook authentication page.
     * @return Illuminate\Http\Respose
     * 
     */

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
}
