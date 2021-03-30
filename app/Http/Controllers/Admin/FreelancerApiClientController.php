<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FreelancerApiClient;
use Illuminate\Validation\Rule;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class FreelancerApiClientController extends Controller
{
    public function index(){
        $client = FreelancerApiClient::first();
        return view('admin.settings.freelancer-api-client', compact("client"));
    }

    public function update(Request $request){
        //return $request;
        $validated = $request->validate([
            'client_id' => 'required',
            'auth_key' => 'required'
        ]);

        $client = FreelancerApiClient::findOrFail($request->id);
        $client->client_id = $request->client_id;
        $client->auth_key = $request->auth_key;

        $response = Http::withHeaders([
            'freelancer-oauth-v1' => $request->auth_key
        ])->get("https://www.freelancer.com/api/users/0.1/self/");
        
        $response_array = $response->json();

        if($response_array['status'] == 'error'){
            $client->status = 'invalid';
            $client->save();
            return back()->with('error', "Invalid Auth Key.");
        }

        if($response_array['result']['id'] != $request->client_id){
            $client->status = 'invalid';
            $client->save();
            return back()->with('error', "Invalid client ID.");
        }

        $client->status = 'connected';

        if($client->save()){
            return redirect(route('admin.settings.freelancer_api_client'))->with("success", "Your API keys has been updated successfully.");
        }
        return redirect(route('admin.settings.freelancer_api_client'))->with("error", "Something went wrong, Please try again.");


    }
}
