<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Illuminate\Support\Facades\Input;
use App\User;

class PembayaranController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function pembayaran(){
        $pembayarans = \App\Pembayaran::where('id_pembayaran','>','0')->get();
        return $pembayarans;
    }
    public function addpembayaran(Request $request){   
         $request->validate([

            'id_user'=>'required',
            'jenis_pembayaran'=>'required',
            'norek'=>'required',
            'jlh_pembayaran'=>'required',
            'bukti_pembayaran'=>'required'
        ]);

       $id_user= $request->id_user;
       $jenis_pembayaran =$request->jenis_pembayaran;
       $norek=$request->norek;
       $jlh_pembayaran=$request->jlh_pembayaran;
       $bukti_pembayaran=$request->bukti_pembayaran;

       if(Input::hasFile('bukti_pembayaran')){
           $file = Input::file('bukti_pembayaran');
           $file->move(public_path().'/bukti_bayar',$file->getClientOriginalName());
           $bukti_pembayaran = $file->getClientOriginalName();
        }
         
           
       $create =Pembayaran::create(compact('id_user','jenis_pembayaran','norek','jlh_pembayaran','bukti_pembayaran'));

         if(!empty($create)){
           $isSuccess= true;
           $response_status =200;
           $message = "Berhasil mendapatkan data";
       }else{
           $isSuccess = false;
           $response_status=200;
           $message= "gagal mendapatkan data";
       }
       return response()->json(compact('isSuccess','response_status','message','create'));
    }
}
