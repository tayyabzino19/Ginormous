<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index(){
        $designations = Designation::with('users')->orderBy('id', 'desc')->get();
        return view('admin.users.designations.index', compact('designations'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'name' => "required|min:2|unique:designations",
            'status' => "required",
            'bonus_amount' => "required|max:9"
        ]);

        $designation = new Designation;
        $designation->name = $request->name;
        $designation->status = $request->status;
        $designation->bonus_amount = $request->bonus_amount;
        

        if($designation->save()){

            return redirect(route('admin.users.designations.index'))->with("success", "Designation added successfully.");
        }
        
        return redirect(route('admin.users.designations.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){


        $designation = Designation::findOrFail($id);

        $response['designation'] = $designation;
        $response['status'] = 'success';

        return json_encode($response);
    }

    public function update(Request $request){
        //return $request->all();
        $designation = Designation::findOrFail($request->id);
        $validated = $request->validate([
            'name' => ['required', 'min:2', Rule::unique('designations')->ignore($request->id)],
            'status' => "required",
            'bonus_amount' => "required|max:9"
        ]);

        $designation->name = $request->name;
        $designation->status = $request->status;
        $designation->bonus_amount = $request->bonus_amount;
        
        if($designation->save()){

            return redirect(route('admin.users.designations.index'))->with("success", "Designation updated successfully.");
        }
        
        return redirect(route('admin.users.designations.index'))->with("error", "Something went wrong, Please try again.");
    

    }
}
