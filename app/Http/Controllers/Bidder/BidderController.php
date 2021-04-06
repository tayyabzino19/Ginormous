<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Project;
use App\Models\Leave;
use Auth;
use Hash;
use Carbon\Carbon;

class BidderController extends Controller
{
    //defining search vars
    protected $date_range;

    public function index(Request $request){

        if(isset($request->search)){

            $date_range = explode('to', $request->date_range);
            $from_date = date('Y-m-d', strtotime($date_range[0]));
            $to_date = date('Y-m-d', strtotime($date_range[1]));
            $from_date = Carbon::parse($from_date)->startOfDay();
            $to_date = Carbon::parse($to_date)->endOfDay();
            $this->date_range = $request->date_range;

            $project_bidded_count = Project::where('user_id', Auth::user()->id)->where('status', 'bidded')->whereBetween('action_date', [$from_date, $to_date])->count();
            $project_accepted_count = Project::where('user_id', Auth::user()->id)->where('status', 'accepted')->whereBetween('action_date', [$from_date, $to_date])->count();
            $project_missed_count = Project::where('user_id', Auth::user()->id)->where('status', 'missed')->whereBetween('action_date', [$from_date, $to_date])->count();
            $project_replied_count = Project::where('user_id', Auth::user()->id)->where('status', 'replied')->whereBetween('action_date', [$from_date, $to_date])->count();
            
            $leave_total_count = Leave::where('user_id', Auth::user()->id)->whereBetween('created_at', [$from_date, $to_date])->count();
            $leave_accepted_count = Leave::where('user_id', Auth::user()->id)->where('status', 'accepted')->whereBetween('created_at', [$from_date, $to_date])->count();
            $leave_rejected_count = Leave::where('user_id', Auth::user()->id)->where('status', 'rejected')->whereBetween('created_at', [$from_date, $to_date])->count();
            $leave_pending_count = Leave::where('user_id', Auth::user()->id)->where('status', 'pending')->whereBetween('created_at', [$from_date, $to_date])->count();
        }else{
            $project_bidded_count = Project::where('user_id', Auth::user()->id)->where('status', 'bidded')->count();
            $project_accepted_count = Project::where('user_id', Auth::user()->id)->where('status', 'accepted')->count();
            $project_missed_count = Project::where('user_id', Auth::user()->id)->where('status', 'missed')->count();
            $project_replied_count = Project::where('user_id', Auth::user()->id)->where('status', 'replied')->count();
            $leave_total_count = Leave::where('user_id', Auth::user()->id)->count();
            $leave_accepted_count = Leave::where('user_id', Auth::user()->id)->where('status', 'accepted')->count();
            $leave_rejected_count = Leave::where('user_id', Auth::user()->id)->where('status', 'rejected')->count();
            $leave_pending_count = Leave::where('user_id', Auth::user()->id)->where('status', 'pending')->count();
        }

        $date_range = $this->date_range;
        $this_month_project_accepted_count = Project::where('user_id', Auth::user()->id)->where('status', 'accepted')->whereYear('action_date', Carbon::now()->year)->whereMonth('action_date', Carbon::now()->month)->count();
        return view('bidder.dashboard.index', compact('this_month_project_accepted_count', 'date_range', 'leave_pending_count', 'leave_rejected_count', 'leave_accepted_count', 'leave_total_count', 'project_bidded_count', 'project_accepted_count', 'project_missed_count', 'project_replied_count'));
    }

    public function settings(){
        $user  = Auth::user();
        return view('bidder.settings.index', compact('user'));
    }

    public function updateSettings(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'password' => 'nullable|sometimes|confirmed|min:8',
            'picture' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if(empty(Auth::user()->getAttributes()['picture']) && !request()->file('picture')){
            return redirect(route('bidder.settings.index'))->with("error", "Profile picture is required.");
        }

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;

        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }

        if($picture = request()->file('picture')){
            // $picture_name = time().'-'.date('Ymdhis').rand(0, 999).'.'.$picture->guessExtension();
            // $picture->storeAs(config('constants.user_images_dir'), $picture_name);
            // Storage::delete(config('constants.user_images_dir') . $user->getOriginal('picture'));
            // $user->picture = $picture_name;

            $picture_name = time().'-'.date('Ymdhis').rand(0, 999);
            storeImage('user_images_dir',$picture, $picture_name, 200, 200);
            deleteImage("user_images_dir", $user->getOriginal('picture'));
            $user->picture = $picture_name . '.webp';

        }

        if($user->save()){
            return redirect(route('bidder.settings.index'))->with("success", "Your profile has been successfully updated.");
        }
        
        return redirect(route('bidder.settings.index'))->with("error", "Something went wrong, Please try again.");
    }
}
