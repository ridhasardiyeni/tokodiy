<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produk;


class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tokos=Toko::all();
        $produks=Produk::all();
        $points = Point::latest()->paginate(5);
        return view('point.index',compact('points'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tokos=Toko::all();
        $produks=Produk::all();
        return view('point.create', compact('tokos','produks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Point $point)
    {

        Point::create([
            // 'id_toko'=>request('id_toko'),
            'id_produk'=>request('id_produk'),
            'jlh_point'=>request('jlh_point'),
        ]);
        return redirect()->route('point.index')->with('success','New Point Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $point =Point::find($id);
        return view('point.detail',compact('point'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {   
        // $tokos=Toko::all();
        $produks=Produk::all();
        
        return view('point.edit',compact('point','produks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Point $point)
    {

        $point->update([
            // 'id_toko'=>request('id_toko'),
            'id_produk'=>request('id_produk'),
            'jlh_point'=>request('jlh_point'),
        ]);
        

        return redirect()->route('point.index')->with('success','Point Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $point=Point::find($id);
        $point->delete();
        return redirect()->route('point.index')->with('success','Point Deleted succesfully');
    }
    public function point(){
        $points = \App\Point::where('id_point','>','0')->get();
         return $points;
    }
    // public function pointbytoko(Request $request){
    //     $id_toko = $request->id_toko;

       
    //     $points = \App\Point::where('id_toko','LIKE','%'. $id_toko .'%')->get();

    //     foreach ($points as $poi) {
    //         $poi->toko->id;
    //     }

    //     if (!empty($points)) {
    //         $isSuccess = true;
    //         $response = 200;
    //         $message = "data dapat";
    //     }else{
    //         $isSuccess = false;
    //         $response = 200;
    //         $message = "data ndak dapat";
    //     }

    //     $data = $points;
    //     return response()->json(compact('isSuccess','response','message','data'));
    // }
    public function pointbyproduk(Request $request){
        $id_produk = $request->id_produk;

       
        $points = \App\Point::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($points as $poi) {
            $poi->produk->id;
        }

        if (!empty($points)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $points;
        return response()->json(compact('isSuccess','response','message','data'));
    }
     public function cari(Request $request){
        $cari = $request->cari;

        $points =\App\Point::where('jlh_point','like','%'.$cari."%")->paginate(5);

       return view('point.index',compact('points'))->with('i',(request()->input('page',1)-1)*5);
    }

}
