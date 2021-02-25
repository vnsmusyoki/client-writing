<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\clientregistration;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class contentcontroller extends Controller
{
     
    public function index(){
        return view('auth.clientlogin');
    }
    public function register(){
        return view('auth.clientregister');
    }
    public function createaccount(Request $request){
        $this->validate($request, [ 
            'full_names' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
            
        ]);
        $token = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        $user = new User;
        $user->name = $request->input('full_names');
        $user->email = $request->input('email');
        $user->user_category = "client";
        $user->password = bcrypt($request->input('password'));
        $user->userid = $token;
        $user->verification_code = sha1(time());
        $user->save(); 
        $user->attachRole('administrator');
        $data = array(
            'email' =>$request->input('email'),
            'name'=>$request->input('name'),
            'code'=>$user->verification_code
        );
        
        Mail::to($user->email)->send(new clientregistration($data));

        return redirect('client/verifyaccount/'.$user->email);
    }

    public function verifyaccount($token){ 
        return view('clientaccount.verifyaccount', compact('token'));
    }

    public function validateaccount(Request $request){
        $code =$request->get('code');
        $user = User::where('verification_code', $code)->first();
        $user->remember_token = $code;
        $user->email_verified_at = Carbon::now();
        $user->save();
        // Toastr::info('Your account has been veried', 'Success',  ["positionClass" => "toast-top-right"]);
        return redirect('/client');
    }
}
