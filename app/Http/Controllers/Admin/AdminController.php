<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Option;
use Auth;
use Hash;
use Image;

use App\Notifications\TestNotification;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard.index');
    }

    public function profile(){
        
        $user = Auth::user();
        
        $user->notify((new TestNotification())->delay(10));
        $user->notify((new TestNotification())->delay(30));
        $user->notify((new TestNotification())->delay(50));
        $user->notify((new TestNotification())->delay(100));
        $user->notify((new TestNotification())->delay(150));
        $user->notify((new TestNotification())->delay(200));

        $phase_2 = Option::where('key', 'phase_2')->first();
        return view('admin.settings.profile', compact('user', 'phase_2'));
    }

    public function updateProfile(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'password' => 'nullable|sometimes|confirmed|min:8',
            'picture' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $phase_2 = Option::where('key', 'phase_2')->first();
        $phase_2->value = $request->phase_2;
        $phase_2->save();
        
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        

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
