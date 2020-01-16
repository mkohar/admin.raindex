<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Client {
   public static function get_clients() {
      $clients = DB::table('clients')->get();
      return $clients;
   }
}