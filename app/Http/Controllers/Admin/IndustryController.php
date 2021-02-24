<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Industry;

class IndustryController extends Controller
{
    public function index(){
        $industries = Industry::orderBy('id', 'desc')->get();
        return view('admin.portfolio.industries.index', compact('industries'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'name' => "required|min:2|unique:industries",
            'status' => "required",
        ]);

        $industry = new Industry;
        $industry->name = $request->name;
        $industry->status = $request->status;

        if($industry->save()){

            return redirect(route('admin.portfolio.industries.index'))->with("success", "Industry added successfully.");
        }
        
        return redirect(route('admin.portfolio.industries.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $industry = Industry::findOrFail($id);

        $response['industry'] = $industry;
        $response['status'] = 'success';

        return json_encode($response);
    }


    public function update(Request $request){
        //return $request->all();
        $industry = Industry::findOrFail($request->id);
        $validated = $request->validate([
            'name' => ['required', 'min:2', Rule::unique('industries')->ignore($request->id)],
            'status' => "required"
        ]);
        

        $industry->name = $request->name;
        $industry->status = $request->status;
        
        
        if($industry->save()){

            return redirect(route('admin.portfolio.industries.index'))->with("success", "Type updated successfully.");
        }
        
        return redirect(route('admin.portfolio.industries.index'))->with("error", "Something went wrong, Please try again.");
    
    }
}
