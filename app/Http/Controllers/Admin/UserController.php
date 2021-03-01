<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Designation;
use Hash;


class UserController extends Controller
{
    public function index(){

        $users = User::where('role', '!=', 'admin')->orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create(){

        $designations = Designation::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('admin.users.create', compact('designations'));
    }

    public function save(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            //'password' => 'nullable|sometimes|confirmed|min:8',
            'password' => 'required|confirmed|min:8',
            'designation_id' => 'required',
            'status' => ['required', Rule::in(['active', 'inactive'])],
            //'picture' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], ['designation_id.required' => 'Designation is required']);

        $user = new User;
        $user->designation_id = $request->designation_id;
        $user->role = 'bidder';
        $user->status = $request->status;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($picture = request()->file('picture')){
            
            $picture_name = time().'-'.date('Ymdhis').rand(0, 999);
            storeImage('user_images_dir',$picture, $picture_name, 200, 200);
            $user->picture = $picture_name . '.webp';
        }

        if($user->save()){

            return redirect(route('admin.users.index'))->with("success", "User profile has been successfully created.");
        }
        
        return redirect(route('admin.users.index'))->with("error", "Something went wrong, Please try again.");

    }

    public function edit(Request $request, $id = null){

        $user = User::findOrFail($id);
        $designations = Designation::where('status', 'active')->orderBy('id', 'desc')->get();

        return view('admin.users.edit', compact('user', 'designations'));
    }


    public function update(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'password' => 'nullable|sometimes|confirmed|min:8',
            'designation_id' => 'required',
            'status' => ['required', Rule::in(['active', 'inactive'])],
            //'picture' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], ['designation_id.required' => 'Designation is required']);
        
        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->status = $request->status;
        $user->designation_id = $request->designation_id;

        if($user->save()){

            return redirect(route('admin.users.index'))->with("success", "User profile has been successfully updated.");
        }
        
        return redirect(route('admin.users.index'))->with("error", "Something went wrong, Please try updated.");

    }
}
