<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['title'] = "Leave Workflow Practical";
        return view('home',$data);  
    }
}
