<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Project;

class UserController extends Controller
{
   public function getUser($id)
   {
      $user = User::whereHas('projects', function($q) use($id) {
         $q->where('projects.id', $id);
      })->get();
      return $user;
   }
}
