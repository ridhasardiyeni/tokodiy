<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InfoController extends Controller
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
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        //
    }
    public function info(){
        $infos = \App\Info::where('id_info','>','0')->get();
         return $infos;
    }
     public function addinfo(Request $request){   
         
        $request->validate([

            'judul_info'=>'required',
            'isi_info'=>'required',
            'gambar_info'=>'required'
            
        ]);

       $judul_info= $request->judul_info;
       $isi_info =$request->isi_info;
       $gambar_info=$request->gambar_info;

       if(Input::hasFile('gambar_info')){
           $file = Input::file('gambar_info');
           $file->move(public_path().'/img_info',$file->getClientOriginalName());
           $gambar_info=$file->getClientOriginalName();
        }
         
           
       $create = Info::create(compact('judul_info','isi_info','gambar_info'));

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
}
