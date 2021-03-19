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
            LiveFeed::truncate();
            LiveFeedDetail::truncate();
            LiveFeedProposal::truncate();

            $project_filter->projects_search_params = $projects_search_params;
            $project_filter->save();

            return redirect(route('admin.projects.filters'))->with("success", "Filters setting updated successfully.");
        }

        return redirect(route('admin.projects.filters'))->with("error", "Something went wrong, Please try again.");

    }
}
