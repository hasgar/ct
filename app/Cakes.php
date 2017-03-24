<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cakes extends Model
{
  protected $guarded = [
      'id', 'created_at', 'updated_at',
  ];
}
