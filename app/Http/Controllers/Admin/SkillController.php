<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Skill;

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
            'status' => "required",
        ]);

        $skill = new Skill;
        $skill->name = $request->name;
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
            'status' => "required"
        ]);
        

        $skill->name = $request->name;
        $skill->status = $request->status;
        
        
        if($skill->save()){

            return redirect(route('admin.portfolio.skills.index'))->with("success", "Skill updated successfully.");
        }
        
        return redirect(route('admin.portfolio.skills.index'))->with("error", "Something went wrong, Please try again.");
    
    }
    
}
