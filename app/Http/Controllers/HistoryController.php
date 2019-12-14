<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\User;
use App\Produk;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Str;
use DB;
use App\JasaPengiriman;


class HistoryController extends Controller
{
   
    public function index()
    {
        $historys = History::latest()->paginate(5);
        return view('history.index',compact('historys'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pembayaran' => 'required',
            'id_user' => 'required',
            'id_penjual' => 'required',
            'id_produk' =>'required',
            'harga_beli' => 'required',
            'jlh_beli' => 'required',
            'total_harga' => 'required',
            'id_jasapengiriman'=>'required',
            'is_status' =>'required'

        ]);
        History::create($request->all());
        return redirect()->route('history.index');
    }

    public function show(Request $r)
    {
        $historys = History::where('kode_pembayaran',$r)->get();
        return view('history.detail',compact('historys'));
    }

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
        $history=History::find($id);
        $history->delete();
        return redirect()->route('history.index')->with('success','Pembelian Deleted succesfully');
    }
    public function cari(Request $request){
        $cari = $request->cari;

        $historys =DB::table('historys')->where('kode_pembayaran','like','%'.$cari."%")->paginate(5);

       return view('history.index',compact('historys'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function history(){
        $historys = \App\History::where('id_history','>','0')->get();
         return $historys;
    }
    public function addhistory(){
       $data = new History;
       
       $data->kode_pembayaran= Input::get('kode_pembayaran');
       $data->id_user=Input::get('id_user');
       $data->id_detailuser = Input::get('id_detailuser');
       $data->id_penjual=Input::get('id_penjual');
       $data->id_produk=Input::get('id_produk');
       $data->harga_beli=Input::get('harga_beli');
       $data->jlh_beli=Input::get('jlh_beli');
       $data->id_jasapengiriman=Input::get('id_jasapengiriman');
       $data->total_harga= $data->harga_beli * $data->jlh_beli;
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

    public function historybyuser(Request $request){
        $id_user = $request->id_user;

       
        $historys = \App\History::where('id_user','LIKE','%'. $id_user .'%')->get();

        foreach ($historys as $his) {
            $his->user->id;
        }

        if (!empty($historys)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $historys;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function historybyproduk(Request $request){
        $id_produk= $request->id_produk;

       
        $historys = \App\History::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($historys as $his) {
            $his->produk->id;
        }

        if (!empty($historys)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $historys;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function delhistory($id){
        $data =History::find($id);
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
    public function statushis(Request $request, $id){
        $is_status = $request->is_status;
        $data = History::find($id);
        $data->is_status= $is_status;
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

    public function checkout(Request $r){
        // status 
        // 0 cancel
        // 1 not payed
        // 2 alab bayia barang lun kirim
        // 3 alah bayia barang otw
        // 4 finished
        // 5 invalid

        $data=History::where('id_user',$r->id_user)->where('is_status',$r->status)->get();

        foreach ($data as $da) {
            $da->produk;
            $da->user;
            $da->detailuser;
            $da->penjual;

            $da['total_pembayaran'] = History::where('id_user',$r->id_user)->where('is_status',$r->status)->sum('total_bayar');
        }

        if (!empty($data)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $data;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function addcheckout(){
       $data = new History;
       
       $data->kode_pembayaran= Input::get('kode_pembayaran');
       $data->id_user=Input::get('id_user');
       $data->id_detailuser = Input::get('id_detailuser');
       $data->id_penjual=Input::get('id_penjual');
       $data->id_produk=Input::get('id_produk');
       $data->harga_beli=Input::get('harga_beli');
       $data->jlh_beli=Input::get('jlh_beli');
       $data->total_harga= $data->harga_beli * $data->jlh_beli;
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
    public function byjasa(Request $request){
        $id_jasapengiriman= $request->id_jasapengiriman;

       
        $historys = \App\History::where('id_jasapengiriman','LIKE','%'. $id_jasapengiriman .'%')->get();

        foreach ($historys as $his) {
            $his->jasapengiriman->id_jasapengiriman;
        }

        if (!empty($historys)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $historys;
        return response()->json(compact('isSuccess','response','message','data'));
    }


}
