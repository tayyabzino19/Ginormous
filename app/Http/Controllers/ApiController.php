<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api;

class ApiController extends Controller
{
    public function request($type = null){
        $api = Api::where('type', $type)->first();
        if(!$api){
            $response['status'] = 'error';
            $response['message'] = 'Object not found.';
            return json_encode($response);
        }
        return json_decode(json_encode($api->request), true);
    }

    public function response($type = null){
        $api = Api::where('type', $type)->first();
        if(!$api){
            $response['status'] = 'error';
            $response['message'] = 'Object not found.';
            return json_encode($response);
        }
        return json_decode(json_encode($api->response), true);
    }
}
