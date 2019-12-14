<?php

namespace App\Http\Controllers;

use App\Suplier;
use Illuminate\Http\Request;
use Illuminate\Suppor\Facades\Input;
use DB;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supliers = Suplier::latest()->paginate(5);
        return view('suplier.index',compact('supliers'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suplier.create');
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
            'nama_suplier' => 'required',
            'alamat_suplier' =>'required',
            'no_telp' => 'required'

        ]);
        Suplier::create($request->all());
        return redirect()->route('suplier.index')->with('success','New Suplier Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suplier =Suplier::find($id);
        return view('suplier.detail',compact('suplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suplier = Suplier::find($id);
        return view('suplier.edit',compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_suplier'=>'required',
            'alamat_suplier'=>'required',
            'no_telp'=>'required'

        ]);

        $suplier =Suplier::find($id);
        $suplier->nama_suplier = $request->get('nama_suplier');
        $suplier->alamat_suplier = $request->get('alamat_suplier');
        $suplier->no_telp = $request->get('no_telp');
        $suplier->save();
        return redirect()->route('suplier.index')->with('success','Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suplier=Suplier::find($id);
        $suplier->delete();
        return redirect()->route('suplier.index')->with('success','Suplier Deleted succesfully');
    }
     public function suplier(){
        $supliers = \App\Suplier::where('id_suplier','>','0')->get();
         return $supliers;
    }
     public function cari(Request $request){
        $cari = $request->cari;

        $supliers =DB::table('supliers')->where('nama_suplier','like','%'.$cari."%")->paginate(5);

       return view('suplier.index',compact('supliers'))->with('i',(request()->input('page',1)-1)*5);
    }

}
