<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
   protected $table = 'about_us';

   public function user()
   {
      return $this->belongsTo('App\User');
   }
}
