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
        $logs->user_id = Auth::id();
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

    public function carAnim(Request $request)
    {
        if (strcmp($request->api_key, Config::get('app.api_key')))
            return "Wrong API KEY!";
        $q = strval($request->q);   
        $data = "m1 = 2500; m2 = 320;
        k1 = 80000; k2 = 500000;
        b1 = 350; b2 = 15020;
        A=[0 1 0 0;-(b1*b2)/(m1*m2) 0 ((b1/m1)*((b1/m1)+(b1/m2)+(b2/m2)))-(k1/m1) -(b1/m1);b2/m2 0 -((b1/m1)+(b1/m2)+(b2/m2)) 1;k2/m2 0 -((k1/m1)+(k1/m2)+(k2/m2)) 0];
        B=[0 0;1/m1 (b1*b2)/(m1*m2);0 -(b2/m2);(1/m1)+(1/m2) -(k2/m2)];
        C=[0 0 1 0]; D=[0 0];
        Aa = [[A,[0 0 0 0]'];[C, 0]];
        Ba = [B;[0 0]];
        Ca = [C,0]; Da = D;
        K = [0 2.3e6 5e8 0 8e6];
        sys = ss(Aa-Ba(:,1)*K,Ba,Ca,Da);
        
        t = 0:0.01:5;
        r = " . $q .";
        initX1=0;
        initX1d=0;
        initX2=0;
        initX2d=0;
        [y,t,x]=lsim(sys*[0;1],r*ones(size(t)),t,[initX1;initX1d;initX2;initX2d;0]);";
        
        exec('octave');
        exec('octave --eval "pkg load control;' . $data . ' x(:,1)"', $x1);
        exec('octave --eval "pkg load control;' . $data . ' x(:,3)"', $x3);
        array_shift($x1);
        array_shift($x1);
        array_shift($x3);
        array_shift($x3); 
        $data = array(
            'x1' => array($x1),
            'x2' => array($x3)
        );
        
         return json_encode($data);
    }
}
