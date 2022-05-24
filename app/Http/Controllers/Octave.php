<?php

namespace App\Http\Controllers;


use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Octave extends Controller
{
    public function readOctave(Request $request){
        return view("successLogin")->with(["response"=> null]);
    }

    public function updateOctave(Request $request)
    {
        if (strcmp($request->api_key, Config::get('app.api_key')))
            return "Wrong API KEY!";

        $query = $request->input('query');

        $logs = new Logs();
        $logs->user_id = auth::id();
        $logs->input = $query;
        
        exec('octave');
        exec('octave --eval "pkg load control;' . $query . '"', $response);
        if($response == null)
            $logResponse = "error";
        else
            $logResponse = "correct";
        $logs->response = $logResponse;
        $logs->save();


        return view("successLogin")->with(["query"=>$query, "response"=>$response]);
    }
}
