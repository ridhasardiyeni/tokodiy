@extends('index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Detail Order</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Produk : </strong>{{$order->produk->nama_produk}}
                </div>
            </div>
            <div class="col-md-12">
                <div clas="form-group">
                    <strong>Supplier : </strong> {{$order->suplier->nama_suplier}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong> Tanggal Order : </strong>{{$order->tgl_order}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong> QTY : </strong>{{$order->qty}}
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('order.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
@endsection