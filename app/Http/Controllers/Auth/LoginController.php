<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
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
   protected function authenticated(Request $request, $user)
   {

        if($user->hasRole('superadministrator')){
            return  redirect()->route('superadmin');
        }

        if($user->hasRole('administrator')){
            return  redirect()->route('client');
        }
        if($user->hasRole('user')){
            return  redirect()->route('writer');
        }
        if($user->hasRole('writer')){
            return  redirect()->route('writer');
        }
   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

}
