<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class Octave extends Controller
{
    public function readOctave(Request $request){
        return view("octaveForm")->with(["response"=> null]);
    }
    
    public function updateOctave(Request $request)
    {
        $query = $request->input('query');   
        //return var_dump($query);
        exec('octave');
        exec('octave --eval "pkg load control;' . $query . '"', $response);

        return view("octaveForm")->with(["response"=>json_encode($response)]);
    }
}
