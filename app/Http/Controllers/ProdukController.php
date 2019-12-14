<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Produk;
use App\Media;
use App\Kategori;
use App\Unit;
use App\User;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    
    public function index()
    {
        $produks = Produk::latest()->paginate(5);
        return view('produk.index',compact('produks'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        $kategoris =Kategori::all();
        $users=User::all();
        $units=Unit::all();
        
        return view('produk.create',compact('users','kategoris','units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user'=>'required',
            'id_kategori' => 'required',
            'nama_produk' =>'required',
            'merk_produk' => 'required',
            'desc_produk' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required',
            'kondisi_produk' => 'required',
            'file_produk' => 'required',
            'id_unit' => 'required'
            // 'id_point' => 'required'

        ]);
        if(Input::hasFile('file_produk')){
           $file = Input::file('file_produk');
           $file->move('img_produk',$file->getClientOriginalName());
           $file_produk= $file->getClientOriginalName();
           $id_user=Input::get('id_user');
           $id_kategori= Input::get('id_kategori');
           $nama_produk =Input::get('nama_produk');
           $merk_produk =Input::get('merk_produk');
           $desc_produk=Input::get('desc_produk');
           $harga_produk=Input::get('harga_produk');
           $stok_produk=Input::get('stok_produk');
           $kondisi_produk=Input::get('kondisi_produk');
           $id_unit=Input::get('id_unit');
           // $id_point=Input::get('id_point');
        }
        $save = Produk::create(compact('id_user','id_kategori','nama_produk','merk_produk','desc_produk','harga_produk','stok_produk','kondisi_produk','file_produk','id_unit'));
        return redirect()->route('produk.index')->with('success','New Produk Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $produk =Produk::find($id);
        return view('produk.detail',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris=Kategori::all();
        $units=Unit::all();
        $users=User::all();
        $produks=Produk::all();
        $produk = Produk::find($id);
        return view('produk.edit',compact('produk','produks','users','kategoris','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $request->validate([
            'id_user'=>'required',
            'id_kategori' => 'required',
            'nama_produk' =>'required',
            'merk_produk' => 'required',
            'desc_produk' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required',
            'kondisi_produk' => 'required',
            // 'file_produk' => 'required',
            'id_unit' => 'required'
          
        ]);

        $produk =Produk::find($id);
        if ($request->file('file_produk')) {
           $file = Input::file('file_produk');
           $file->move('img_produk',$file->getClientOriginalName());
           $produk->file_produk= $file->getClientOriginalName();
            $produk->id_user=Input::get('id_user');
            $produk->id_kategori = Input::get('id_kategori');
            $produk->nama_produk =Input::get('nama_produk');
            $produk->merk_produk = Input::get('merk_produk');
            $produk->desc_produk = Input::get('desc_produk');
            $produk->harga_produk = Input::get('harga_produk');
            $produk->stok_produk = Input::get('stok_produk');
            $produk->kondisi_produk = Input::get('kondisi_produk');
            $produk->id_unit = Input::get('id_unit');
            } else {

               // $produk->file_produk= $produk->file_produk;
               // $produk->file_produk= $file->getClientOriginalName();
                $produk->id_user=Input::get('id_user');
                $produk->id_kategori = Input::get('id_kategori');
                $produk->nama_produk =Input::get('nama_produk');
                $produk->merk_produk = Input::get('merk_produk');
                $produk->desc_produk = Input::get('desc_produk');
                $produk->harga_produk = Input::get('harga_produk');
                $produk->stok_produk = Input::get('stok_produk');
                $produk->kondisi_produk = Input::get('kondisi_produk');
                $produk->id_unit = Input::get('id_unit');
            }
       
        $produk->update();
        return redirect()->route('produk.index')->with('success','Produk Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk=Produk::find($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success','Produk Deleted succesfully');
    }
    public function produk(){
        $produks = \App\Produk::where('id_produk','>','0')->get();
         return $produks;
    }

    public function addproduk(Request $request){
        // $data= new Produk;
        // $data->id_kategori=Input::get('id_kategori');
        // $data->nama_produk=Input::get('nama_produk');
        // $data->merk_produk=Input::get('merk_produk');
        // $data->desc_produk=Input::get('desc_produk');
        // $data->harga_produk=Input::get('harga_produk');
        // $data->stok_produk=Input::get('stok_produk');
        // $data->kondisi_produk=Input::get('kondisi_produk');
        // $data->file_produk=Input::get('file_produk');
        // $data->id_toko=Input::get('id_toko');
        // $data->id_unit=Input::get('id_unit');
        // $data->id_point=Input::get('id_point');
        // $data->save();

        $request->validate([
            'id_user'=>'required',
            'id_kategori' =>'required',
            'nama_produk' =>'required',
            'merk_produk' =>'required',
            'desc_produk' =>'required',
            'harga_produk' =>'required',
            'stok_produk' =>'required',
            'kondisi_produk'=>'required',
            'file_produk'=>'required',
            // 'id_toko'=>'required',
            'id_unit'=>'required'
            // 'id_point'=>'required'
        ]);
        $id_user=$request->id_user;
        $id_kategori=$request->id_kategori;
        $nama_produk= $request->nama_produk;
        $merk_produk= $request->merk_produk;
        $desc_produk=$request->desc_produk;
        $harga_produk=$request->harga_produk;
        $stok_produk=$request->stok_produk;
        $kondisi_produk=$request->kondisi_produk;
        $file_produk=$request->file_produk;
        $id_unit=$request->id_unit;

        if(Input::hasFile('file_produk')){
            $file =Input::file('file_produk');
            $file->move(public_path().'/img_produk',$file->getClientOriginalName());
            $file_produk = $file->getClientOriginalName();
        }

        $create=Produk::create(compact('id_user','id_kategori','nama_produk','merk_produk','desc_produk','harga_produk','stok_produk','kondisi_produk','file_produk','id_unit'));

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

    // public function produk_image(Request $request){
    //     $gambar = $request->file('file_media')->store('user','media');

    //     $produk = Produk::all();    


    //     if(!empty($produk)){
    //        $isSuccess= true;
    //        $response_status =200;
    //        $message = "Berhasil mendapatkan data";
    //    }else{
    //        $isSuccess = false;
    //        $response_status=200;
    //        $message= "gagal mendapatkan data";
    //    }

    //    $data = $produk;
    //    $data1 = $media;
    //    return response()->json(compact('isSuccess','response_status','message','data','data1'));
    // }


    public function addproduct(Request $request)
    {

        $produk = new Produk;
        $produk->id_user=Input::get('id_user');
        $produk->id_kategori=Input::get('id_kategori');
        $produk->nama_produk=Input::get('nama_produk');
        $produk->merk_produk=Input::get('merk_produk');
        $produk->desc_produk=Input::get('desc_produk');
        $produk->harga_produk=Input::get('harga_produk');
        $produk->stok_produk=Input::get('stok_produk');
        $produk->kondisi_produk=Input::get('kondisi_produk');
        // $produk->file_produk=Input::get('file_produk');
        if(Input::hasFile('file_produk')){
            $file = Input::file('file_produk');
            $file->move(public_path().'/img_produk',$file->getClientOriginalName());
            $produk->file_produk =$file->getClientOriginalName();
        }else{
            $produk->file_produk = 'Not Found';
        }
        // $produk->id_toko=Input::get('id_toko');
        $produk->id_unit=Input::get('id_unit');
        // $produk->id_point=Input::get('id_point');
        $produk->save();


        $media = new Media;
        $media->id_produk = $produk->id_produk;

        if(Input::hasFile('file_media')){
            $file = Input::file('file_media');
            $file->move(public_path().'/img_media',$file->getClientOriginalName());
            $media->file_media = $file->getClientOriginalName();    
        }else{
            $media->file_media = 'Not Found';
        }

        $media->save();

        if(!empty($produk)){
           $isSuccess= true;
           $response_status =200;
           $message = "Berhasil mendapatkan data";
       }else{
           $isSuccess = false;
           $response_status=200;
           $message= "gagal mendapatkan data";
       }

        $product = $produk;
        $gambar = $media;
        return response()->json(compact('isSuccess','response_status','message','product','gambar'));
    }
    

    public function search(Request $request){
        $id_produk = $request->id_produk;

       
        $produks = \App\Produk::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($produks as $pro) {
            $pro->id;
            //  $pro->toko->nama_toko;
            // // $pro->unit->nama_unit;
        }

        if (!empty($produks)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $produks;
        return response()->json(compact('isSuccess','response','message','data'));
    }
     
     public function bykategori(Request $request){
        $id_kategori = $request->id_kategori;

        $produks = \App\Produk::where('id_kategori','LIKE','%'. $id_kategori .'%')->get();

        foreach ($produks as $pro) {
            $pro->kategori->id;
        }

        if (!empty($produks)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $produks;
        return response()->json(compact('isSuccess','response','message','data'));
    }
   
    public function byunit(Request $request){
        $id_unit = $request->id_unit;
        $produks = \App\Produk::where('id_unit','LIKE','%'. $id_unit .'%')->get();

        foreach ($produks as $pro) {
            $pro->unit->id;
        }

        if (!empty($produks)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $produks;
        return response()->json(compact('isSuccess','response','message','data'));
    }

     public function bymedia(Request $request){
        $id_media = $request->id_media;

       
        $produks = \App\Produk::where('id_media','LIKE','%'. $id_media .'%')->get();

        foreach ($produks as $pro) {
            $pro->media->id;
        }

        if (!empty($produks)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $produks;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function byuser(Request $request){
        $id_user = $request->id_user;

       
        $produks = \App\Produk::where('id_user','LIKE','%'. $id_user .'%')->get();

        foreach ($produks as $pro) {
            $pro->user->id;
        }

        if (!empty($produks)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $produks;
        return response()->json(compact('isSuccess','response','message','data'));
    }
    public function cari(Request $request){
        $cari = $request->cari;

        $produks =\App\Produk::where('nama_produk','like','%'.$cari."%")->paginate(5);

       return view('produk.index',compact('produks'))->with('i',(request()->input('page',1)-1)*5);
    }
}
