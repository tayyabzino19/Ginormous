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
use App\Models\Country;
use App\Models\Currency;
use App\Models\Exclude;
use App\Models\Language;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Type;
use App\Models\ProjectFilter;
use App\Models\FreelancerApiClient;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\ProjectProposal;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class ProjectController extends Controller
{
    //defining search vars
    protected $date_range, $user_id;

    public function pool(){
        $projects = LiveFeed::with('user')->orderBy('time_submitted', 'desc')->paginate(100);
        $users = User::where('role', 'bidder')->get();
        $date_range = $this->date_range;
        $user_id = $this->user_id;
        return view('admin.projects.pool.index', compact('projects', 'users', 'date_range', 'user_id'));
    }


    public function poolDetails($id = null){
        
        
        $LiveFeed = LiveFeed::where('id', $id)->firstOrFail();

        if(LiveFeedDetail::where('live_feed_id', $id)->doesntExist()){
            //Freelancer Project details and proposal Api's
            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $LiveFeed->project_id . "/?full_description=true&job_details=true&attachment_details=true&user_details=true&user_avatar=true&user_country_details=true&user_status=true&user_employer_reputation=true";
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
            ])->get($url);
            
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
            $live_feed->seo_url = $result_array['seo_url'];
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

            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $LiveFeed->project_id . '/bids/?user_details=true&user_avatar=true&user_country_details=true&user_reputation=true&user_display_info=true';
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
            ])->get($url);
            
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

        return view('admin.projects.pool.details', compact('project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    }

      public function syncPoolDetails($id = null){

        $live_feed_details = LiveFeedDetail::with('liveFeed')->where('live_feed_id', $id)->first();

        if(!$live_feed_details){
            return abort(404);
        }
        
        try{
            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $live_feed_details->liveFeed->project_id . "/?full_description=true&job_details=true&attachment_details=true&user_details=true&user_avatar=true&user_country_details=true&user_status=true&user_employer_reputation=true";
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
            ])->get($url);
            
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
            $live_feed->seo_url = $result_array['seo_url'];
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

            $url = "https://www.freelancer.com/api/projects/0.1/projects/" . $live_feed_details->liveFeed->project_id . '/bids/?user_details=true&user_avatar=true&user_country_details=true&user_reputation=true&user_display_info=true';
            $response = Http::withHeaders([
                'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
            ])->get($url);
            
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



    public function missed(){
        $projects = Project::with('user')->where('status', 'missed')->orderBy('action_date', 'desc')->paginate(100);
        $users = User::where('role', 'bidder')->get();
        $date_range = $this->date_range;
        $user_id = $this->user_id;
        return view('admin.projects.missed.index', compact('projects', 'users', 'date_range', 'user_id'));
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



    public function bidLater(){
        $projects = Project::with('user')->where('status', 'bid_later')->orderBy('action_date', 'desc')->paginate(100);
        $users = User::where('role', 'bidder')->get();
        $date_range = $this->date_range;
        $user_id = $this->user_id;
        return view('admin.projects.bid-later.index', compact('projects', 'users', 'date_range', 'user_id'));
    }

    public function bidLaterDetails($id = null){

        $project = Project::where('id', $id)->where('status', 'bid_later')->firstOrFail();
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

        $project = Project::with(['ProjectDetail','projectProposals'])->where('id', $id)->where('status', 'bid_later')->firstOrFail();
        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();
        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

        return view('admin.projects.bid-later.details', compact('project', 'starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    }


    public function bidded(){
        $projects = Project::with('user')->where('status', 'bidded')->orderBy('action_date', 'desc')->paginate(100);
        $users = User::where('role', 'bidder')->get();
        $date_range = $this->date_range;
        $user_id = $this->user_id;
        return view('admin.projects.bidded.index', compact('projects', 'users', 'date_range', 'user_id'));
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
        $projects = Project::with('user', 'ProjectDetail')->where('status', 'replied')->orderBy('action_date', 'desc')->paginate(100);
        $users = User::where('role', 'bidder')->get();
        $date_range = $this->date_range;
        $user_id = $this->user_id;
        return view('admin.projects.replied.index', compact('projects', 'users', 'date_range', 'user_id'));
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
        $projects = Project::with('user', 'ProjectDetail')->where('status', 'accepted')->orderBy('action_date', 'desc')->paginate(100);
        $users = User::where('role', 'bidder')->get();
        $date_range = $this->date_range;
        $user_id = $this->user_id;
        return view('admin.projects.accepted.index', compact('projects', 'users', 'date_range', 'user_id'));
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

    public function exclude(){
        $countries = Country::all();
        $currencies = Currency::all();
        $exclude = exclude::first();
        return view('admin.projects.exclude', compact('countries', 'currencies', 'exclude'));
    }

    public function SyncExclude(){

            try{
                //Handle Countries
                $response = Http::withHeaders([
                    'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
                ])->get("https://www.freelancer.com/api/common/0.1/countries");
            }catch(\Exception $e){
                return redirect(route('admin.projects.exclude'))->with("error", "Some thing went wrong, Please try again.");
            }
            
            $response_array = $response->json();
            
            if($response_array['status'] == 'error'){
                return $response_array;
            }

            $countries = $response_array['result']['countries'];
            
            foreach($countries as $country){
                $countries_array[] = [
                    'name' => $country['name'],
                    'code' => $country['code']
                ];
            }

            if(isset($countries_array)){
                Country::truncate();
                Country::insert(
                    $countries_array
                );
            }
            
            try{
                //Handle Currencies
                $response = Http::withHeaders([
                    'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
                ])->get("https://www.freelancer.com/api/projects/0.1/currencies");  
            }catch(\Exception $e){
                return redirect(route('admin.projects.exclude'))->with("error", "Some thing went wrong, Please try again.");
            }
            
            $response_array = $response->json();
            
            if($response_array['status'] == 'error'){
                return $response_array;
            }

            $currencies = $response_array['result']['currencies'];
            
            foreach($currencies as $currency){
                $currencies_array[] = [
                    'name' => $currency['name'],
                    'code' => $currency['code']
                ];
            }

            if(isset($currencies_array)){
                Currency::truncate();
                Currency::insert(
                    $currencies_array
                );
            }

            return redirect(route('admin.projects.exclude'))->with("success", "Countries and currencies updated successfully.");
    }

    public function updateExclude(Request $request){

        //return $request->all();

        if(!isset($request->countries)){
            $countries = [];
        }else{
            $countries = $request->countries;
        }

        if(!isset($request->currencies)){
            $currencies = [];
        }else{
            $currencies = $request->currencies;
        }

        $exclude = Exclude::firstOrNew();
        $exclude->countries = $countries;
        $exclude->currencies = $currencies;
        if($exclude->save()){
            return redirect(route('admin.projects.exclude'))->with("success", "Exclude settings updated successfully.");
        }
        return redirect(route('admin.projects.exclude'))->with("error", "Something went wrong, Please try again.");
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
