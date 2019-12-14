<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JasaPengiriman;
use Illuminate\Support\Facades\Input;
use DB;

class JasaPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasapengirimans = JasaPengiriman::latest()->paginate(5);
        return view('jasapengiriman.index',compact('jasapengirimans'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasapengiriman.create');
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
            'jenis_jasa' => 'required',
            'harga_jasa' =>'required'


        ]);
        JasaPengiriman::create($request->all());
        return redirect()->route('jasapengiriman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jasapengiriman =JasaPengiriman::find($id);
        return view('jasapengiriman.detail',compact('jasapengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jasapengiriman = JasaPengiriman::find($id);
        return view('jasapengiriman.edit',compact('jasapengiriman'));
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
        $request->validate([
            'jenis_jasa'=>'required',
            'harga_jasa'=>'required'
            
        ]);

        $jasapengiriman =JasaPengiriman::find($id);
        $jasapengiriman->jenis_jasa =$request->get('jenis_jasa');
        $jasapengiriman->harga_jasa=$request->get('harga_jasa');
        $jasapengiriman->save();
        return redirect()->route('jasapengiriman.index')->with('success','Jasa Pengiriman Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasapengiriman=JasaPengiriman::find($id);
        $jasapengiriman->delete(); 
        return redirect()->route('jasapengiriman.index')->with('success','Jasa Pengiriman Deleted succesfully');
    }
    public function jasapengiriman(){
        $jasapengirimans = \App\JasaPengiriman::where('id_jasapengiriman','>','0')->get();
         return $jasapengirimans;
    }
    public function addjasa(){   
        $data = new JasaPengiriman;
        $data->jenis_jasa= Input::get('jenis_jasa');
        $data->harga_jasa= Input::get('harga_jasa');
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
    public function deljasa($id){
        $data =JasaPengiriman::find($id);
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
    public function updatejasa(Request $request, $id){
        $jenis_jasa = $request->jenis_jasa;
        $harga_jasa = $request->harga_jasa;

         $data = JasaPengiriman::find($id);
        
         $data->jenis_jasa=$jenis_jasa;
         $data->harga_jasa=$harga_jasa;
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
     public function cari(Request $request){
        $cari = $request->cari;

        $jasapengirimans =DB::table('jasapengirimans')->where('jenis_jasa','like','%'.$cari."%")->paginate(5);

       return view('jasapengiriman.index',compact('jasapengirimans'))->with('i',(request()->input('page',1)-1)*5);
    }
}
