<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }

    public function APIKeys(){
        return view('admin.settings.api-keys');
    }

    public function profile(){
        $user = Auth::user();
        return view('admin.settings.profile', compact('user'));
    }

    public function updateProfile(Request $request){



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
            $picture_name = time().'-'.date('Ymdhis').rand(0, 999).'.'.$picture->guessExtension();
            $picture->storeAs(config('constants.user_images_dir'), $picture_name);
            if($user->picture != 'default.png')
            Storage::delete(config('constants.user_images_dir') . $user->getOriginal('picture'));
            $user->picture = $picture_name;
        }

        if($user->save()){

            return redirect(route('admin.settings.profile'))->with("success", "Your profile has been successfully updated.");
        }
        
        return redirect(route('admin.settings.profile'))->with("error", "Something went wrong, Please try again.");
    }
}
