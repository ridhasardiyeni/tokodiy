<?php

namespace App\Http\Controllers;

use App\DetailPenjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
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
     * @param  \App\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPenjualan $detailPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPenjualan  $detailPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPenjualan $detailPenjualan)
    {
        //
    }
     public function detail_penjualan(){
        $detail_penjualans = \App\DetailPenjualan::where('id_detail_penjualan','>','0')->get();
         return $detail_penjualans;
    }
    public function bypenjualan(Request $request){
        $id_penjualan = $request->id_penjualan;

       
        $detail_penjualans = \App\DetailPenjualan::where('id_penjualan','LIKE','%'. $id_penjualan .'%')->get();

        foreach ($detail_penjualans as $dj) {
            $dj->penjualan->id;
        }

        if (!empty($detail_penjualans)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $detail_penjualans;
        return response()->json(compact('isSuccess','response','message','data'));
    }

     public function byprodukdetail(Request $request){
        $id_produk = $request->id_produk;

       
        $detail_penjualans = \App\DetailPenjualan::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($detail_penjualans as $dp) {
            $dp->produk->id;
        }

        if (!empty($detail_penjualans)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $detail_penjualans;
        return response()->json(compact('isSuccess','response','message','data'));
    }
}
