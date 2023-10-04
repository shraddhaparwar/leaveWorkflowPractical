<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\{User, Leave};
use Carbon\Carbon;
use Redirect;

class EmployeeController extends Controller
{
    public function __construct(){
    }
    public function signin(Request $request){
        if(auth('emp')->user()){
            return redirect('employee/leaves')->with('success', 'Al Leaves');
        }
        $data['title'] = " Signin Form";
        return view('Employee.signin',$data);  
    }
    
    public function postLogin(Request $request){
        
        $postdata = ['email' => $request->input('email'),  'password' => $request->input('password')];
        
        if(auth()->guard('emp')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('emp')->user();
            if($user->role == 'employee'){
                $res = array('success'=>true, 'message'=>"Greate! You are Logged in sucessfully");
            }
        }else {
            $res = array('success'=>false, 'message'=>"Oops! invalid email and password");
        }
        echo json_encode($res);
    }

    public function signup(Request $request){
        if(auth('emp')->user()){
            return redirect('employee/leaves')->with('success', 'All Leaves');
        }
        $data['title'] = " Signup Form";
        $data['teamlead'] = User::select('id','name')->where('role','teamlead')->get();
       
        return view('Employee.signup',$data);  
    }

    public function postSignup(Request $request){
        $postData = array(
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
            'teamlead'=>$request->get('teamlead'),
            'role'=>'employee'
        );
        $res = User::insertGetId($postData);
        
        if($res){
            $result = array('success'=>true, 'message'=>__('message.EMP_SUCCESSFULL_CREATED'));
        }else{
            $result = array('success'=>false, 'message'=>__('message.SOMETHING_WRONG'));
        }
        echo json_encode($result);
    }

    public function addLeave(Request $request){
        if(!auth('emp')->user()){
            return redirect('employee/signin')->with('success', __('message.THIS_IS_NOT_VALID_USER'));
        }
        $data['title'] = "Add Leave";
        return view('Employee.add-leave',$data);  
    }

    public function postLeave(Request $request){
        $leaveID = 'LI-00'.rand(00,99);
        $toDate = Carbon::parse($request->get('start_date'));
        $fromDate = Carbon::parse($request->get('end_date'));  
        $no_days = $toDate->diffInDays($fromDate);
        $postData = array(
            'leaveId'=>$leaveID,
            'reason'=>$request->get('reason'),
            'start_date'=>$request->get('start_date'),
            'end_date'=>$request->get('end_date'),
            'no_days'=>$no_days,
            'user_id'=>auth('emp')->user()->id
        );
        $res = Leave::insertGetId($postData);
        
        if($res){
            $result = array('success'=>true, 'message'=>__('message.LEAVE_SUCCESSFULL_CREATED'));
        }else{
            $result = array('success'=>false, 'message'=>__('message.SOMETHING_WRONG'));
        }
        echo json_encode($result);  
    }

    public function leaves(Request $request){
       if(!auth('emp')->user()){
            return redirect('employee/signin')->with('success', __('message.THIS_IS_NOT_VALID_USER'));
        }
        $data['title'] = " All Leaves";
        $userId = auth('emp')->user()->id;
        
        if($request->ajax()){
            return datatables()->of(Leave::select('leaves.*','users.name')
                ->leftjoin('users','leaves.user_id','=','users.id')
                ->where('user_id',$userId)
                ->orderBy('start_date','ASC'))
            ->addIndexColumn()
            ->addColumn('status', 'Employee.emp-status')
            ->rawColumns(['status'])
            ->make(true);
        }else{  
            $data['leaves'] = Leave::select('*')->get();
            return view('Employee.leaves',$data); 
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
