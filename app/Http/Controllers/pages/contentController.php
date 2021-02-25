<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class contentController extends Controller
{
    public function index()
    {
        return view('pages.homepage');
    }
    public function aboutus()
    {
        return view('pages.about-us');
    }
    public function howitworks()
    {
        return view('pages.how-it-works');
    }
    public function comments()
    {
        return view('pages.comments');
    }
    public function contactus()
    {
        return view('pages.contact-us');
    }
}
