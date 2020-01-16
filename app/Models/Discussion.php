<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{

   protected $guarded = [
      'id'
   ];

   public function users()
   {
      return $this->hasMany('App\Models\User');
   }
   public function user()
   {
      return $this->belongsTo('App\Models\User');
   }
}
