<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function dashboard()
   {
      // die('Halaman Dashboard Admin');
      return view('admin.dashboard.index');
      // return view('home');
   }
}
