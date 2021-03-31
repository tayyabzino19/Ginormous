<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Starter;
use App\Models\TechStar;
use App\Models\PortfolioInitiator;
use App\Models\Ender;

use App\Models\LiveFeed;
use App\Models\LiveFeedDetail;
use App\Models\LiveFeedProposal;
use App\Models\Item;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Type;
use App\Models\ProjectFilter;
use App\Models\FreelancerApiClient;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\ProjectProposal;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    public function missed(){
        $projects = Project::with('user')->where('status', 'missed')->orderBy('id', 'desc')->paginate(50);
        return view('admin.projects.missed.index', compact('projects'));
    }

    public function missedDetails($id = null){
        $project = Project::where('id', $id)->where('status', 'missed')->firstOrFail();
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
        
        $project = Project::with(['ProjectDetail','projectProposals'])->where('id', $id)->where('status', 'missed')->firstOrFail();
        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();
        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

        return view('admin.projects.missed.details', compact('project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    }

    public function bidded(){
        $projects = Project::with('user')->where('status', 'bidded')->orderBy('id', 'desc')->paginate(50);
        return view('admin.projects.bidded.index', compact('projects'));
    }

    public function biddedDetails($id = null){

        $project = Project::where('id', $id)->where('status', 'bidded')->firstOrFail();
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

        $project = Project::with(['ProjectDetail','projectProposals'])->where('id', $id)->where('status', 'bidded')->firstOrFail();
        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();
        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();
        
        $our_proposals = $project->projectProposals->where('bidder_id', FreelancerApiClient::first()->client_id);
        return view('admin.projects.bidded.details', compact('our_proposals', 'project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    }


    public function repliedDetails($id = null){

        $project = Project::with(['ProjectDetail','projectProposals'])->where('id', $id)->where('status', 'replied')->firstOrFail();
        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();
        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();
        
        $our_proposals = $project->projectProposals->where('bidder_id', FreelancerApiClient::first()->client_id);
        return view('admin.projects.replied.details', compact('our_proposals', 'project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    }


    public function replied(){
        $projects = Project::with('user', 'ProjectDetail')->where('status', 'replied')->orderBy('id', 'desc')->paginate(50);
        return view('admin.projects.replied.index', compact('projects'));
    }

    public function acceptedDetails($id = null){

        $project = Project::with(['ProjectDetail','projectProposals'])->where('id', $id)->where('status', 'accepted')->firstOrFail();
        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();
        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();
        
        $our_proposals = $project->projectProposals->where('bidder_id', FreelancerApiClient::first()->client_id);
        return view('admin.projects.accepted.details', compact('our_proposals', 'project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    }


    public function accepted(){
        $projects = Project::with('user', 'ProjectDetail')->where('status', 'accepted')->orderBy('id', 'desc')->paginate(50);
        return view('admin.projects.accepted.index', compact('projects'));
    }




    // public function details(){
    //     $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
    //     $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
    //     $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
    //     $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();

    //     $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
    //     $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
    //     $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

    //     return view('admin.projects.details', compact('starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    // }

    public function filters(){
        $project_filter = ProjectFilter::with('skills', 'languages')->limit(1)->first();
        $skills = Skill::where('status', 'active')->orderBy('id', 'desc')->get();
        $languages = Language::all();
        $selected_skills = $project_filter->skills->pluck('id')->toArray();
        $selected_languages = $project_filter->languages->pluck('id')->toArray();
        return view('admin.projects.filters', compact('project_filter', 'skills', 'selected_skills', 'languages', 'selected_languages'));
    }

    public function updateFilters(Request $request){
        //return $request->all();
        $validated = $request->validate([
            'id' => 'required',
            'fixed_price' => 'required',
            'hourly_price' => 'required',
            'skills' => 'required'
        ]);

        $project_filter = ProjectFilter::findOrFail($request->id);

        $project_type = json_decode(json_encode($project_filter->project_type), true);
        $fixed_price = json_decode(json_encode($project_filter->fixed_price), true);
        $hourly_price = json_decode(json_encode($project_filter->hourly_price), true);
        
        $project_type['fixed'] = (boolean) $request->project_type_fixed;
        $project_type['hourly'] = (boolean) $request->project_type_hourly;

        $project_filter->project_type = $project_type;
        
        $fixed_price_array = explode(';', $request->fixed_price);
        $hourly_price_array = explode(';', $request->hourly_price);

        $fixed_price['min'] = $fixed_price_array[0];
        $fixed_price['max'] = $fixed_price_array[1];

        $project_filter->fixed_price = $fixed_price;

        $hourly_price['min'] = $hourly_price_array[0];
        $hourly_price['max'] = $hourly_price_array[1];

        $project_filter->hourly_price = $hourly_price;

        foreach($request->listing_type as $key => $value){
            $listing_type_array[$key] = (boolean) $value;
        }

        $project_filter->listing_type = $listing_type_array;
        
        if($project_filter->save()){
            $project_filter->skills()->sync($request->skills);
            $project_filter->languages()->sync($request->languages);

            $project_filter = ProjectFilter::with('skills', 'languages')->find($request->id);

            //Freelancer projects Search query params
            $projects_search_params = "";
            $and = "&";
            foreach($project_filter->skills as $skill){
                $projects_search_params .= 'jobs[]=' . $skill->freelancer_job_id . $and;
            }

            foreach($project_filter->languages as $language){
                $projects_search_params .= 'languages[]=' . $language->code . $and;
            }

            foreach($project_filter->listing_type as $key => $value){
                if($value){
                    $projects_search_params .= 'project_upgrades[]=' . $key . $and;
                }
            }

            foreach($project_filter->project_type as $key => $value){
                if($value){
                    $projects_search_params .= 'project_types[]=' . $key . $and;
                }
            }

            if($project_filter->project_type->fixed){
                foreach($project_filter->fixed_price as $key => $value){
                    if($key == 'max'){
                        $projects_search_params .= 'max_avg_price=' . $value . $and;
                    }else{
                        $projects_search_params .= 'min_avg_price=' . $value . $and;
                    }
                }
            }

            if($project_filter->project_type->hourly){
                foreach($project_filter->hourly_price as $key => $value){
                    if($key == 'max'){
                        $projects_search_params .= 'max_avg_hourly_rate=' . $value . $and;
                    }else{
                        $projects_search_params .= 'min_avg_hourly_rate=' . $value . $and;;
                    }
                }
            }
            
            //Clear Live Feeds
            //LiveFeed::truncate();
            LiveFeedDetail::truncate();
            LiveFeedProposal::truncate();

            $project_filter->projects_search_params = $projects_search_params;
            $project_filter->save();

            return redirect(route('admin.projects.filters'))->with("success", "Filters setting updated successfully.");
        }

        return redirect(route('admin.projects.filters'))->with("error", "Something went wrong, Please try again.");

    }

    public function markAsReplied($id = null){
        
       $project = Project::where("id", $id)->where('status', 'bidded')->firstOrFail();
       $project->status = "replied";
       $project->action_date = date('Y-m-d H:i:s');

       if($project->save()){
            return redirect(route('admin.projects.bidded'))->with("success", "Project status changed from bidded to replied.");
       }

       return redirect(route('admin.projects.bidded.details', $id))->with("error", "Something went wrong, Please try again.");

    }

    public function markAsAccepted($id = null){
        
        $project = Project::where("id", $id)->where('status', 'replied')->firstOrFail();
        $project->status = "accepted";
        $project->action_date = date('Y-m-d H:i:s');
 
        if($project->save()){
             return redirect(route('admin.projects.replied'))->with("success", "Project status changed from replied to accepted.");
        }
 
        return redirect(route('admin.projects.replied.details', $id))->with("error", "Something went wrong, Please try again.");
 
     }
}
