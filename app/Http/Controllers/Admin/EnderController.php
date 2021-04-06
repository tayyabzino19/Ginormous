<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Ender;

class EnderController extends Controller
{
    public function index(){
        $enders = Ender::orderBy('id', 'desc')->get();
        return view('admin.helpers.ender.index', compact('enders'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'description' => "required|min:2|unique:enders",
            'status' => "required",
        ]);

        $ender = new Ender;
        $ender->description = $request->description;
        $ender->status = $request->status;

        if($ender->save()){

            return redirect(route('admin.helpers.ender.index'))->with("success", "Ender added successfully.");
        }
        
        return redirect(route('admin.helpers.ender.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $ender = Ender::findOrFail($id);

        $response['ender'] = $ender;
        $response['status'] = 'success';

        return json_encode($response);
    }


    public function update(Request $request){
        //return $request->all();

        $validated = $request->validate([
            'description' => ['required', 'min:2', Rule::unique('enders')->ignore($request->id)],
            'status' => "required",
        ]);

        $ender = Ender::findOrFail($request->id);

        $ender->description = $request->description;
        $ender->status = $request->status;

        if($ender->save()){

            return redirect(route('admin.helpers.ender.index'))->with("success", "Ender updated successfully.");
        }
        
        return redirect(route('admin.helpers.ender.index'))->with("error", "Something went wrong, Please try again.");
    
    }

    public function delete(Request $request){

        //return $request->all();
        $ender = Ender::findOrFail($request->id);

        if($ender->delete()){

            return redirect(route('admin.helpers.ender.index'))->with("success", "Ender deleted successfully.");
        }
        
        return redirect(route('admin.helpers.ender.index'))->with("error", "Something went wrong, Please try again.");

    }
}
