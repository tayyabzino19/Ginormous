<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Leave;
use App\Models\User;

class LeaveController extends Controller
{
    //defining search vars
    protected $user_id, $status, $type, $date_range;

    public function index(Request $request){

        if(isset($request->search)){
            
            $leaves = Leave::with('user')->where(function($query) use ($request){

                if($request->user != ''){
                    $query->where('user_id', $request->user);
                    $this->user_id = $request->user;
                }

                if($request->type != ''){
                    $query->where('type', $request->type);
                    $this->type = $request->type;
                }

                if($request->status != ''){
                    $query->where('status', $request->status);
                    $this->status = $request->status;
                }

                if($request->date_range != ''){
                    
                    $date_range = explode('to', $request->date_range);
                    $from_date = date('Y-m-d', strtotime($date_range[0]));
                    $to_date = date('Y-m-d', strtotime($date_range[1]));

                    $from_date = Carbon::parse($from_date)->startOfDay();
                    $to_date = Carbon::parse($to_date)->endOfDay();

                    $query->whereBetween('created_at', [$from_date, $to_date]);

                    $this->date_range = $request->date_range;
                }

            })->where('status', '!=', 'pending')->orderBy('id', 'desc')->get();

        }else{
            $leaves = Leave::with('user')->where('status', '!=', 'pending')->orderBy('id', 'desc')->get();
        }

        $user_id = $this->user_id;
        $status = $this->status;
        $type = $this->type;
        $date_range = $this->date_range;

        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.leaves-management.leaves.index', compact('leaves', 'users', 'user_id', 'status', 'type', 'date_range'));
    }

    public function edit($id = null){
        
        $leave = Leave::where('id', $id)->where('status', '!=', 'pending')->first();

        if(!$leave){
            abort(404);
        }
        return view('admin.leaves-management.leaves.edit', compact('leave'));
    }
}
