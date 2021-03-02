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
