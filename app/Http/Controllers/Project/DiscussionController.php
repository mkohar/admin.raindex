<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Events\DiscussionSent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

use App\Models\Discussion;

class DiscussionController extends Controller
{
   public function getDiscussion($id)
   {
      return Discussion::with('user')->where('project_id', $id)->get();
   }

   public function postDiscussion($id, Request $request)
   {
      $discussion = Discussion::create([
         'subject' => $request->subject,
         'user_id' => Auth::user()->id,
         'project_id' => $id
      ]);

      // broadcast (new DiscussionSent($discussion))->toOther();
      broadcast(new DiscussionSent($discussion))->toOthers();

      return $discussion;
   } 
}
