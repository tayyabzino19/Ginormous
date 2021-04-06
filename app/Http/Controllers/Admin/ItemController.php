<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\Item;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Type;

class ItemController extends Controller
{
    public function index(){
        $items = Item::with('skills', 'industries', 'types')->orderBy('id', 'desc')->get();
        return view('admin.portfolio.items.index', compact('items'));
    }

    public function create(){

        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

        return view('admin.portfolio.items.create', compact('skills', 'industries', 'types'));
    }

    public function save(Request $request){
        
        //$request->all();
        $validated = $request->validate([
            'name' => "required|min:2|unique:items",
            'status' => "required",
            'url' => "required",
            'industries' => "required",
            'types' => "required",
            'skills' => "required",
            'details' => "required",
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->status = $request->status;
        $item->url = $request->url;
        $item->details = $request->details;

        if($item->save()){

            $item->skills()->sync($request->skills);
            $item->industries()->sync($request->industries);
            $item->types()->sync($request->types);

            return redirect(route('admin.portfolio.items.index'))->with("success", "Project added successfully.");
        }
        
        return redirect(route('admin.portfolio.items.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $item = Item::findOrFail($id);

        $skills = Skill::where("status", 'active')->orderBy('id', 'desc')->get();
        $industries = Industry::where("status", 'active')->orderBy('id', 'desc')->get();
        $types = Type::where("status", 'active')->orderBy('id', 'desc')->get();

        $assigned_skills = $item->skills->pluck('id')->toArray();
        $assigned_industries = $item->industries->pluck('id')->toArray();
        $assigned_types = $item->types->pluck('id')->toArray();

        return view('admin.portfolio.items.edit', compact('item', 'assigned_skills', 'assigned_industries', 'assigned_types', 'skills', 'industries', 'types'));
    }


    public function update(Request $request){
        
        //$request->all();
        $validated = $request->validate([
            'name' => ['required', 'min:2', Rule::unique('items')->ignore($request->id)],
            'status' => "required",
            'url' => "required",
            'industries' => "required",
            'types' => "required",
            'skills' => "required",
            'details' => "required",
        ]);

        $item = Item::findOrFail($request->id);
        $item->name = $request->name;
        $item->status = $request->status;
        $item->url = $request->url;
        $item->details = $request->details;

        if($item->save()){

            $item->skills()->sync($request->skills);
            $item->industries()->sync($request->industries);
            $item->types()->sync($request->types);

            return redirect(route('admin.portfolio.items.edit', $request->id))->with("success", "Project updated successfully.");
        }
        
        return redirect(route('admin.portfolio.items.edit', $request->id))->with("error", "Something went wrong, Please try again.");
        
    }
}
