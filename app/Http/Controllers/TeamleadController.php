<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\{User,Leave};
use Redirect;
use Carbon\Carbon;

class TeamleadController extends Controller
{
    public function signin(){
        if(auth('teamlead')->user()){
            return redirect('team-lead/leaves')->with('success', 'All Leaves');
        }

        $data['title'] = " Signin Form";
        return view('Teamlead.signin',$data);  
    }

    public function postLogin(Request $request){
        $postdata = ['email' => $request->input('email'),  'password' => $request->input('password')];
        
        if(auth()->guard('teamlead')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('teamlead')->user();
            if($user->role == 'teamlead'){
                $res = array('success'=>true, 'message'=>__('message.LOGIN_SUCCESSFULL'));
            }else {
                $res = array('error'=>false, 'message'=>__('message.THIS_IS_NOT_VALID_USER'));
            }
        }else {
            $res = array('error'=>false, 'message'=>__('message.VALID_EMAIL_PASS'));
        }
        echo json_encode($res);
    }

    public function signup(){
        if(auth('teamlead')->user()){
            return redirect('team-lead/leaves')->with('success', 'All Leaves');
        }
        $data['title'] = " Signup Form";
        return view('Teamlead.signup',$data);  
    }

    public function postSignup(Request $request){
        $postData = array(
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
            'role'=>'teamlead'
        );
        $res = User::insertGetId($postData);
        
        if($res){
            $result = array('success'=>true, 'message'=>__('message.TEAMLEAD_SUCCESSFULL_ADDED'));
        }else{
            $result = array('success'=>false, 'message'=>__('message.SOMETHING_WRONG'));
        }
        echo json_encode($result);
    }

    public function leaves(Request $request){
        if(!auth('teamlead')->user()){
            return redirect('team-lead/signin')->with('success', __('message.THIS_IS_NOT_VALID_USER'));
        }
        $data['title'] = " All Leaves";
        $userId = auth('teamlead')->user()->id;
        
        if($request->ajax()){
            return datatables()->of(Leave::select('leaves.*','E.name')
                    ->leftjoin('users','leaves.user_id','=','users.teamlead')
                    ->leftjoin('users as E','leaves.user_id','=','E.id')
                    ->where(array('leaves.user_id'=>$userId))
                    ->orWhere(['E.teamlead'=>$userId])
                    ->orderBy('leaves.start_date','ASC')
                )
            ->addIndexColumn()
            ->addColumn('action', 'Teamlead/tl-action')
            ->addColumn('status', 'Teamlead/status')
            ->rawColumns(['status','action'])
            ->make(true);
        }else{  
            
            return view('Teamlead.leaves',$data); 
        }  
    }

    public function addLeave(Request $request){
        if(!auth('teamlead')->user()){
            return redirect('team-lead/signin')->with('success', __('message.THIS_IS_NOT_VALID_USER'));
        }
        $data['title'] = "Add Leave";
        return view('Teamlead.add-leave',$data);  
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
            'user_id'=>auth('teamlead')->user()->id,
            'no_days'=>$no_days,
        );
       // echo '<pre>'; print_r($postData); die;
        $res = Leave::insertGetId($postData);
        
        if($res){
            $result = array('success'=>true, 'message'=>__('message.LEAVE_SUCCESSFULL_CREATED'));
        }else{
            $result = array('success'=>false, 'message'=>__('message.SOMETHING_WRONG'));
        }
        echo json_encode($result);  
    }

    public function changeStatus(Request $request){
        $table = $request->table;
        $id = $request->id;

        $result = Leave::where('id',$request->id)->update(['status'=>$request->status]);
        if ($result) {
            echo 1;
        } else {
            echo 0;
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
