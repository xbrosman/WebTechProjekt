<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class MainController extends Controller
{
    function index(){
        return view('login');
    }

    function checkLogin(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        try{

            if (Auth::attempt($user_data))
            {
                return redirect('main/successLogin');
            }
            else
            {
                return back()->with('error', 'Wrong Login Details');
            }
        }
        catch(QueryException $e){
            return back()->with('error', 'Error: '.$e->getCode());
        }
    }

    function successLogin()
    {
        return view('successLogin');
    }

    function logout()
    {
        Auth::logout();
        return redirect('main');
    }
}
