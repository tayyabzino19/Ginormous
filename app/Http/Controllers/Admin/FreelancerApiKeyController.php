<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Auth;
use App\Models\User;

class FreelancerApiKeyController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('admin.settings.api-keys', compact('user'));
    }

    public function update(Request $request){
        //return $request;
        $validated = $request->validate([
            'id' => ['required', Rule::in([Auth::user()->id])],
            'client_id' => 'required',
            'auth_key' => 'required'
        ]);

        $user = User::where('id', $request->id)->where('status', 'active')->first();
        if(!$user){
            abort(404);
        }

        $user->freelancerApiKey->client_id = $request->client_id;
        $user->freelancerApiKey->auth_key = $request->auth_key;

        if($user->freelancerApiKey->save()){
            return redirect(route('admin.settings.api_keys'))->with("success", "Your API keys has been updated successfully.");
        }
        return redirect(route('admin.settings.api_keys'))->with("error", "Something went wrong, Please try again.");


    }
}
