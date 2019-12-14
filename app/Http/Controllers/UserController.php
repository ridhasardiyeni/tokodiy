<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\UserController;


class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){
         if(Auth::attempt(['phone'=> request('phone'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            $isSuccess =true;
            return response()->json(['success' => $success, 'isSuccess'=> $isSuccess,'successs' => $user], $this->successStatus);
        
         }else{
           $isSuccess = false;
           $response_status=200;
           $message= "gagal mendapatkan data";
       }
       return response()->json(compact('isSuccess','response_status','message','data'));
        
    }
    // 
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function userbyid(Request $request){
        $id_user= $request->id_user;

       
        $users = \App\User::where('id_user','LIKE','%'. $id_user.'%')->get();

        if (!empty($users)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $users;
        return response()->json(compact('isSuccess','response','message','data'));
    }

    public function updateuser(Request $request, $id){
        

        $name = $request->name;
        $email = $request->email;

         $data = User::find($id);
         $data->name=$name;
         $data->email=$email;
         $data->save();

        if(!empty($data)){
            $isSuccess = true;
            $response_status = 200;
            $message = "Data Berhasil Diupdate";

        }else{
            $isSuccess = false;
            $response_status = 200;
            $message  = "gagal mengupdate data";
        }
        return response()->json(compact('isSuccess','response_status','message','data'));
    }
    
    public function logine(){
        $user = \App\User::where('phone',$request->phone)->first();
        if ($user->level == 1) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('nApp')->accessToken;
                $isSuccess =true;
                return response()->json(['success' => $success, 'isSuccess'=> $isSuccess,'successs' => $user], $this->successStatus);
        }else{
                $isSuccess = false;
                $response_status=200;
                $message= "Mohon Maaf Anda Tidak Bisa Mengakses Halaman Ini";
        }
        if(Auth::attempt(['phone'=> request('phone'), 'password' => request('password')])){

         }else{
           $isSuccess = false;
           $response_status=200;
           $message= "gagal mendapatkan data";
       }
       return response()->json(compact('isSuccess','response_status','message','data'));
    }
}
