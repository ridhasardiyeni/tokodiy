<?php

namespace App\Http\Controllers;

use App\DetailPembelian;
use Illuminate\Http\Request;

class DetailPembelianController extends Controller
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
     * @param  \App\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPembelian $detailPembelian)
    {
        //
    }
     public function detail_pembelian(){
        $detail_pembelians = \App\DetailPembelian::where('id_detail_pembelian','>','0')->get();
         return $detail_pembelians;
    }
    public function detailbyproduk(Request $request){
        $id_produk = $request->id_produk;

       
        $detail_pembelians = \App\DetailPembelian::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($detail_pembelians as $dpem) {
            $dpem->produk->id;
        }

        if (!empty($detail_pembelians)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $detail_pembelians;
        return response()->json(compact('isSuccess','response','message','data'));
    }

    public function bypembelian(Request $request){
        $id_pembelian = $request->id_pembelian;

       
        $detail_pembelians = \App\DetailPembelian::where('id_pembelian','LIKE','%'. $id_pembelian .'%')->get();

        foreach ($detail_pembelians as $dpem) {
            $dpem->pembelian->id;
        }

        if (!empty($detail_pembelians)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $detail_pembelians;
        return response()->json(compact('isSuccess','response','message','data'));
    }
}
