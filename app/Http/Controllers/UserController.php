<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    public function createTempUser($name, $email) {
      if (User::where("email",$email)->count() > 0)
          return User::where("email",$email)->first();
      return User::create(['name' => $name, 'email' => $email,'password'=>bcrypt($this->generateRandomString())]);
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
}
