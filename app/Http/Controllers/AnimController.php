<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimController extends Controller
{
    function index(){
        return view('car');
    }
}
