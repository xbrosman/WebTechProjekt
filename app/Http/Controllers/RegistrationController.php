<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function readRegistration()
    {
        return view('registrationForm');
    }

    public function createRegistration(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        $user = new User();
        $user->name = trim($name);
        $user->email = $email;
        $user->email_verified_at = now();
        $user->password = Hash::make($password);
        try{
            $user->save();
            return view('registrationForm')->with(["success" => "User registrated"]);
        }
        catch(QueryException $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
