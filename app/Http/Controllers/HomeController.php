<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $socials = Social::all();
        return view('front.home',compact('socials'));
    }
}
