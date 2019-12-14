<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::latest()->paginate(5);
        return view('unit.index',compact('units'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
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
            'nama_unit' => 'required',
            'keterangan' =>'required'

        ]);
        Unit::create($request->all());
        return redirect()->route('unit.index')->with('Success','New Unit Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit =Unit::find($id);
        return view('unit.detail',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $unit = Unit::find($id);
        return view('unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_unit'=>'required',
            'keterangan'=>'required'

        ]);

        $unit =Unit::find($id);
        $unit->nama_unit  = $request->get('nama_unit');
        $unit->keterangan =$request->get ('keterangan');
        $unit->save();
        return redirect()->route('unit.index')->with('success','Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit=Unit::find($id);
        $unit->delete();
        return redirect()->route('unit.index')->with('success','Unit Deleted succesfully');
    }
     public function unit(){
        $units = \App\Unit::where('id_unit','>','0')->get();
         return $units;
    }
     public function cari(Request $request){
        $cari = $request->cari;

        $units =DB::table('units')->where('nama_unit','like','%'.$cari."%")->paginate(5);

       return view('unit.index',compact('units'))->with('i',(request()->input('page',1)-1)*5);
    }

}
