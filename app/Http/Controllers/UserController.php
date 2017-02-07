<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    public function createTempUser($name, $email) {
      Mail::send('email.invoice', ['order' => $order, 'cakes' => $cakes, 'user' => $user, 'emirate' => $emirate, 'timeslot' => $timeslot], function($message)
         {
         $message->from('orders@caketreeonline.com')->to([$request["email_order"]],'CakeTree Order')
         ->subject('CakeTree Order Invoice');
       });
     }


    public function sendMessage(Request $request) {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'email',
          'message' => 'required',
        ]);
   }


  Mail::send('email.contact', ['message' => $request["messgae"], 'email' => $request["email"], 'name' => $request["name"], function($message)
     {
     $message->from($request["email_order"])->to(['orders@caketreeonline.com'],'Contact form message')
     ->subject('Contact form message');
   });

}

}
