<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Skill;
use App\Models\FreelancerApiClient;


use Illuminate\Support\Facades\Http;

class SkillController extends Controller
{
    public function index(){
        $skills = Skill::with('items')->orderBy('id', 'desc')->get();
        return view('admin.portfolio.skills.index', compact('skills'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'name' => "required|min:2|unique:skills",
            'freelancer_job_id' => "required|unique:skills",
            'status' => "required",
        ]);

        $skill = new Skill;
        $skill->name = $request->name;
        $skill->freelancer_job_id = $request->freelancer_job_id;
        $skill->status = $request->status;

        if($skill->save()){

            return redirect(route('admin.portfolio.skills.index'))->with("success", "Skill added successfully.");
        }
        
        return redirect(route('admin.portfolio.skills.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $skill = Skill::findOrFail($id);

        $response['skill'] = $skill;
        $response['status'] = 'success';

        return json_encode($response);
    }


    public function update(Request $request){
        //return $request->all();
        $skill = Skill::findOrFail($request->id);
        $validated = $request->validate([
            'name' => ['required', 'min:2', Rule::unique('skills')->ignore($request->id)],
            'freelancer_job_id' => ['required', 'min:2', Rule::unique('skills')->ignore($request->id)],
            'status' => "required"
        ]);
        

        //$skill->name = $request->name;
        //$skill->freelancer_job_id = $request->freelancer_job_id;
        $skill->status = $request->status;
        
        
        if($skill->save()){

            return redirect(route('admin.portfolio.skills.index'))->with("success", "Skill updated successfully.");
        }
        
        return redirect(route('admin.portfolio.skills.index'))->with("error", "Something went wrong, Please try again.");
    
    }

    public function sync(){
        
        $url = 'https://www.freelancer.com/api/projects/0.1/jobs';
        $response = Http::withHeaders([
            'freelancer-oauth-v1' => FreelancerApiClient::first()->auth_key
        ])->get($url);
        
        $response_array = $response->json();

        if(Skill::count()){
            $collection = collect($response_array['result']);
            $new_jobs = $collection->where('id', '>', Skill::max('freelancer_job_id'));

            foreach($new_jobs as $job){
                $skills_array[] = [
                    'name' => $job['name'],
                    'freelancer_job_id' => $job['id']
                ];
            }

            if(isset($skills_array)){
                Skill::insert(
                    $skills_array
                );
            }

            return redirect(route('admin.portfolio.skills.index'))->with("success", "Skill updated successfully.");

        }

        foreach($response_array['result'] as $job){
            $skills_array[] = [
                'name' => $job['name'],
                'freelancer_job_id' => $job['id']
            ];
        }
        
        if(isset($skills_array)){
            Skill::insert(
                $skills_array
            );
        }

        return redirect(route('admin.portfolio.skills.index'))->with("success", "Skill updated successfully.");

    }

    
}
