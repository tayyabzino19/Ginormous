<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\ProjectFilter;
use App\Models\LiveFeed;
// use Illuminate\Support\Facades\Redis;


class FreelancerApi extends Controller
{
    public function getLiveFeed(){

        $projects_filter = ProjectFilter::first();
        $url = "https://www.freelancer.com/api/projects/0.1/projects/active/?compact=true&sort_field=time_updated&" . $projects_filter;
 
        $response = Http::withHeaders([
            'freelancer-oauth-v1' => 'FBK1GHW5um3R6nIXJlS7baqTm6aGPR'
        ])->get($url);
        
        $response_array = $response->json();
        $projects = $response_array['result']['projects'];

        $project_ids = collect($projects)->pluck('id');
        $project_ids = LiveFeed::whereIn('project_id', $project_ids)->get()->pluck('project_id')->toArray();

        
        foreach($projects as $project){
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
                'time_submitted' => $project['time_submitted'],
                'time_updated' => $project['time_updated']
            ];
        }
        
        if(isset($projects_array)){
            LiveFeed::insert(
                $projects_array
            );
        }

       return redirect(route('bidder.projects.live_feed.index'));
        
    }
}
