<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
        $types = Type::with('items')->orderBy('id', 'desc')->get();
        return view('admin.portfolio.types.index', compact('types'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'name' => "required|min:2|unique:types",
            'status' => "required",
        ]);

        $type = new Type;
        $type->name = $request->name;
        $type->status = $request->status;

        if($type->save()){

            return redirect(route('admin.portfolio.types.index'))->with("success", "Type added successfully.");
        }
        
        return redirect(route('admin.portfolio.types.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $type = Type::findOrFail($id);

        $response['type'] = $type;
        $response['status'] = 'success';

        return json_encode($response);
    }


    public function update(Request $request){
        //return $request->all();
        $type = Type::findOrFail($request->id);
        $validated = $request->validate([
            'name' => ['required', 'min:2', Rule::unique('types')->ignore($request->id)],
            'status' => "required"
        ]);
        

        $type->name = $request->name;
        $type->status = $request->status;
        
        
        if($type->save()){

            return redirect(route('admin.portfolio.types.index'))->with("success", "Type updated successfully.");
        }
        
        return redirect(route('admin.portfolio.types.index'))->with("error", "Something went wrong, Please try again.");
    
    }
}
