<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\TechStar;

class TechStarController extends Controller
{
    public function index(){
        $tech_stars = TechStar::orderBy('id', 'desc')->get();
        return view('admin.helpers.tech-star.index', compact('tech_stars'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'description' => "required|min:10|unique:tech_stars",
            'status' => "required",
        ]);

        $tech_star = new TechStar;
        $tech_star->description = $request->description;
        $tech_star->status = $request->status;

        if($tech_star->save()){

            return redirect(route('admin.helpers.tech_star.index'))->with("success", "Tech Star added successfully.");
        }
        
        return redirect(route('admin.helpers.tech_star.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $tech_star = TechStar::findOrFail($id);

        $response['tech_star'] = $tech_star;
        $response['status'] = 'success';

        return json_encode($response);
    }


    public function update(Request $request){
        //return $request->all();

        $validated = $request->validate([
            'description' => ['required', 'min:10', Rule::unique('tech_stars')->ignore($request->id)],
            'status' => "required",
        ]);

        $tech_star = TechStar::findOrFail($request->id);

        $tech_star->description = $request->description;
        $tech_star->status = $request->status;

        if($tech_star->save()){

            return redirect(route('admin.helpers.tech_star.index'))->with("success", "Tech Star updated successfully.");
        }
        
        return redirect(route('admin.helpers.tech_star.index'))->with("error", "Something went wrong, Please try again.");
    
    }

    public function delete(Request $request){

        //return $request->all();
        $tech_star = TechStar::findOrFail($request->id);

        if($tech_star->delete()){

            return redirect(route('admin.helpers.tech_star.index'))->with("success", "Tech Star deleted successfully.");
        }
        
        return redirect(route('admin.helpers.tech_star.index'))->with("error", "Something went wrong, Please try again.");

    }
}
