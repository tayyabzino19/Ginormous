<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LiveFeed;
use App\Models\LiveFeedDetail;
use App\Models\LiveFeedProposal;
use App\Models\Starter;
use App\Models\TechStar;
use App\Models\PortfolioInitiator;
use App\Models\Ender;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Type;
use App\Models\Item;
use App\Models\ProjectFilter;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\ProjectProposal;
use Auth;

use Illuminate\Support\Facades\Http;

class LiveFeedController extends Controller
{
    public function liveFeed(){
       
        $projects = LiveFeed::orderBy('time_submitted', 'desc')->paginate(50);
        return view('bidder.projects.live-feed', compact('projects'));
    }

    public function getLiveFeed(){

        $projects_filter = ProjectFilter::first();
        $url = "https://www.freelancer.com/api/projects/0.1/projects/active/?sort_field=time_submitted&user_details=true&user_employer_reputation=true&" . $projects_filter;
 
        $response = Http::withHeaders([
            'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
        ])->get($url);
        
        $response_array = $response->json();
        
        if($response_array['status'] == 'error'){
            return $response_array;
        }

        $projects = $response_array['result']['projects'];
        $users = $response_array['result']['users'];

        $fresh_project_ids = collect($projects)->pluck('id');
        $live_feed_project_ids = LiveFeed::whereIn('project_id', $fresh_project_ids)->get()->pluck('project_id')->toArray();
        $project_ids = Project::whereIn('freelancer_project_id', $fresh_project_ids)->get()->pluck('project_id')->toArray();
        
        foreach($projects as $project){

            if(in_array($project['id'], $live_feed_project_ids)){
                continue;
            }

            if(in_array($project['id'], $project_ids)){
                continue;
            }

            $projects_array[] = [
                'project_id' => $project['id'],
                'title' => $project['title'],
                'preview_description' => $project['preview_description'],
                'type' => $project['type'],
                'budget' => json_encode($project['budget']),
                'currency' => json_encode($project['currency']),
                'upgrades' => json_encode($project['upgrades']),
                'bid_stats' => json_encode($project['bid_stats']),
                'reputation' => json_encode($users[$project['owner_id']]['employer_reputation']['entire_history']),
                'time_submitted' => $project['time_submitted'],
                'time_updated' => $project['time_updated']
            ];
        }
        
        if(isset($projects_array)){
            LiveFeed::insert(
                $projects_array
            );
        }

       return redirect(route('bidder.projects.live_feed'));
        
    }

    public function liveFeedDetails($id = null){
        
        $LiveFeed = LiveFeed::findOrFail($id);

        if(LiveFeedDetail::where('live_feed_id', $id)->doesntExist()){
            //Freelancer Project details and proposal Api's
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get("https://www.freelancer.com/api/projects/0.1/projects/" . $LiveFeed->project_id . "/?full_description=true&job_details=true&attachment_details=true&user_details=true&user_avatar=true&user_country_details=true&user_status=true&user_employer_reputation=true");
            
            $response_array = $response->json();
            if($response_array['status'] == 'error'){
                return $response_array;
            }

            $result_array = $response_array['result'];
            $live_feed_details = new LiveFeedDetail;

            $live_feed_details->live_feed_id = $id;
            $live_feed_details->jobs = $result_array['jobs'];
            $live_feed_details->attachments = $result_array['attachments'];
            $live_feed_details->description = $result_array['description'];
            $live_feed_details->username = $result_array['owner']['username'];
            $live_feed_details->public_name = $result_array['owner']['public_name'];
            $live_feed_details->avatar_cdn = $result_array['owner']['avatar_cdn'];
            $live_feed_details->registration_date = $result_array['owner']['registration_date'];
            $live_feed_details->country = $result_array['owner']['location']['country'];
            $live_feed_details->reputation = $result_array['owner']['employer_reputation']['entire_history'];
            $live_feed_details->status = $result_array['owner']['status'];
            $live_feed_details->save();

            //Update LiveFeed Model
            $live_feed = liveFeed::findOrFail($id);
            $live_feed->title = $result_array['title'];
            $live_feed->currency = $result_array['currency'];
            $live_feed->type = $result_array['type'];
            $live_feed->budget = $result_array['budget'];
            $live_feed->preview_description = $result_array['preview_description'];
            $live_feed->bid_stats = $result_array['bid_stats'];
            $live_feed->time_submitted = $result_array['time_submitted'];
            $live_feed->time_updated = $result_array['time_updated'];
            $live_feed->upgrades = $result_array['upgrades'];
            $live_feed->reputation = $result_array['owner']['employer_reputation']['entire_history'];
            $live_feed->save();

            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get("https://www.freelancer.com/api/projects/0.1/projects/" . $LiveFeed->project_id . '/bids/?user_details=true&user_avatar=true&user_country_details=true&user_reputation=true&user_display_info=true');
            
           $response_array = $response->json();
    
            if(isset($response_array['result']) && count($response_array['result']) > 0){
                $bids = $response_array['result']['bids'];
                $users = $response_array['result']['users'];
                foreach($bids as $bid){
                    $live_feed_proposal = new LiveFeedProposal;
                    $live_feed_proposal->bid_id = $bid['id'];
                    $live_feed_proposal->live_feed_id = $id;
                    $live_feed_proposal->bidder_id = $bid['bidder_id'];
                    $live_feed_proposal->amount = $bid['amount'];
                    $live_feed_proposal->period = $bid['period'];
                    $live_feed_proposal->description = $bid['description'];
                    $live_feed_proposal->submitdate = $bid['submitdate'];

                    $live_feed_proposal->username = $users[$bid['bidder_id']]['username'];
                    $live_feed_proposal->public_name = $users[$bid['bidder_id']]['public_name'];
                    $live_feed_proposal->tagline = $users[$bid['bidder_id']]['tagline'];
    
                    $live_feed_proposal->reputation = $users[$bid['bidder_id']]['reputation']['entire_history'];
                    $live_feed_proposal->country = $users[$bid['bidder_id']]['location']['country'];
                    $live_feed_proposal->avatar_cdn = $users[$bid['bidder_id']]['avatar_cdn'];
                    $live_feed_proposal->save();
                }
            }

        }


        $project = LiveFeed::with('LiveFeedDetail', 'LiveFeedProposals')->findOrFail($id);
        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();

        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

        return view('bidder.projects.details', compact('project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
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
          foreach($request->skills as $type_id){
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
        
        $items = $items->where("status", "active")->limit(5)->get();
  
        $response['status'] = "error";
        $response['msg'] = "Items not found";
  
        if(count($items)){
            $response['status'] = "success";
            $response['items'] = $items;
            $response['msg'] = "";
        }
  
        return json_encode($response);
  
      }

      public function syncLiveFeedDetails($id = null){

        $live_feed_details = LiveFeedDetail::with('liveFeed')->where('live_feed_id', $id)->first();

        if(!$live_feed_details){
            return abort(404);
        }
        
        try{
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get("https://www.freelancer.com/api/projects/0.1/projects/" . $live_feed_details->liveFeed->project_id . "/?full_description=true&job_details=true&attachment_details=true&user_details=true&user_avatar=true&user_country_details=true&user_status=true&user_employer_reputation=true");
            
           $response_array = $response->json();

            if($response_array['status'] == 'error'){
                return $response_array;
            }
            
            // Update LiveFeedDetail Model
            $result_array = $response_array['result'];
            $live_feed_details->live_feed_id = $id;
            $live_feed_details->jobs = $result_array['jobs'];
            $live_feed_details->attachments = $result_array['attachments'];
            $live_feed_details->description = $result_array['description'];
            $live_feed_details->username = $result_array['owner']['username'];
            $live_feed_details->public_name = $result_array['owner']['public_name'];
            $live_feed_details->avatar_cdn = $result_array['owner']['avatar_cdn'];
            $live_feed_details->registration_date = $result_array['owner']['registration_date'];
            $live_feed_details->country = $result_array['owner']['location']['country'];
            $live_feed_details->reputation = $result_array['owner']['employer_reputation']['entire_history'];
            $live_feed_details->status = $result_array['owner']['status'];
            $live_feed_details->save();

            //Update LiveFeed Model
            $live_feed = liveFeed::findOrFail($id);
            $live_feed->title = $result_array['title'];
            $live_feed->currency = $result_array['currency'];
            $live_feed->type = $result_array['type'];
            $live_feed->budget = $result_array['budget'];
            $live_feed->preview_description = $result_array['preview_description'];
            $live_feed->bid_stats = $result_array['bid_stats'];
            $live_feed->time_submitted = $result_array['time_submitted'];
            $live_feed->time_updated = $result_array['time_updated'];
            $live_feed->upgrades = $result_array['upgrades'];
            $live_feed->reputation = $result_array['owner']['employer_reputation']['entire_history'];
            $live_feed->save();

            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get("https://www.freelancer.com/api/projects/0.1/projects/" . $live_feed_details->liveFeed->project_id . '/bids/?user_details=true&user_avatar=true&user_country_details=true&user_reputation=true&user_display_info=true');
            
            $response_array = $response->json();
            
            //Update LiveFeedProposal Model
            if(isset($response_array['result']) && count($response_array['result']) > 0){
                $bids = $response_array['result']['bids'];
                $users = $response_array['result']['users'];
                foreach($bids as $bid){


                    $live_feed_proposal = LiveFeedProposal::where('bid_id', $bid['id'])->first();

                    if(!$live_feed_proposal){
                        $live_feed_proposal = new LiveFeedProposal;
                        $live_feed_proposal->bidder_id = $bid['bidder_id'];
                    }

                    $live_feed_proposal->live_feed_id = $id;
                    $live_feed_proposal->bid_id = $bid['id'];
                    $live_feed_proposal->amount = $bid['amount'];
                    $live_feed_proposal->period = $bid['period'];
                    $live_feed_proposal->description = $bid['description'];
                    $live_feed_proposal->submitdate = $bid['submitdate'];
                    $live_feed_proposal->username = $users[$bid['bidder_id']]['username'];
                    $live_feed_proposal->public_name = $users[$bid['bidder_id']]['public_name'];
                    $live_feed_proposal->tagline = $users[$bid['bidder_id']]['tagline'];
                    $live_feed_proposal->reputation = $users[$bid['bidder_id']]['reputation']['entire_history'];
                    $live_feed_proposal->country = $users[$bid['bidder_id']]['location']['country'];
                    $live_feed_proposal->avatar_cdn = $users[$bid['bidder_id']]['avatar_cdn'];
                    $live_feed_proposal->save();
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
            'project_id' => 'required',
            'amount' => 'required',
            'period' => 'required',
            'milestone_percentage' => 'required',
            'description' => 'required'
        ]);

        $live_feed = LiveFeed::with('LiveFeedDetail', 'LiveFeedProposals')->where('id', $request->id)->where('project_id', $request->project_id)->first();
        if(!$live_feed){
            return abort(404);
        }

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

        //if bid successfully added. Save project
        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->freelancer_project_id = $live_feed->project_id;
        $project->title = $live_feed->title;
        $project->preview_description = $live_feed->preview_description;
        $project->time_submitted = $live_feed->time_submitted;
        $project->time_updated = $live_feed->time_updated;
        $project->type = $live_feed->type;
        $project->currency = json_decode(json_encode($live_feed->currency), true);
        $project->employer_reputation = json_decode(json_encode($live_feed->LiveFeedDetail->reputation), true);
        $project->budget = json_decode(json_encode($live_feed->budget), true);
        $project->upgrades = json_decode(json_encode($live_feed->upgrades), true);
        $project->bid_stats = json_decode(json_encode($live_feed->bid_stats), true);
        $project->status = 'bidded';
        $project->save();

        //Save project details
        $detail = new ProjectDetail;
        $detail->project_id = $project->id;
        $detail->description = $live_feed->LiveFeedDetail->description;
        $detail->jobs = json_decode(json_encode($live_feed->LiveFeedDetail->jobs), true);
        $detail->attachments = json_decode(json_encode($live_feed->LiveFeedDetail->attachments), true);
        $detail->employer_registration_date = $live_feed->LiveFeedDetail->registration_date;
        $detail->country = json_decode(json_encode($live_feed->LiveFeedDetail->country), true);
        $detail->employer_status = json_decode(json_encode($live_feed->LiveFeedDetail->status), true);
        $detail->employer_username = $live_feed->LiveFeedDetail->username;
        $detail->employer_public_name = $live_feed->LiveFeedDetail->public_name;
        $detail->employer_avatar_cdn = $live_feed->LiveFeedDetail->avatar_cdn;
        $detail->save();

        //save project proposals
        foreach($live_feed->LiveFeedProposals as $live_feed_proposal){
            $proposal = new ProjectProposal;
            $proposal->bid_id = $live_feed_proposal->bid_id;
            $proposal->project_id = $project->id;
            $proposal->bidder_id = $live_feed_proposal->bidder_id;
            $proposal->username = $live_feed_proposal->username;
            $proposal->public_name = $live_feed_proposal->public_name;
            $proposal->tagline = $live_feed_proposal->tagline;
            $proposal->avatar_cdn = $live_feed_proposal->avatar_cdn;
            $proposal->amount = $live_feed_proposal->amount;
            $proposal->period = $live_feed_proposal->period;
            $proposal->description = $live_feed_proposal->description;
            $proposal->submitdate = $live_feed_proposal->submitdate;
            $proposal->reputation = json_decode(json_encode($live_feed_proposal->reputation), true);
            $proposal->country = json_decode(json_encode($live_feed_proposal->country), true);
            $proposal->save();
        }

        //remove live feed details for this project
        $live_feed->LiveFeedDetail()->delete();
        $live_feed->LiveFeedProposals()->delete();
        $live_feed->delete();
       
        return redirect(route('bidder.projects.live_feed'))->with('success', "Proposal has been sent.");
    }

    public function markAsMissIt($id = null){
        
        $live_feed = LiveFeed::findOrFail($id);
        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->freelancer_project_id = $live_feed->project_id;
        $project->title = $live_feed->title;
        $project->preview_description = $live_feed->preview_description;
        $project->type = $live_feed->type;
        $project->budget = $live_feed->budget;
        $project->currency = $live_feed->currency;
        $project->upgrades = $live_feed->upgrades;
        $project->bid_stats = $live_feed->bid_stats;
        $project->employer_reputation = $live_feed->reputation;
        $project->time_submitted = $live_feed->time_submitted;
        $project->time_updated = $live_feed->time_updated;
        $project->status = "missed";

        if($project->save()){
            $live_feed->LiveFeedDetail()->delete();
            $live_feed->LiveFeedProposals()->delete();
            $live_feed->delete();

            $response['msg'] = "Ok";
            $response['status'] = "success";
        }else{
            $response['status'] = "error";
            $response['msg'] = "Something went wrong, Please try again";
        }

        return json_encode($response);
    }

    public function markAsBidLater($id = null){
        
        $live_feed = LiveFeed::findOrFail($id);
        $project = new Project;
        $project->user_id = Auth::user()->id;
        $project->freelancer_project_id = $live_feed->project_id;
        $project->title = $live_feed->title;
        $project->preview_description = $live_feed->preview_description;
        $project->type = $live_feed->type;
        $project->budget = $live_feed->budget;
        $project->currency = $live_feed->currency;
        $project->upgrades = $live_feed->upgrades;
        $project->bid_stats = $live_feed->bid_stats;
        $project->employer_reputation = $live_feed->reputation;
        $project->time_submitted = $live_feed->time_submitted;
        $project->time_updated = $live_feed->time_updated;
        $project->status = "bid_later";

        if($project->save()){
            $live_feed->LiveFeedDetail()->delete();
            $live_feed->LiveFeedProposals()->delete();
            $live_feed->delete();

            $response['msg'] = "Ok";
            $response['status'] = "success";
        }else{
            $response['status'] = "error";
            $response['msg'] = "Something went wrong, Please try again";
        }

        return json_encode($response);
    }
}
