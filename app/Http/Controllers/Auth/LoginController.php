<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    private function updateStatus(){
        $user = \auth()->user();
        $user->is_active = true;
        $user->save();
    }
    /**
     * @param Request $request
     * mi custom login
     */
    public function login(Request $request)
    {
        $isEmail = true;
        $content = $request->email."";
        $pattern = '$[a-z][A-Z][0-9]@[A-Z][a-z].[A-Z][a-z]$' ;
        $isEmail = strpos($request->email , '@');
        if(!$isEmail){ /*is Mobile phone*/
            if (Auth::attempt(array('phone' => $request->email, 'password' => $request->password))){
                //return redirect(session('links')[2])->withInput()->withErrors();
                $this->updateStatus();
                return Redirect::route('categories');


            }else {
                return Redirect::back();
            }
        }
//        dd($isEmail,$pattern);
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))){
            //return redirect(session('links')[2])->withInput()->withErrors();
            $this->updateStatus();
            return Redirect::route('categories');

        }else {
            return Redirect::back();
        }

    }


    public function logout(Request $request)
    {
        $user = \auth()->user();
        $user->is_active = false;
        $user->last_activation_date = new \DateTime();
        $user->save();
        Auth::logout();
        return Redirect::back();
    }

}
