<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function createTempUser($name, $email) {

      if (User::where('email',$email)->count() > 0) {
        return User::where('email',$email)->first();
      } else {
        $password = Hash::make(str_random(8));

        $user = User::create([
          'email' => $email,
          'name' => $name,
          'password' => $password
        ]);
        Mail::send('email.newUser', ['email' => $email, 'password' => $password, 'name' => $name], function($message) use ($email)
         {
         $message->from('order@caketreeonline.com')->to([$email],'New Account Created with Cake Tree')->subject('New Account Created with Cake Tree');
         });
         return $user;
      }

     }


    public function sendMessage(Request $request) {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'email',
          'message' => 'required',
        ]);

  Mail::send('email.contact', ['message' => $request["message"], 'email' => $request["email"], 'name' => $request["name"]], function($message) 
     {
     $message->from('orders@caketreeonline.com')->to(['contacts@caketreeonline.com'],'Contact form message')->subject('Contact form message');
   });

}

}
