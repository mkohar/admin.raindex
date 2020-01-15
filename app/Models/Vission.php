<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vission extends Model
{
   protected $table = 'vission';

   public function user()
   {
      return $this->belongsTo('App\User');
   }
}
