<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use App\Cakes;
use App\Emirates;
use App\ShippingType;
use App\User;
use App\Timeslots;
use App\OrderStatus;
use Redirect;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Orders;
use App\OrderCakes;
class OrderController extends Controller
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
public function test() {
$id = 2;
$order = Orders::where('id',$id)->first();
$cakes = OrderCakes::where('order_id',$id)->get();
$user = User::where('id',$order["user_id"])->first();
$emirate = Emirates::where('id',$order["emirate_id"])->first();
$timeslot = Timeslots::where('id',$order["timeslot_id"])->first();
Mail::send('email.newOrder', ['order' => $order, 'cakes' => $cakes, 'user' => $user, 'emirate' => $emirate, 'timeslot' => $timeslot], function($message)
  {
  $message->from('admin@caketreeonline.com')->to('hasgardee@gmail.com','Learning Laravel Support')
  ->subject('Contact using Our Contact Form');
  });

}
    public function confirmed() {

      return view('confirmed');
    }
    public function checkout()
    {
        $items = Session::get('cart');
        if (count($items) < 1) {
          return redirect('/');
        }
        $emirates = Emirates::where('status', 1)->get();
        $shipping = ShippingType::get();
        return view('checkout')->with('items',$items)->with('emirates',$emirates)->with('shipping',$shipping)->with('timeslots',$this->getTimeslots());
    }
   public function addToCart(Request $request)
   {

     $this->validate($request, [
       'kg' => 'required|digits_between:0,1000',
       'quantity' => 'integer|required|digits_between:1,1000',
       'type' => 'required|in:normal,photo,theme',
       //'id' => 'required|not_in:0|exist:cakes,id',
     ]);
     if ($request->hasFile('photo') && $request['type'] == "photo") {
       $extension = $request->file('photo')->getClientOriginalExtension();
       $destinationPath = 'uploads/';
       $fileName = str_replace(" ","",uniqid('img_', true).microtime()).'.'.$extension;

       if($request->file('photo')->move($destinationPath, $fileName))
       {
       $request->session()->push('cart', ['_id'=>$this->generateRandomString(),'id'=>$request['flavour'],'quantity'=>$request['quantity'],'kg'=>$request['kg'],'message'=>$request['message'],'type'=>$request['type'],'eggless'=>$request->has('eggless'),"cheeseless"=>$request->has('cheeseless'),"photo"=>$fileName]);
      }
        else {
          return Redirect::back()->withErrors(['Image upload problem. please try again']);
        }
     }
     else if ($request['type'] == "theme" && isset($request['flavour'])) {
       $request->session()->push('cart', ['_id'=>$this->generateRandomString(),'id'=>$request['id'],'flavour_id'=>$request['flavour'],'quantity'=>$request['quantity'],'kg'=>$request['kg'],'message'=>$request['message'],'type'=>$request['type'],'eggless'=>$request->has('eggless'),"cheeseless"=>$request->has('cheeseless')]);
     }
     else if ($request['type'] == "normal")  {
    $request->session()->push('cart', ['_id'=>$this->generateRandomString(),'id'=>$request['id'],'quantity'=>$request['quantity'],'kg'=>$request['kg'],'message'=>$request['message'],'type'=>$request['type'],'eggless'=>$request->has('eggless'),"cheeseless"=>$request->has('cheeseless')]);
    }
    else {
      return Redirect::back()->withErrors(['Something went wrong. please try again']);
    }

    return redirect('checkout');
   }
   public function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function placeOrder(Request $request) {
  $this->validate($request, [
      'your_name' => 'required',
      'flat_no_builder' => 'required',
      'street_address' => 'required',
      'email_order' => 'email',
      'your_phone' => 'required',
      'order_date' => 'required',
      'emirate' => 'required|exists:emirates,id',
      'shipping' => 'required|exists:shipping_type,id',
      'timeslot' => 'required|exists:timeslots,id',
      'payment_type' => 'required|in:cod,online',
    ]);

    if (Auth::check())
    {
      $userId = Auth::user()->id;
    } else {
      $userId = (new UserController)->createTempUser($request["your_name"],$request["email_order"])["id"];
    }
    

    $cart = Session::get('cart');
    if (count($cart) < 1)
      return Redirect::back()->withErrors(['Your cart is empty, add cakes and try again']);


    if($this->isTimeslotNotAvail($request["timeslot"]))
      return Redirect::back()->withErrors(['Timeslot not availabe. Please select next timeslot available.']);

    $net_total =  (new CartController)->getTotalAmount();

    $delivery_charge = Timeslots::where('id',$request["timeslot"])->first()["extra_amount"];

    $extra_amount = 0.0;

    $service_charge = 0.0;

    $discount = 0.0;

    $grand_total = ($net_total + $delivery_charge + $extra_amount + $service_charge) - $discount;

    $order = Orders::create([

        'timeslot_id'=> $request["timeslot"],
        'user_id'=> $userId,
        'emirate_id'=> $request["emirate"],
        'shipping_type_id'=> $request["shipping"],
        'is_payment_online'=> false,
        'online_pay_status'=> false,
        'net_total' => $net_total,
        'service_charge' => 0.0,
        'delivery_charge' => $delivery_charge,
        'extra_amount' => 0.0,
        'discount' => 0.0,
        'grand_total' => $grand_total,
        'have_addon' => false,
        'your_name' => $request["your_name"],
        'reciever_name' => $request["reciever_name"],
        'flat_no_and_builder' => $request["flat_no_builder"],
        'landmark' => $request["landmark"],
        'street_address' => $request["street_address"],
        'your_phone' => $request["your_phone"],
        'delivery_date' => $request["order_date"],
        'reciever_phone' => $request["reciever_phone"],
        'notes' => $request["notes"],
        'token' => $this->generateRandomString()
      ]);

      foreach ($cart as $item) {
        $cake_total = (new CartController)->getItemAmount($item["id"],$item["quantity"],$item["kg"],$item["type"]);
        $is_photo = false;
        $photo_url = "";
        if ($item["type"] == "photo") {
          $is_photo = true;
          $photo_url = $item["photo"];
        }
        $falvour_id = 0;
        if ($item["type"] == "theme") {
          $falvour_id = $item["flavour"];
        }

      $orderCakes = OrderCakes::create([

          'user_id'=> $userId,
          'order_id'=> $order["id"],
          'cake_id'=> $item['id'],
          'is_photo'=> $is_photo,
          'photo_url'=> $photo_url,
          'message' => $item["message"],
          'is_eggless' => $item["eggless"],
          'is_cheeseless' => $item["cheeseless"],
          'flavour_id' => $falvour_id,
          'kg' => $item["kg"],
          'quantity' => $item["quantity"],
          'amount_sold' => $cake_total

        ]);
      }

      $orderStatus = OrderStatus::create([

          'order_id'=> $order["id"],
          'status_id'=> 2

        ]);

        $order = Orders::where('id',$order["id"])->first();
        $cakes = OrderCakes::where('order_id',$order["id"])->get();
        $user = User::where('id',$order["user_id"])->first();
        $emirate = Emirates::where('id',$order["emirate_id"])->first();
        $timeslot = Timeslots::where('id',$order["timeslot_id"])->first();
       Mail::send('email.newOrder', ['order' => $order, 'cakes' => $cakes, 'user' => $user, 'emirate' => $emirate, 'timeslot' => $timeslot], function($message)
          {
          $message->from('orders@caketreeonline.com')->to(['hasgardee@gmail.com'],'New Order')
          ->subject('New Order');
          });
       Mail::send('email.invoice', ['order' => $order, 'cakes' => $cakes, 'user' => $user, 'emirate' => $emirate, 'timeslot' => $timeslot], function($message)
          {
          $message->from('orders@caketreeonline.com')->to($user["email"],'CakeTree Order')
          ->subject('CakeTree Order Invoice');
        });
         Session::forget('cart');
        return redirect('/confirmed');

 }

 public function getTimeslots() {
   $timeslots = Timeslots::get();
   $current = Carbon::now();
   for($i = 0;$i < count($timeslots);$i++) {
     $str = $timeslots[$i]["time_from"];
     $from = explode(":",$str);
     $from_time = Carbon::today()->addHours($from[0])->addMinutes($from[1])->addSeconds($from[2]);
     if ($current > $from_time) {
       $timeslots[$i]["hide"] = true;
     } else {
       $timeslots[$i]["hide"] = false;
     }
   }
   return $timeslots;
 }

 public function isTimeslotNotAvail($id = 16) {

   $current = Carbon::now();
    $str = Timeslots::where('id',$id)->first()["time_from"];
     $from = explode(":",$str);
     $from_time = Carbon::today()->addHours($from[0])->addMinutes($from[1])->addSeconds($from[2]);
     if ($current > $from_time) {
       return true;
     } else {
       return false;
     }
 }
}
