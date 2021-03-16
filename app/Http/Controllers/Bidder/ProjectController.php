<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function liveFeed(){
        return view('bidder.projects.live-feed.index');
    }
}
