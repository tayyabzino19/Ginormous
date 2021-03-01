<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Starter;
use App\Models\TechStar;
use App\Models\PortfolioInitiator;
use App\Models\Ender;

use App\Models\Item;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Type;

class ProjectController extends Controller
{
    public function missed(){
        return view('admin.projects.missed');
    }

    public function details(){

        $starters = Starter::where("status", 'active')->orderBy('id', 'desc')->get();
        $tech_stars = TechStar::where("status", 'active')->orderBy('id', 'desc')->get();
        $portfolio_initiators = PortfolioInitiator::where("status", 'active')->orderBy('id', 'desc')->get();
        $enders = Ender::where("status", 'active')->orderBy('id', 'desc')->get();

        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

        return view('admin.projects.details', compact('starters', 'tech_stars', 'portfolio_initiators', 'enders', 'skills', 'industries', 'types'));
    }

    public function getPortfolioItems(Request $request){
        //$request->types = ["6", "7"];
        
       $items = Item::with('types')->where("status", 'active')->whereHas("types", function($query) use ($request){
        $query->where("types.status", "active");
       })->get();

       return $items[0]->types;
    }
}
