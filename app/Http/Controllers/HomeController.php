<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Emirates;
use App\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $cart = new CartController();
      $emirates = Emirates::where('status', 1)->get();
      $sliders = Slider::where('status', 1)->get();
      return view('home')->with('emirates', $emirates)->with('sliders', $sliders);
    }

}
