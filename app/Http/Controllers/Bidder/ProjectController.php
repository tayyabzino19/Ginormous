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

use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function liveFeed(){
        $projects = LiveFeed::orderBy('time_updated', 'desc')->paginate(50);
        return view('bidder.projects.live-feed', compact('projects'));
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


            $response = Http::withHeaders([
                'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
            ])->get("https://www.freelancer.com/api/projects/0.1/projects/" . $LiveFeed->project_id . '/bids/?user_details=true&user_avatar=true&user_country_details=true&user_reputation=true&user_display_info=true');
            
            $response_array = $response->json();
    
            if(isset($response_array['result']) && count($response_array['result']) > 0){
                $bids = $response_array['result']['bids'];
                $users = $response_array['result']['users'];
                foreach($bids as $bid){
                    $live_feed_proposal = new LiveFeedProposal;
                    $live_feed_proposal->live_feed_id = $id;
                    $live_feed_proposal->bidder_id = $bid['bidder_id'];
                    $live_feed_proposal->amount = $bid['amount'];
                    $live_feed_proposal->period = $bid['period'];
                    $live_feed_proposal->description = $bid['description'];
                    $live_feed_proposal->submitdate = $bid['submitdate'];

                    $live_feed_proposal->username = $users[$bid['bidder_id']]['username'];
                    $live_feed_proposal->public_name = $users[$bid['bidder_id']]['public_name'];
                    //$live_feed_proposal->public_name = $users[$bid['bidder_id']]['tagline'];
    
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
}
