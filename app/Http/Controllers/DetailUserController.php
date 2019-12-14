<?php

namespace App\Http\Controllers;

use App\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class DetailUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailUser  $detailUser
     * @return \Illuminate\Http\Response
     */
    public function show(DetailUser $detailUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailUser  $detailUser
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailUser $detailUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailUser  $detailUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailUser $detailUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailUser  $detailUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailUser $detailUser)
    {
        //
    }
     public function detailuser(){
        $detailusers = \App\DetailUser::where('id_detailuser','>','0')->get();
         return $detailusers;
    }
     public function adddetailuser(Request $request){   
         
        $request->validate([

            'id_user'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'icon_user'=>'required',
            'level'=>'required'
            
        ]);

       $id_user= $request->id_user;
       $jk=$request->jk;
       $alamat=$request->alamat;
       $icon_user=$request->icon_user;
       $level=$request->level;

       if(Input::hasFile('icon_user')){
           $file = Input::file('icon_user');
           $file->move(public_path().'/profil',$file->getClientOriginalName());
           $icon_user=$file->getClientOriginalName();
        }
         
           
       $create = DetailUser::create(compact('id_user','jk','alamat','icon_user','level'));

        if(!empty($create)){
            $isSuccess = true;
            $response_status = 200;
            $message = "Data Berhasil Ditambahkan";

        }else{
            $isSuccess = false;
            $response_status = 200;
            $message  = "gagal mendapatkan data";
        }
        return response()->json(compact('isSuccess','response_status','message','create'));
    }
     public function detailbyuser(Request $request){
        $id_user = $request->id_user;

       
        $detailusers = \App\DetailUser::where('id_user','LIKE','%'. $id_user .'%')->get();

        foreach ($detailusers as $detus) {
            $detus->user->id;
        }

        if (!empty($detailusers)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $detailusers;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function updatedetail(Request $request, $id_detailuser)
    {

        $data = DetailUser::findOrFail($id_detailuser);

       if ($request->file('icon_user')) {
           $file = Input::file('icon_user');
           $file->move('profil',$file->getClientOriginalName());
           
           $data->icon_user= $file->getClientOriginalName();
           $data->id_user = $request->id_user;;
           $data->jk = $request->jk;
           $data->alamat= $request->alamat;
           $data->level= $request->level;
           
           $data->save();
        }
        else{
            $data->id_user = $request->id_user;
            $data->jk = $request->jk;
            $data->alamat= $request->alamat;
            $data->icon_user= $data->icon_user;
            $data->level=$request->level;

            $data->save();
        }
         
       $data->save();

       if(!empty($data)){
            $isSuccess = true;
            $response_status = 200;
            $message = "Data Berhasil Di Update";

        }else{
            $isSuccess = false;
            $response_status = 200;
            $message  = "Gagal Update Data";
        }
        return response()->json(compact('isSuccess','response_status','message','data'));
        
    }
}
