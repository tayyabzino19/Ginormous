<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LiveFeed;

class ProjectController extends Controller
{
    public function liveFeed(){
        $projects = LiveFeed::orderBy('time_updated', 'desc')->paginate(50);
        return view('bidder.projects.live-feed.index', compact('projects'));
    }
}
