<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Leave;

class LeaveRequestController extends Controller
{
    public function index(){

        $leaves = Leave::with('user')->where('status', 'pending')->orderBy('id', 'desc')->get();
        return view('admin.leaves-management.requests.index', compact('leaves'));
    }

    public function edit($id = null){
        
        $leave = Leave::where('id', $id)->where('status', 'pending')->first();

        if(!$leave){
            abort(404);
        }
        return view('admin.leaves-management.requests.edit', compact('leave'));
    }

    public function accept(Request $request){
        //return $request->all();
        $leave = Leave::where('id', $request->id)->where('status', 'pending')->first();

        if(!$leave){
            abort(404);
        }

        $leave->status = 'accepted';

        if($leave->save()){
            return redirect(route('admin.leaves_management.requests.index'))->with("success", "Leave request accepted successfully.");
        }
        return redirect(route('admin.leaves_management.requests.index'))->with("error", "Something went wrong, Please try again.");
    }

    public function reject(Request $request){
        //return $request->all();
        $leave = Leave::with('user')->where('id', $request->id)->where('status', 'pending')->first();

        if(!$leave){
            abort(404);
        }

        $leave->status = 'rejected';

        if($leave->save()){
            return redirect(route('admin.leaves_management.requests.index'))->with("success", "Leave request rejected successfully.");
        }
        return redirect(route('admin.leaves_management.requests.index'))->with("error", "Something went wrong, Please try again.");
    }
}
