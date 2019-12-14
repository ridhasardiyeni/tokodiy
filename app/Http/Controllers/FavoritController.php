<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Favorit;
use App\User;
use App\Produk;

class FavoritController extends Controller
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
     public function favorit(){
        $favorits = \App\Favorit::where('id_favorit','>','0')->get();
         return $favorits;
    }
    public function relasifavorit(){
        $favorits = \App\Favorit::where('id_favorit','>','0')->get();

        foreach($favorits as $favorit){
            $favorit->user;
            $favorit->produk;
        }
        $data = $favorits;
         return response()->json(compact('data'));
    }
     public function addfavorit(){   
        $data = new Favorit;
        $data->id_user = Input::get('id_user');
        $data->id_produk= Input::get('id_produk');
        $data->id_penjual=Input::get('id_penjual');
        $data->nama_penjual=Input::get('nama_penjual');
        $data->harga_beli=Input::get('harga_beli');
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
    public function favoritbyuser(Request $request){
        $id_user = $request->id_user;

       
        $favorits = \App\Favorit::where('id_user','LIKE','%'. $id_user .'%')->get();

        foreach ($favorits as $fav) {
            $fav->user->id;
        }

        if (!empty($favorits)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $favorits;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function favoritbyproduk(Request $request){
        $id_produk = $request->id_produk;

       
        $favorits = \App\Favorit::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($favorits as $fav) {
            $fav->produk->id;
        }

        if (!empty($favorits)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $favorits;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function delete($id){
        $data =Favorit::find($id);
        $data->delete();
        if(!empty($data)){
            $isSuccess = true;
            $response_status = 200;
            $message = "Data Berhasil Dihapus";

        }else{
            $isSuccess = false;
            $response_status = 200;
            $message  = "gagal menghapus data";
        }
        return response()->json(compact('isSuccess','response_status','message','data'));
    }

}
