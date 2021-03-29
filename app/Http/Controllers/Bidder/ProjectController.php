<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\ProjectProposal;
use Auth;
use App\Models\Starter;
use App\Models\TechStar;
use App\Models\PortfolioInitiator;
use App\Models\Ender;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Type;
use App\Models\Item;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function bidLater(){
        $projects = Project::where('status', 'bid_later')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(50);
        return view('bidder.projects.bid-later', compact('projects'));
    }

    public function bidLaterDetails($id = null){
        $project = Project::findOrFail($id);

        if(ProjectDetail::where('project_id', $id)->doesntExist()){
            //Freelancer Project details and proposal Api's
            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $project->freelancer_project_id . "/?full_description=true&job_details=true&attachment_details=true&user_details=true&user_avatar=true&user_country_details=true&user_status=true&user_employer_reputation=true";
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get($url);
            
            $response_array = $response->json();
            if($response_array['status'] == 'error'){
                return $response_array;
            }

            $result_array = $response_array['result'];
            $detail = new ProjectDetail;

            $detail->project_id = $id;
            $detail->jobs = $result_array['jobs'];
            $detail->attachments = $result_array['attachments'];
            $detail->description = $result_array['description'];
            $detail->employer_username = $result_array['owner']['username'];
            $detail->employer_public_name = $result_array['owner']['public_name'];
            $detail->employer_avatar_cdn = $result_array['owner']['avatar_cdn'];
            $detail->employer_registration_date = $result_array['owner']['registration_date'];
            $detail->country = $result_array['owner']['location']['country'];
            $detail->employer_status = $result_array['owner']['status'];
            $detail->save();

            //Update LiveFeed Model
            $project = Project::findOrFail($id);
            $project->title = $result_array['title'];
            $project->currency = $result_array['currency'];
            $project->type = $result_array['type'];
            $project->budget = $result_array['budget'];
            $project->preview_description = $result_array['preview_description'];
            $project->bid_stats = $result_array['bid_stats'];
            $project->time_submitted = $result_array['time_submitted'];
            $project->time_updated = $result_array['time_updated'];
            $project->upgrades = $result_array['upgrades'];
            $project->employer_reputation = $result_array['owner']['employer_reputation']['entire_history'];
            $project->save();

            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $project->freelancer_project_id . '/bids/?user_details=true&user_avatar=true&user_country_details=true&user_reputation=true&user_display_info=true';
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get($url);
            
           $response_array = $response->json();
    
            if(isset($response_array['result']) && count($response_array['result']) > 0){
                $bids = $response_array['result']['bids'];
                $users = $response_array['result']['users'];
                foreach($bids as $bid){
                    $proposal = new ProjectProposal;
                    $proposal->bid_id = $bid['id'];
                    $proposal->project_id = $id;
                    $proposal->bidder_id = $bid['bidder_id'];
                    $proposal->amount = $bid['amount'];
                    $proposal->period = $bid['period'];
                    $proposal->description = $bid['description'];
                    $proposal->submitdate = $bid['submitdate'];
                    $proposal->username = $users[$bid['bidder_id']]['username'];
                    $proposal->public_name = $users[$bid['bidder_id']]['public_name'];
                    $proposal->tagline = $users[$bid['bidder_id']]['tagline'];
                    $proposal->reputation = $users[$bid['bidder_id']]['reputation']['entire_history'];
                    $proposal->country = $users[$bid['bidder_id']]['location']['country'];
                    $proposal->avatar_cdn = $users[$bid['bidder_id']]['avatar_cdn'];
                    $proposal->save();
                }
            }

        }

        $project = Project::with(['ProjectDetail','projectProposals'])->where('id', $id)->where('user_id', Auth::user()->id)->where('status', 'bid_later')->firstOrFail();
        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();

        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

        return view('bidder.projects.bid-later-details', compact('project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
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

    public function getPortfolioItems(Request $request){
        // return count($request->types);
          if(!isset($request->types) && !isset($request->skills) && !isset($request->industries)){
              $response['status'] = "error";
              $response['msg'] = "Items not found";
              return json_encode($response);
          }
        
        $items = Item::select("url");
  
        if(isset($request->types)){
          foreach($request->types as $type_id){
              $items->whereHas('types', function($query) use ($type_id){
                  $query->where('type_id', $type_id);
              });
            }
        }
        
        if(isset($request->skills)){
            $skills = Skill::whereIn('freelancer_job_id', $request->skills)->pluck('id');
          foreach($skills as $type_id){
              $items->whereHas('skills', function($query) use ($type_id){
                  $query->where('skill_id', $type_id);
              });
            }
        }
  
        if(isset($request->industries)){
          foreach($request->industries as $type_id){
              $items->whereHas('industries', function($query) use ($type_id){
                  $query->where('industry_id', $type_id);
              });
            }
        }
        
        $items = $items->where("status", "active")->inRandomOrder()->limit(5)->get();
  
        $response['status'] = "error";
        $response['msg'] = "Items not found";
  
        if(count($items)){
            $response['status'] = "success";
            $response['items'] = $items;
            $response['msg'] = "";
        }
  
        return json_encode($response);
  
      }

      public function bidLaterCounter(){
          $respnse['counter'] = Project::where('user_id', Auth::user()->id)->where('status', 'bid_later')->count();
          return json_encode($respnse);
      }

      public function syncProjectDetails($id = null){
        $project_detail = ProjectDetail::with('Project')->where('project_id', $id)->firstOrFail();
        
        try{
            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $project_detail->project->freelancer_project_id . "/?full_description=true&job_details=true&attachment_details=true&user_details=true&user_avatar=true&user_country_details=true&user_status=true&user_employer_reputation=true";
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get($url);
            
           $response_array = $response->json();

            if($response_array['status'] == 'error'){
                return $response_array;
            }
            
            // Update LiveFeedDetail Model
            $result_array = $response_array['result'];
            $project_detail->jobs = $result_array['jobs'];
            $project_detail->attachments = $result_array['attachments'];
            $project_detail->description = $result_array['description'];
            $project_detail->employer_username = $result_array['owner']['username'];
            $project_detail->employer_public_name = $result_array['owner']['public_name'];
            $project_detail->employer_avatar_cdn = $result_array['owner']['avatar_cdn'];
            $project_detail->employer_registration_date = $result_array['owner']['registration_date'];
            $project_detail->country = $result_array['owner']['location']['country'];
            $project_detail->employer_status = $result_array['owner']['status'];
            $project_detail->save();

            //Update LiveFeed Model
            $project = Project::findOrFail($id);
            $project->title = $result_array['title'];
            $project->currency = $result_array['currency'];
            $project->type = $result_array['type'];
            $project->budget = $result_array['budget'];
            $project->preview_description = $result_array['preview_description'];
            $project->bid_stats = $result_array['bid_stats'];
            $project->time_submitted = $result_array['time_submitted'];
            $project->time_updated = $result_array['time_updated'];
            $project->upgrades = $result_array['upgrades'];
            $project->employer_reputation = $result_array['owner']['employer_reputation']['entire_history'];
            $project->save();

            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $project_detail->project->freelancer_project_id . '/bids/?user_details=true&user_avatar=true&user_country_details=true&user_reputation=true&user_display_info=true';
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get($url);
            
            $response_array = $response->json();
            
            //Update LiveFeedProposal Model
            if(isset($response_array['result']) && count($response_array['result']) > 0){

                $bids = $response_array['result']['bids'];
                $users = $response_array['result']['users'];
                foreach($bids as $bid){

                    $proposal = ProjectProposal::where('bid_id', $bid['id'])->first();

                    if(!$proposal){
                        $proposal = new ProjectProposal;
                        $proposal->bidder_id = $bid['bidder_id'];
                    }

                    $proposal->project_id = $id;
                    $proposal->bid_id = $bid['id'];
                    $proposal->amount = $bid['amount'];
                    $proposal->period = $bid['period'];
                    $proposal->description = $bid['description'];
                    $proposal->submitdate = $bid['submitdate'];
                    $proposal->username = $users[$bid['bidder_id']]['username'];
                    $proposal->public_name = $users[$bid['bidder_id']]['public_name'];
                    $proposal->tagline = $users[$bid['bidder_id']]['tagline'];
                    $proposal->reputation = $users[$bid['bidder_id']]['reputation']['entire_history'];
                    $proposal->country = $users[$bid['bidder_id']]['location']['country'];
                    $proposal->avatar_cdn = $users[$bid['bidder_id']]['avatar_cdn'];
                    $proposal->save();
                }
            }
            return back()->with('success', 'Data synchronization completed successfully.');
        }catch (Throwable $e) {
            return back()->with('error', 'Data synchronization failed.' . $e);
        }
      }


      public function bidNow(Request $request){
        
        //apply validations
        $bidder_id = 53598218;
        $request->validate([
            'id' => 'required',
            'freelancer_project_id' => 'required',
            'amount' => 'required',
            'period' => 'required',
            'milestone_percentage' => 'required',
            //'description' => 'required'
        ]);

        $description = "";

        if($request->starter != ""){
            $description .= $request->starter . '
            ';
        }

        if($request->about != ""){
            $description .= $request->about . '
            ';
        }

        if($request->tech_star != ""){
            $description .= $request->tech_star . '
            ';
        }

        if($request->portfolio_initiator != ""){
            $description .= $request->portfolio_initiator . '
            ';
        }

        if($request->portfolio != ""){
            $description .= $request->portfolio . '
            ';
        }
        if($request->ender != ""){
            $description .= $request->ender . '
            ';
        }
        //return nl2br($description);


        //return $request->all();

        $project = Project::where('id', $request->id)->where('user_id', Auth::user()->id)->where('freelancer_project_id', $request->freelancer_project_id)->firstOrFail();
        //send bid to freelancer.com
        $response = Http::withHeaders([
            'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR',
        ])->post('https://www.freelancer.com/api/projects/0.1/bids/', [
            'project_id' => (integer) $request->project_id,
            'bidder_id' => $bidder_id,
            'amount' => (float) $request->amount,
            'period' => (integer) $request->period,
            'milestone_percentage' => (integer) $request->milestone_percentage,
            'description' => $request->description,
        ]);

        $response_array = $response->json();
        if($response_array['status'] == 'error'){
            return back()->with('error', $response_array['message']);
        }

        return redirect(route('bidder.projects.bid_later'))->with('success', "Proposal has been sent.");
    }
}
