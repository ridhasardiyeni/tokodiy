<?php

namespace App\Http\Controllers;

use App\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produk;
use App\User;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjangs = Keranjang::latest()->paginate(5);
        return view('keranjang.index',compact('keranjangs'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
            'id_user' => 'required',
            'id_produk' =>'required',
            'id_penjual' => 'required',
            'nama_penjual' => 'required',
            'harga_beli' => 'required',
            'jlh_beli' => 'required',
            'total_harga'=>'required',
            'is_status' =>'required'


        ]);
        Keranjang::create($request->all());
        return redirect()->route('keranjang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keranjang = Keranjang::find($id);
        return view('keranjang.detail',compact('keranjang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $id)
    {
         
         $Keranjang = keranjang::find($id);
        return view('keranjang.edit',compact('keranjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keranjang->update([
           
            'is_status'=>request('is_status'),

        ]);
        return redirect()->route('keranjang.index')->with('success','Keranjang Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
     public function cari(Request $request){
        $cari = $request->cari;

        $keranjangs =\App\Keranjang::where('id_user','like','%'.$cari."%")->paginate(5);

       return view('keranjang.index',compact('keranjangs'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function destroy($id)
    {
        $keranjang=Keranjang::find($id);
        $keranjang->delete();
        return redirect()->route('keranjang.index')->with('success','Keranjang Deleted succesfully');
    }
    public function keranjang(){
        $keranjangs = \App\Keranjang::where('id_keranjang','>','0')->get();
         return $keranjangs;
    }
    public function relasikeranjang(){
        $keranjangs = \App\Keranjang::where('id_keranjang','>','0')->get();

        foreach($keranjangs as $keranjang){
            $keranjang->user;
            $keranjang->produk;
        }
        $data = $keranjangs;
         return response()->json(compact('data'));
    }
    
    public function relasikeranjangbyproduk(Request $request){
        $id_produk = $request->id_produk;

       
        $keranjangs = \App\Keranjang::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach($keranjangs as $keranjang){
            $keranjang->user;
            $keranjang->produk;
        }
        $data = $keranjangs;
         return response()->json(compact('data'));
    }


    public function addkeranjang(){   
        $data = new Keranjang;
        $data->id_user = Input::get('id_user');
        $data->id_produk= Input::get('id_produk');
        $data->id_penjual=Input::get('id_penjual');
        $data->nama_penjual=Input::get('nama_penjual');
        $data->harga_beli=Input::get('harga_beli');
        $data->jlh_beli=Input::get('jlh_beli');
        $data->total_harga=$data->harga_beli * $data->jlh_beli;
        // $data->is_status=Input::get('is_status');

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
    public function keranjangbyuser(Request $request){
        $id_user = $request->id_user;

       
        $keranjangs = \App\Keranjang::where('id_user','LIKE','%'. $id_user .'%')->get();

        foreach ($keranjangs as $ker) {
            $ker->user->id;
        }

        if (!empty($keranjangs)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $keranjangs;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function keranjangbyproduk(Request $request){
        $id_produk = $request->id_produk;

       
        $keranjangs = \App\Keranjang::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($keranjangs as $ker) {
            $ker->produk->id;
        }

        if (!empty($keranjangs)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data tidak dapat";
        }

        $data = $keranjangs;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function delete($id){
        $data =Keranjang::find($id);
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

    public function updatestatus(Request $request, $id){
        $is_status = $request->is_status;

         $data = Keranjang::find($id);
        
         $data->is_status=$is_status;
         $data->total_harga=$data->harga_beli * $data->jlh_beli;
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
    public function tampilharga(){
        $data = Keranjang::all();
        //  foreach ($data as $datas) {
            
            
        //     // $datas['total_harga'] = Keranjang::where('id_user',$datas->id_user)->where('is_status','1')->sum('harga_beli');
        //     $is_status= $datas->is_status;
        //     if($is_status == '1'){
        //         $datas->harga_beli;
        //         $datas['total_harga'] = Keranjang::where('is_status','1')->sum('harga_beli');
        //     }elseif($is_status == '0'){
        //         $datas->harga_beli;
        //         $datas['total_harga'] = Keranjang::where('is_status','1')->sum('harga_beli');
        //     }
        // }
        foreach ($data as $datas) {

            $is_status= $datas->is_status;
            if($is_status == '1'){
                $datas->harga_beli;
                $datas->jlh_beli;
                $datas->total_harga=$datas->harga_beli * $datas->jlh_beli;
                $datas['total_bayar'] = Keranjang::where('is_status','1')->sum('total_harga');
        

            }elseif($is_status == '0'){
                $datas->harga_beli;
                $datas['total_bayar'] = Keranjang::where('is_status','1')->sum('total_harga');
            }
        }
        if(!empty($data)){
            $isSuccess = true;
            $response_status = 200;
            $message = "Data Berhasil";

        }else{
            $isSuccess = false;
            $response_status = 200;
            $message  = "Data Gagal";
        }
        return response()->json(compact('isSuccess','response_status','message','data'));
    }

     public function updatejum(Request $request, $id){
        $jlh_beli = $request->jlh_beli;
        $total_harga = $request->total_harga;

         $data = Keranjang::find($id);
        
         $data->jlh_beli=$jlh_beli;
         $data->total_harga=$data->harga_beli * $data->jlh_beli;
         $data->save();

        if(!empty($data)){
            $isSuccess = true;
            $response_status = 200;
            $message = "Data Berhasil Diupdate";

        }else{
            $isSuccess = false;
            $response_status = 200;
            $message  = "Gagal mengupdate data";
        }
        return response()->json(compact('isSuccess','response_status','message','data'));
    
    }
   
}
