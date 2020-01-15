<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\AboutUs;
use App\Models\Vission;
use App\Models\Mission;

class AboutUsController extends Controller
{
   public function index()
   {
      $aboutUs = AboutUs::first();
      $vission = Vission::first();
      $mission = Mission::first();
      return view('admin.about.index', compact('aboutUs', 'vission', 'mission'));
   }

   public function updateAbout(Request $request, $id)
   {
      $aboutUs = AboutUs::find($id);
      $aboutUs->about_us = $request->aboutUs;
      $aboutUs->user_id = Auth::user()->id;
      $aboutUs->save();
      return redirect()->back()->with('success', 'About Us Updated!');
   }

   public function updateVission(Request $request, $id)
   {
      $vission = Vission::find($id);
      $vission->vission = $request->vission;
      $vission->user_id = Auth::user()->id;
      $vission->save();
      return redirect()->back()->with('success', 'Vission Updated!');
   }

   public function updateMission(Request $request, $id)
   {
      $mission = Mission::find($id);
      $mission->mission = $request->mission;
      $mission->user_id = Auth::user()->id;
      $mission->save();
      return redirect()->back()->with('success', 'Mission Updated!');
   }
}
