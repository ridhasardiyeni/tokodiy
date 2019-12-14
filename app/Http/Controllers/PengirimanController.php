<?php

namespace App\Http\Controllers;

use App\Pengiriman;
use Illuminate\Http\Request;
use App\User;
use App\History;
use Illuminate\Support\Facades\Input;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengirimans = Pengiriman::latest()->paginate(5);
        return view('pengiriman.index',compact('pengirimans'))->with('i',(request()->input('page',1)-1)*5);
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
        $request->validate([
            'kode_pembayaran' => 'required',
            'id_penjual' => 'required',
            'id_user' => 'required',
            'no_resi' =>'required',
            'is_status' =>'required'

        ]);
        Pengiriman::create($request->all());
        return redirect()->route('pengiriman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $id)
    {
        $pengiriman = Pengiriman::find($id);
        return view('pengiriman.detail',compact('pengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengiriman=Pengiriman::find($id);
        $pengiriman->delete();
        return redirect()->route('pengiriman.index')->with('success','Penjualan Deleted succesfully');
    }
    public function pengiriman(){
        $pengirimans = \App\Pengiriman::where('id_pengiriman','>','0')->get();
         return $pengirimans;
    }
    public function addpengiriman(){   
        $data = new Pengiriman;
        $data->kode_pembayaran = Input::get('kode_pembayaran');
        $data->id_penjual = Input::get('id_penjual');
        $data->id_user = Input::get('id_user');
        $data->no_resi= Input::get('no_resi');
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
    public function delpengiriman($id){
        $data =Pengiriman::find($id);
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
    public function editstatus(Request $request, $id){
        $is_status = $request->is_status;

         $data = Pengiriman::find($id);
        
         $data->is_status=$is_status;
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
    public function updateresi(Request $request, $id){
        $no_resi = $request->no_resi;

         $data = Pengiriman::find($id);
        
         $data->no_resi=$no_resi;
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
    public function byuserpengirim(Request $request){
        $id_user = $request->id_user;

       
        $pengirimans = \App\Pengiriman::where('id_user','LIKE','%'. $id_user .'%')->get();

        foreach ($pengirimans as $peng) {
            $peng->pembeli->id;
        }

        if (!empty($pengirimans)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data tidak dapat";
        }

        $data = $pengirimans;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function bypenjual(Request $request){
        $id_penjual = $request->id_penjual;

       
        $pengirimans = \App\Pengiriman::where('id_penjual','LIKE','%'. $id_penjual .'%')->get();

        foreach ($pengirimans as $peng) {
            $peng->penjual->id_penjual;
           
        }

        if (!empty($pengirimans)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data tidak dapat";
        }

        $data = $pengirimans;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    
}
