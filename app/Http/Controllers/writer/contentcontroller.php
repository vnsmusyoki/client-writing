<?php

namespace App\Http\Controllers\writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contentcontroller extends Controller
{
    public function index(){
        return view('auth.writerlogin');
    }
}
