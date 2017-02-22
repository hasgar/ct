<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Settings;
use App\Cakes;
use App\Http\Requests;
use Redirect;
class CartController extends Controller
{

  public static function getCount()
  {
      return count(Session::get('cart'));
  }
  public static function removeFromCart(Request $request)
  {
   $cart = Session::get('cart');
      for($i = 0; $i < count($cart); $i++) {
        if ($request->id == $cart[$i]["_id"]) {
          unset($cart[$i]);
          break;
        }
      }
      $request->session()->forget('cart');

      $request->session()->flush();
      foreach ($cart as $c) {
        Session::push('cart',$c);
      }

      return redirect(url()->previous());

  }

  public static function isContainThemeCake() {
    if ($cart = Session::get('cart')) {
      foreach ($cart as $c) {
        if ($c['type'] == "theme")
          return "1";
      }
      return "0";

    }
    else {
      return "0";
    }
  }
  public static function getTotalAmount()
  {
      if ($cart = Session::get('cart')) {
      $settings = Settings::first();
      $total = 0;
      foreach ($cart as $c) {
        $cake = Cakes::where('id',$c['id'])->first();

          $cake_price = $cake["amount"];
          if ($cake["discount"] > 0) {
            if ($cake["discount_type"] == "-") {
              $cake_price = $cake_price - $cake["discount"];
            }
            else if ($cake["discount_type"] == "%") {
              $cake_price = $cake_price - ($cake_price * $cake["discount"] / 100);
            }
          }
        if ($c['type'] == "normal") {
            $total = $total + ($c['kg'] * $cake_price) * $c['quantity'];
        }
        if ($c['type'] == "photo") {

            $total = $total + (($c['kg'] * $cake_price) * $c['quantity']) + ($settings["photo_charge"] * $c['kg'] * $c['quantity']);
        }
        if ($c['type'] == "theme") {

            $total = $total +  ($cake['shaped_amount'] * $c['kg'] * $c['quantity']);
            $flavour = Cakes::where('id',$c['flavour_id'])->first();
            $total = $total +  ($flavour["amount"] * $c['kg'] * $c['quantity']);
        }

      }
      return $total;
    }
    return '0';

  }

  public static function getItemAmount($id,$quantity,$kg,$type, $flavour_id = 0) {

    $settings = Settings::first();
    $total = 0;
    $cake = Cakes::where('id',$id)->first();
      $cake_price = $cake["amount"];
      if ($cake["discount"] > 0) {
        if ($cake["discount_type"] == "-") {
          $cake_price = $cake_price - $cake["discount"];
        }
        else if ($cake["discount_type"] == "%") {
          $cake_price = $cake_price - ($cake_price * $cake["discount"] / 100);
        }
      }
    if ($type == "normal") {
        $total = $total + ($kg * $cake_price) * $quantity;
    }
    if ($type == "photo") {

        $total = $total + (($kg * $cake_price) * $quantity) + ($settings["photo_charge"] * $kg * $quantity);
    }
    if ($type == "theme") {

        $total = $total +  ($cake['shaped_amount'] * $kg * $quantity);
        $flavour = Cakes::where('id',$flavour_id)->first();
        $total = $total +  ($flavour["amount"] * $kg * $quantity);
    }
    return $total;

  }



}
