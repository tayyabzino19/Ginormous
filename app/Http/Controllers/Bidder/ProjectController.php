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
use App\Models\FreelancerApiClient;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function bidLater(){
        $projects = Project::where('status', 'bid_later')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(50);
        return view('bidder.projects.bid-later', compact('projects'));
    }

    public function bidLaterDetails($id = null){
        $project = Project::where('id', $id)->where('user_id', Auth::user()->id)->where('status', 'bid_later')->firstOrFail();

        if(ProjectDetail::where('project_id', $id)->doesntExist()){
            //Freelancer Project details and proposal Api's
            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $project->freelancer_project_id . "/?full_description=true&job_details=true&attachment_details=true&user_details=true&user_avatar=true&user_country_details=true&user_status=true&user_employer_reputation=true";
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
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
            $project->seo_url = $result_array['seo_url'];
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
                'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
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
        
        $project = Project::where('id', $id)->where('user_id', Auth::user()->id)->where('status', 'bid_later')->firstOrFail();

        $project->status = "missed";
        $project->action_date = date('Y-m-d H:i:s');
        
        if($project->save()){
            $response['msg'] = "Ok";
            $response['status'] = "success";
        }else{
            $response['status'] = "error";
            $response['msg'] = "Something went wrong, Please try again";
        }

        return json_encode($response);
    }

    public function bidLaterCounter(){
        $respnse['counter'] = Project::where('user_id', Auth::user()->id)->where('status', 'bid_later')->count();
        return json_encode($respnse);
    }

}
