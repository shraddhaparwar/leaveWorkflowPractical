<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employee,Hr,Teamlead};

class AuthController extends Controller
{
    
    public function signup(){
        
        $data['title'] = " ddddd Signup Form";
        return view('signup',$data);  
    }

    public function postSignup(Request $request){
        $role = $request->get('role');
        
        $postData = array(
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'role'=>$role
        );

        if($role == 'emp'){
            $postData['teamlead'] = $request->get('teamlead');
            $res = Employee::insertGetId($postData);
        }else if($role == 'tl'){ 
            // echo '<pre>'; print_r($postData); die;
            $res = Teamlead::insertGetId($postData);
        }else{
            $res = Hr::insertGetId($postData);
        }
        echo '<pre>'; print_r($postData); die;
        // $res = Cast::insertGetId($postData);
        // if($res){
        //     $result = array('success'=>true, 'message'=>__('message.CAST_SUCCESSFULL_CREATED'));
        // }else{
        //     $result = array('success'=>false, 'message'=>__('message.SOMETHING_WRONG'));
        // }
        // echo json_encode($result); 
    }
}
