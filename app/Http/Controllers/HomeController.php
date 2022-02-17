<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        return view("Content.dashboard");
    }

    public function form(){
        return view("Content.form");
    }

  
}
