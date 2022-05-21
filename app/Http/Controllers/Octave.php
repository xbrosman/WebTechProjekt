<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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
        //return var_dump($query);
        exec('octave');
        exec('octave --eval "pkg load control;' . $query . '"', $response);

        return view("successLogin")->with(["query"=>$query, "response"=>$response]);
    }
}
