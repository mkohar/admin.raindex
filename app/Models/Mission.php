<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
   protected $table = 'mission';

   public function user()
   {
      return $this->belongsTo('App\Models\User');
   }
}
