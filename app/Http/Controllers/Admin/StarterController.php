<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Starter;

class StarterController extends Controller
{
    public function index(){
        $starters = Starter::orderBy('id', 'desc')->get();
        return view('admin.helpers.starter.index', compact('starters'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'description' => "required|min:2|unique:starters",
            'status' => "required",
        ]);

        $starter = new Starter;
        $starter->description = $request->description;
        $starter->status = $request->status;

        if($starter->save()){

            return redirect(route('admin.helpers.starter.index'))->with("success", "Starter added successfully.");
        }
        
        return redirect(route('admin.helpers.starter.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $starter = Starter::findOrFail($id);

        $response['starter'] = $starter;
        $response['status'] = 'success';

        return json_encode($response);
    }


    public function update(Request $request){
        //return $request->all();

        $validated = $request->validate([
            'description' => ['required', 'min:2', Rule::unique('starters')->ignore($request->id)],
            'status' => "required",
        ]);

        $starter = Starter::findOrFail($request->id);

        $starter->description = $request->description;
        $starter->status = $request->status;

        if($starter->save()){

            return redirect(route('admin.helpers.starter.index'))->with("success", "Starter updated successfully.");
        }
        
        return redirect(route('admin.helpers.starter.index'))->with("error", "Something went wrong, Please try again.");
    
    }

    public function delete(Request $request){

        //return $request->all();
        $starter = Starter::findOrFail($request->id);

        if($starter->delete()){

            return redirect(route('admin.helpers.starter.index'))->with("success", "Starter deleted successfully.");
        }
        
        return redirect(route('admin.helpers.starter.index'))->with("error", "Something went wrong, Please try again.");

    }


}
