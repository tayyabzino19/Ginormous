<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

use App\Models\User;
use Auth;

class AppTestController extends Controller
{
    public function index(){
        
        return view('app-test.index');
    }

    public function appAuthConfirmation(Request $request){
        
        if(!isset($request->session) || !isset($request->project_key) || !isset($request->email) || !isset($request->user_key)){
            return abort(403);
        }

        $response = Http::get(config('app-test.app_auth_url'), [
            'session' => $request->session,
            'project_key' => $request->project_key,
            'email' => $request->email,
            'user_key' => $request->user_key,
            'project_url' => rtrim(config('app.url'), '/') . '/' . config('app-test.app_test_route')
        ]);

        $response_obj = json_decode($response);
        if($response_obj->status == 'success'){
            $users =  User::all();
            return view('app-test.users', compact('users'));
        }
        return $response_obj->msg;
    }


    public function login(Request $request){
        
        if(!isset($request->id) || !isset($request->session) || !isset($request->project_key) || !isset($request->email) || !isset($request->user_key)){
            return abort(403);
        }

        $response = Http::get(config('app-test.app_auth_url'), [
            'session' => $request->session,
            'project_key' => $request->project_key,
            'email' => $request->email,
            'user_key' => $request->user_key,
            'project_url' => rtrim(config('app.url'), '/') . '/' . config('app-test.app_test_route')
        ]);

        $response_obj = json_decode($response);
        
        if($response_obj->status == 'success'){
           
            $user = User::findOrFail($request->id);
            Auth::loginUsingId($request->id);

            //Redirect user to dashboard on role based
            $role = Auth::user()->role;

            switch($role){
                case "admin":
                    return redirect(route('admin.index'));
                    break;
                case "sss":
                    return redirect(route('bidder.index'));
                    break;
                default:
                return redirect('/home');
            }
            
        }
        
        return $response_obj->msg;
        
    }
}
