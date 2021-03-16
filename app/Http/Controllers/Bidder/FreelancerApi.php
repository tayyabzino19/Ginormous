<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\ProjectFilter;

class FreelancerApi extends Controller
{
    public function getLiveFeed(){
        $projects_filter = ProjectFilter::first();
        $url = "https://www.freelancer.com/api/projects/0.1/projects/active/?compact=true&" . $projects_filter->projects_search_params;
        echo "Query: " . $url;
        $response = Http::get($url);
        return $response->json();
        
        //return Http::dd()->get($url);

        //$response_array = json_decode($response->body(), true);

        //dd($response_array);



        //return count($response_array['result']['projects']);
        
    }
}
