<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $kategoris = Kategori::latest()->paginate(3);
        return view('kategori.index',compact('kategoris'))->with('i',(request()->input('page',1)-1)*3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'nama_kategori' => 'required',
            'gbr_kategori' =>'required'
        ]);

       
       if(Input::hasFile('gbr_kategori')){
           $file = Input::file('gbr_kategori');
           $file->move('img_kategori',$file->getClientOriginalName());
           $gbr_kategori= $file->getClientOriginalName();
           $nama_kategori= Input::get('nama_kategori');
        }
         
           
       $save = Kategori::create(compact('nama_kategori','gbr_kategori'));
        // Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success','New Kategori Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori =Kategori::find($id);
        return view('kategori.detail',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit',compact('kategori'));
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
            'nama_kategori'=>'required',
            // 'gbr_kategori'=>'required'
            
        ]);

        $kategori = Kategori::find($id);
        
        if ($request->file('gbr_kategori')) {
           $file = Input::file('gbr_kategori');
           $file->move('img_kategori',$file->getClientOriginalName());
           $kategori->gbr_kategori= $file->getClientOriginalName();
           $kategori->nama_kategori= Input::get('nama_kategori');
        } else {
           // $kategori->gbr_kategori= $kategori->gbr_kategori;
           $kategori->nama_kategori= Input::get('nama_kategori');
        }
        
        
        $kategori->update();

        return redirect()->route('kategori.index')->with('success','Kategori Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $kategori=Kategori::find($id);
         $kategori->delete();
        return redirect()->route('kategori.index')->with('success','Kategori Deleted Succesfully');
    }
    
    public function kategori(){
        $kategoris = \App\Kategori::where('id_kategori','>','0')->get();
        return $kategoris;
    }

    public function cari(Request $request){
        $cari = $request->cari;

        $kategoris =DB::table('kategoris')->where('nama_kategori','like','%'.$cari."%")->paginate(3);

       return view('kategori.index',compact('kategoris'))->with('i',(request()->input('page',1)-1)*3);
    }

}
