<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cakes;
use App\Settings;

class CakeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /** public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cakes = Cakes::where('status', 1)->where('is_shaped', 0)->get();
        $photo_charge = Settings::where('status', 1)->first()["photo_charge"];
        $theme_cakes = Cakes::where('status', 1)->where('is_shaped', 1)->get();
        $photo_flavours = Cakes::where('status', 1)->where('is_photo_avail', 1)->get();
        $theme_flavours = Cakes::where('status', 1)->where('is_shaped_avail', 1)->get();
        return view('cakes')->with('cakes',$cakes)->with('theme_cakes',$theme_cakes)->with('photo_flavours',$photo_flavours)->with('theme_flavours',$theme_flavours)->with('photo_charge',$photo_charge);
    }
    public function cakeDetails(Request $request)
    {
       $cake = Cakes::where('status', 1)->where('id', $request->id)->first();
       $theme_flavours = Cakes::where('status', 1)->where('is_shaped_avail', 1)->get();
       $type = "normal";
       if ($cake["is_shaped"]) {
          $type = "theme";
       }
       return view('cakeDetails')->with('cake',$cake)->with('theme_flavours',$theme_flavours)->with("type",$type);
    }

    public static function getCakeNameById($id) {

      return Cakes::where('status', 1)->where('id', $id)->first()["name"];
    }
}
