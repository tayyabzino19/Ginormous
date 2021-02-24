<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Leave;
use Auth;

class LeaveController extends Controller
{
    public function index(){
        $leaves = Leave::orderBy('id', 'desc')->get();
        return view('bidder.leaves.index', compact('leaves'));
    }

    public function create(){
        return view('bidder.leaves.create');
    }

    public function save(Request $request){
        //return $request->all();
        $request->validate([
            'type' => 'required',
            'reason' => 'required'
        ]);

        $leave = new Leave;
        $leave->type = $request->type;
        $leave->reason = $request->reason;
        $leave->status = "pending";
        $leave->user_id = Auth::user()->id;

        if($request->type == "short_leave" || $request->type == "half_day"){

            $leave->leave_date = date("Y-m-d", strtotime($request->leave_date));
            $leave->leave_time_from = date("H:i", strtotime($request->leave_time_from));
            $leave->leave_time_to = date("H:i", strtotime($request->leave_time_to));
        }elseif($request->type == "full_day"){

            $leave->leave_date = date("Y-m-d", strtotime($request->leave_date));
        }else{
            
            $date_range = explode('to', $request->leave_date_range);
            $leave->leave_date_from = date('Y-m-d', strtotime($date_range[0]));
            $leave->leave_date_to = date('Y-m-d', strtotime($date_range[1]));
        }

        if($leave->save()){

            return redirect(route('bidder.leaves.index'))->with("success", "Leave requested successfully.");
        }
        
        return redirect(route('bidder.leaves.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function edit($id = null){

        $leave = Leave::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if(!$leave){
            abort(404);
        }

        return view('bidder.leaves.edit', compact('leave'));

    }
}
