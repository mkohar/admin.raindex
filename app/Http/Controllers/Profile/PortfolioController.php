<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Portfolio;
use App\Models\PortfolioImage;

class PortfolioController extends Controller
{
   public function index()
   {
      $portfolios = Portfolio::all();
      return view('admin.portfolio.index', compact('portfolios'));
   }

   public function store(Request $request)
   {
      $slug = str_slug($request->title, '-');
      $portfolio = Portfolio::where('slug', $slug)->first();
      if (!empty($portfolio)) {
         $slug = str_slug($request->title, '-') . '-' . time();
      }

      $portfolio = new Portfolio;
      $portfolio->title = $request->title;
      $portfolio->slug = $slug;
      $portfolio->description = $request->description;
      $portfolio->category = $request->category;
      $portfolio->user_id = Auth::user()->id;
      if ($portfolio->save()) {
         // Store image
         if ($request->images) {
            foreach ($request->images as $key => $image) {
               $extension  = $image->getClientOriginalExtension();
               $file_name = $slug. '-'. $key . '.' . $extension;
               $image->storeAs(
                  'public/portfolio', $file_name
               );

               $portfolio_images = new PortfolioImage;
               $portfolio_images->file_name = $file_name;
               $portfolio_images->portfolio_id = $portfolio->id;
               $portfolio_images->save();
            }
         }
      }
      return redirect()->back()->with('success', 'New Portfolio Added!');
   }
}
