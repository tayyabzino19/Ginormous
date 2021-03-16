<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ProjectFilter;

class ProjectFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_filter = new ProjectFilter;
        $project_filter->project_type = ['fixed' => true, 'hourly' => false];
        $project_filter->fixed_price = ['min' => 1, 'max' => 10000];
        $project_filter->hourly_price = ['min' => 1, 'max' => 120];
        $project_filter->listing_type = ['featured' => true, 'sealed' => false, 'NDA' => false, 'urgent' => true, 'fulltime' => false, 'recruiter' => false];
        $project_filter->save();


        $project_filter = ProjectFilter::with('skills', 'languages')->find($project_filter->id);

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
                        $projects_search_params .= 'min_avg_hourly_rate=' . $value . $and;
                    }
                }
            }

            //return $project_filter;
            //return $projects_search_params;

            $project_filter->projects_search_params = $projects_search_params;
            $project_filter->save();
    }
}
