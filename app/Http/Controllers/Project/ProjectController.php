<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Status;
use App\Models\Project;

class ProjectController extends Controller
{
   public function index()
   {
      $projects = Project::all();
      return view('developer.project.index', compact('projects'));
   }

   public function store(Request $request)
   {
      $project = new Project;
      $project->title = $request->title;
      $project->slug = $request->title;
      $project->detail = $request->description;
      $project->category = $request->category;
      $project->client_id = $request->client_id;
      $project->user_id = Auth::user()->id;
      if ($project->save()) {
         if ($request->user_id) {
            foreach ($request->user_id as $user_id) {
               $tag = User::find($user_id);
               $tag->projects()->save($project);
            }
         }
         return redirect()->back()->with('success', 'New Project Added!');
      }
   }

   public function single($id)
   {
      $project = Project::find($id);
      $statuses = Status::all();
      $status = $project->statuses->last();

      return view('developer.project.single', compact('project', 'statuses', 'status'));
   }

   public function updateBudget($id, Request $request)
   {
      $project = Project::find($id);
      $project->budget = $request->budget;
      $project->save();

      return redirect()->back();
   }

   public function updateStatus($id, Request $request)
   {
      $project = Project::find($id);
      $status = Status::find($request->status_id);
      $project->statuses()->save($status);

      return redirect()->back();
   }

   public function updateDeadline($id, Request $request)
   {
      $project = Project::find($id);
      $project->deadline = $request->deadline;
      $project->save();

      return redirect()->back();
   }

   
}
