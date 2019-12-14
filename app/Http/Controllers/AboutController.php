<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\About;

class AboutController extends Controller
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
    public function about(){
        $abouts = \App\About::where('id_about','>','0')->get();
         return $abouts;
    }
    public function addabout(){   
        $data = new About;
        $data->name = Input::get('name');
        $data->email = Input::get('email');
        $data->kontak = Input::get('kontak');
        $data->web = Input::get('web');
        $data->no_rekening = Input::get('no_rekening');
        $data->jenis_rekening = Input::get('jenis_rekening');
        $data->keterangan = Input::get('keterangan');
        $data->save();


        if(!empty($data)){
            $isSuccess = true;
            $response_status = 200;
            $message = "Data Berhasil Ditambahkan";

        }else{
            $isSuccess = false;
            $response_status = 200;
            $message  = "gagal mendapatkan data";
        }
        return response()->json(compact('isSuccess','response_status','message','data'));
    }
    public function updateabout(Request $request, $id){
         $no_rekening = $request->no_rekening;
         $jenis_rekening = $request->jenis_rekening;
         $data = About::find($id);
        
         $data->no_rekening=$no_rekening;
         $data->jenis_rekening=$jenis_rekening;
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
}
