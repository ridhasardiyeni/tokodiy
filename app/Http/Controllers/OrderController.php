<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Produk;
use App\Suplier;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->paginate(5);
        return view('order.index',compact('orders'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produks=Produk::all();
        $supliers=Suplier::all();
       return view('order.create',compact('produks','supliers'));
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
            'id_suplier' =>'required',
            'tgl_order' => 'required',
            'qty' => 'required'

        ]);
        Order::create($request->all());
        return redirect()->route('order.index')->with('success','New Order Created Successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('order.detail',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $produks=Produk::all();
         $supliers=Suplier::all();
         $order = Order::find($id);
        return view('order.edit',compact('order','produks','supliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order)
    {
        $order->update([
            
            'id_produk'=>request('id_produk'),
            'id_suplier'=>request('id_suplier'),
            'tgl_order'=>request('tgl_order'),
            'qty'=>request('qty'),

        ]);
        return redirect()->route('order.index')->with('success','Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        $order->delete();
        return redirect()->route('order.index')->with('success','Order Deleted succesfully');
    }
    public function order(){
        $orders = \App\Order::where('id_order','>','0')->get();
         return $orders;
    }
    public function orderbyproduk(Request $request){
        $id_produk = $request->id_produk;

       
        $orders = \App\Order::where('id_produk','LIKE','%'. $id_produk .'%')->get();

        foreach ($orders as $or) {
            $or->produk->id;
        }

        if (!empty($orders)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $orders;
        return response()->json(compact('isSuccess','response','message','data'));
    }

    public function orderbysuplier(Request $request){
        $id_suplier = $request->id_suplier;

       
        $orders = \App\Order::where('id_suplier','LIKE','%'. $id_suplier .'%')->get();

        foreach ($orders as $or) {
            $or->suplier->id;
        }

        if (!empty($orders)) {
            $isSuccess = true;
            $response = 200;
            $message = "data dapat";
        }else{
            $isSuccess = false;
            $response = 200;
            $message = "data ndak dapat";
        }

        $data = $orders;
        return response()->json(compact('isSuccess','response','message','data'));
    }
     public function cari(Request $request){
        $cari = $request->cari;

        $orders =\App\Order::where('tgl_order','like','%'.$cari."%")->paginate(5);

       return view('order.index',compact('orders'))->with('i',(request()->input('page',1)-1)*5);
    }
}
