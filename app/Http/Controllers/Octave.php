<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Octave extends Controller
{
    public function getForm(Request $request){
        return view("show")->with(["response"=> null]);
    }
    
    public function show(Request $request)
    {
        $query = $request->input('query');   
        //return var_dump($query);
        exec('octave');
        exec('octave --eval "pkg load control;' . $query . '"', $response);

        return view("show")->with(["response"=>json_encode($response)]);
    }
}