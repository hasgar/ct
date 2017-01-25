<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
  protected $guarded = [
       'id', 'created_at', 'updated_at',
   ];
   protected $table = "order_status";
}
