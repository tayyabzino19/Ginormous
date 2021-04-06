<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\PortfolioInitiator;

class PortfolioInitiatorController extends Controller
{
    public function index(){
        $portfolio_initiators = PortfolioInitiator::orderBy('id', 'desc')->get();
        return view('admin.helpers.portfolio-initiator.index', compact('portfolio_initiators'));
    }

    public function save(Request $request){
        
        //return $request->all();
        $validated = $request->validate([
            'description' => "required|min:2|unique:portfolio_initiators",
            'status' => "required",
        ]);

        $portfolio_initiator = new PortfolioInitiator;
        $portfolio_initiator->description = $request->description;
        $portfolio_initiator->status = $request->status;

        if($portfolio_initiator->save()){

            return redirect(route('admin.helpers.portfolio_initiator.index'))->with("success", "Portfolio initiator added successfully.");
        }
        
        return redirect(route('admin.helpers.portfolio_initiator.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit(Request $request, $id = null){

        $portfolio_initiator = PortfolioInitiator::findOrFail($id);

        $response['portfolio_initiator'] = $portfolio_initiator;
        $response['status'] = 'success';

        return json_encode($response);
    }


    public function update(Request $request){
        //return $request->all();

        $validated = $request->validate([
            'description' => ['required', 'min:2', Rule::unique('portfolio_initiators')->ignore($request->id)],
            'status' => "required",
        ]);

        $portfolio_initiator = PortfolioInitiator::findOrFail($request->id);

        $portfolio_initiator->description = $request->description;
        $portfolio_initiator->status = $request->status;

        if($portfolio_initiator->save()){

            return redirect(route('admin.helpers.portfolio_initiator.index'))->with("success", "Portfolio initiator updated successfully.");
        }
        
        return redirect(route('admin.helpers.portfolio_initiator.index'))->with("error", "Something went wrong, Please try again.");
    
    }

    public function delete(Request $request){

        //return $request->all();
        $portfolio_initiator = PortfolioInitiator::findOrFail($request->id);

        if($portfolio_initiator->delete()){

            return redirect(route('admin.helpers.portfolio_initiator.index'))->with("success", "Portfolio initiator deleted successfully.");
        }
        
        return redirect(route('admin.helpers.portfolio_initiator.index'))->with("error", "Something went wrong, Please try again.");

    }
}
