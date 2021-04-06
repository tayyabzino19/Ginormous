<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Project;
use App\Models\Leave;
use App\Models\Option;
use Auth;
use Hash;
use Image;
use Carbon\Carbon;

use App\Notifications\TestNotification;

class AdminController extends Controller
{
    //defining search vars
    protected $date_range, $user_id;

    public function index(Request $request){

        if(isset($request->search)){
            $date_range = explode('to', $request->date_range);
            $from_date = date('Y-m-d', strtotime($date_range[0]));
            $to_date = date('Y-m-d', strtotime($date_range[1]));
            $from_date = Carbon::parse($from_date)->startOfDay();
            $to_date = Carbon::parse($to_date)->endOfDay();
            $this->date_range = $request->date_range;
            $this->user_id = $request->user;

            $project_bidded_count = Project::where('user_id', $request->user)->where('status', 'bidded')->whereBetween('action_date', [$from_date, $to_date])->count();
            $project_accepted_count = Project::where('user_id', $request->user)->where('status', 'accepted')->whereBetween('action_date', [$from_date, $to_date])->count();
            $project_missed_count = Project::where('user_id', $request->user)->where('status', 'missed')->whereBetween('action_date', [$from_date, $to_date])->count();
            $project_replied_count = Project::where('user_id', $request->user)->where('status', 'replied')->whereBetween('action_date', [$from_date, $to_date])->count();
            
            $leave_total_count = Leave::where('user_id', $request->user)->whereBetween('created_at', [$from_date, $to_date])->count();
            $leave_accepted_count = Leave::where('user_id', $request->user)->where('status', 'accepted')->whereBetween('created_at', [$from_date, $to_date])->count();
            $leave_rejected_count = Leave::where('user_id', $request->user)->where('status', 'rejected')->whereBetween('created_at', [$from_date, $to_date])->count();
            $leave_pending_count = Leave::where('user_id', $request->user)->where('status', 'pending')->whereBetween('created_at', [$from_date, $to_date])->count();
        }else{
            $project_bidded_count = Project::where('status', 'bidded')->count();
            $project_accepted_count = Project::where('status', 'accepted')->count();
            $project_missed_count = Project::where('status', 'missed')->count();
            $project_replied_count = Project::where('status', 'replied')->count();
            $leave_total_count = Leave::count();
            $leave_accepted_count = Leave::where('status', 'accepted')->count();
            $leave_rejected_count = Leave::where('status', 'rejected')->count();
            $leave_pending_count = Leave::where('status', 'pending')->count();
        }

        $date_range = $this->date_range;
        $user_id = $this->user_id;
        $users = User::where('role', 'bidder')->orderBy('id', 'desc')->get();
        $active_users_count = $users->where('status', 'active')->count();
        $inactive_users_count = $users->where('status', 'inactive')->count();
        $latest_5_leaves = Leave::with('user')->orderBy('id', 'desc')->limit(5)->get();
        return view('admin.dashboard.index', compact('latest_5_leaves', 'active_users_count', 'inactive_users_count', 'users', 'user_id', 'date_range', 'leave_pending_count', 'leave_rejected_count', 'leave_accepted_count', 'leave_total_count', 'project_bidded_count', 'project_accepted_count', 'project_missed_count', 'project_replied_count'));
    }

    public function profile(){
        
        $user = Auth::user();
        
        // $user->notify((new TestNotification())->delay(10));
        // $user->notify((new TestNotification())->delay(30));
        // $user->notify((new TestNotification())->delay(50));
        // $user->notify((new TestNotification())->delay(100));
        // $user->notify((new TestNotification())->delay(150));
        // $user->notify((new TestNotification())->delay(200));

        $phase_2 = Option::where('key', 'phase_2')->first();
        return view('admin.settings.profile', compact('user', 'phase_2'));
    }

    public function updateProfile(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'nullable|sometimes|confirmed|min:8',
            'picture' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $phase_2 = Option::where('key', 'phase_2')->first();
        $phase_2->value = $request->phase_2;
        $phase_2->save();
        
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }

        if($picture = request()->file('picture')){
            
            $picture_name = time().'-'.date('Ymdhis').rand(0, 999);
            storeImage('user_images_dir',$picture, $picture_name, 200, 200);
            deleteImage("user_images_dir", $user->getOriginal('picture'));
            $user->picture = $picture_name . '.webp';
        }

        if($user->save()){

            return redirect(route('admin.settings.profile'))->with("success", "Your profile has been successfully updated.");
        }
        
        return redirect(route('admin.settings.profile'))->with("error", "Something went wrong, Please try again.");
    }
}
