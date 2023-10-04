<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\{User,Leave};

use Redirect;

class HrController extends Controller
{
    public function signin(){
        if(auth('hr')->user()){
            return redirect('hr/leaves')->with('success', 'All Leaves');
        }
        $data['title'] = " Signin Form";
        return view('Hr.signin',$data);  
    }

    public function postLogin(Request $request){
        
        $postdata = ['email' => $request->input('email'),  'password' => $request->input('password')];
        
        if(auth()->guard('hr')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('hr')->user();
            if($user->role == 'hr'){
                $res = array('success'=>true, 'message'=>"Greate! You are Logged in sucessfully");
            }else {
                $res = array('success'=>false, 'message'=>"Oops! invalid user");
            }
        }else {
            $res = array('success'=>false, 'message'=>"Oops! invalid email and password");
        }
        echo json_encode($res);
    }

    public function signup(){
        if(auth('hr')->user()){
            return redirect('hr/leaves')->with('success', __('message.THIS_IS_NOT_VALID_USER'));
        }
        $data['title'] = " Signup Form";
        return view('Hr.signup',$data);  
    }

    public function postSignup(Request $request){
        $postData = array(
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
            'role'=>'hr'
        );
        $res = User::insertGetId($postData);
        
        if($res){
            $result = array('success'=>true, 'message'=>__('message.HR_SUCCESSFULL_CREATED'));
        }else{
            $result = array('success'=>false, 'message'=>__('message.SOMETHING_WRONG'));
        }
        echo json_encode($result);
    }

    public function leaves(Request $request){

        if(!auth('hr')->user()){
            return redirect('hr/signin')->with('success', __('message.THIS_IS_NOT_VALID_USER'));
        }
        $data['title'] = " All Leaves";
        
        if($request->ajax()){
            return datatables()->of(Leave::select('leaves.*','users.name')
                ->leftjoin('users','leaves.user_id','=','users.id')
                ->orderBy('start_date','ASC'))
            ->addIndexColumn()
            ->addColumn('status','Hr.status')
            ->addColumn('action','Hr.hr-action')
            ->rawColumns(['action','status'])
            ->make(true);
        }else{  
            return view('Hr.leaves',$data); 
        }  
    }

    public function changeStatus(Request $request){
        $table = $request->table;
        $id = $request->id;

        $user = User::select('id','role')->where('id',$request->user_id)->first();
        if($user->role === 'teamlead' && $request->status == 2){
            echo 2;
        }else{
            $result = Leave::where('id',$request->id)->update(['status'=>$request->status]);
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
    
    public function logout(Request $request)
    {
        auth()->guard('teamlead')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        $user = auth()->guard('teamlead')->user();
        
        return redirect('team-lead/signin');
    }
}
