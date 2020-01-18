<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   public function users()
   {
      return $this->belongsToMany('App\Models\User');
   }

   public function statuses()
   {
      return $this->belongsToMany('App\Models\Status');
   }

   public function client()
   {
      return $this->belongsTo('App\Models\Client');
   }
}
