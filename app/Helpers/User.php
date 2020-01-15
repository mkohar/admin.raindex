<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class User {
   public static function get_users() {
      $users = DB::table('users')->get();
      return $users;
   }
}