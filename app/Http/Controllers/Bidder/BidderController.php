<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Auth;
use Hash;

class BidderController extends Controller
{
    public function index(){
        return view('bidder.dashboard.index');
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
