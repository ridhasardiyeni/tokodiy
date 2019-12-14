<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Produk;
use Illuminate\Support\Facades\Input;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::latest()->paginate(3);
        return view('media.index',compact('medias'))->with('i',(request()->input('page',1)-1)*3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $produks=Produk::all();
       return view('media.create',compact('produks'));
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
            'id_produk' => 'required',
            'file_media' =>'required'
        ]);

       
       if(Input::hasFile('file_media')){
           $file = Input::file('file_media');
           $file->move('img_media',$file->getClientOriginalName());
           $file_media= $file->getClientOriginalName();
           $id_produk= Input::get('id_produk');
        }
         
           
       $save = Media::create(compact('id_produk','file_media'));
        return redirect()->route('media.index')->with('success','New Media Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media =Media::find($id);
        return view('media.detail',compact('media'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produks=Produk::all();
        $media=Media::find($id);
        return view('media.edit',compact('media','produks'));
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
            'id_produk'=>'required',    
        ]);

        $media =Media::find($id);
        if ($request->file('file_media')) {
           $file = Input::file('file_media');
           $file->move('img_media',$file->getClientOriginalName());
           $media->file_media= $file->getClientOriginalName();
           
        } else {
           $media->id_produk= Input::get('id_produk');
        }
        $media->update();
        return redirect()->route('media.index')->with('success','Media Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $media=Media::find($id);
         $media->delete();
        return redirect()->route('media.index')->with('success','Media Deleted Succesfully');
    }

    public function media(){
        $medias = \App\Media::where('id_media','>','0')->get();
         return $medias;
    }

  public function addmedia(Request $request){
        
        $request->validate([

            'id_produk'=>'required'
        ]);

       $id_produk= $request->id_produk;

       if(Input::hasFile('file_media')){
           $file = Input::file('file_media');
           $file->move(public_path().'/img_media',$file->getClientOriginalName());
           $file_media = $file->getClientOriginalName();
        }
         
           
       $create = Media::create(compact('id_produk','file_media'));

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
    public function mediabyproduk(Request $request){
        $id_produk = $request->id_produk;

       
        $medias = \App\Media::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($medias as $med) {
            $med->produk->id;
        }

        if (!empty($medias)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $medias;
        return response()->json(compact('isSuccess','response','message','data'));
    }

    public function mediafile(){
      
       $product = \App\Produk::where('id_produk','>','0')->get();

       foreach ($product as $prod) {
         $prod->media;
       }
       if (!empty($product)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $product;
        return response()->json(compact('isSuccess','response','message','data'));
    }
     
}
