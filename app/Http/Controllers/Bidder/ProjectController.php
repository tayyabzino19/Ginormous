<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use Auth;

class ProjectController extends Controller
{
    public function bidLater(){
        $projects = Project::where('status', 'bid_later')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(50);
        return view('bidder.projects.bid-later', compact('projects'));
    }

    public function bidLaterDetails($id = null){
        $project = Project::where('id', $id)->where('user_id', Auth::user()->id)->where('status', 'bid_later')->first();
        if(!$project){
            return abort(404);
        }
        return view('bidder.projects.bid-later-details', compact('project'));
    }

    public function missProject($id = null){
        
        $project = Project::where('id', $id)->where('user_id', Auth::user()->id)->where('status', 'bid_later')->first();
        if(!$project){
            return abort(404);
        }

        $project->status = "missed";
        if($project->save()){
            $response['msg'] = "Ok";
            $response['status'] = "success";
        }else{
            $response['status'] = "error";
            $response['msg'] = "Something went wrong, Please try again";
        }

        return json_encode($response);
    }

    
}
