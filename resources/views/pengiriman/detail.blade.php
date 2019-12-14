@extends('index')
@section('content')
<style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
}
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Detail Penjualan</h3>
                <hr>
            </div>
        </div>
        <form>
            <label>Kode Pembayaran</label>
            <input type="text" id="kode_pembayaran" name="kode_pembayaran" disabled="true" value="{{$pengiriman->kode_pembayaran}}">
            <label>Penjual</label>
            <input type="text" id="id_penjual" name="id_penjual" disabled="true" value="{{$keranjang->penjual->name}}">
            <label>Pembeli</label>
            <input type="text" id="id_user" name="id_user" disabled="true" value="{{$keranjang->user->id_user}}">
            <label>No Resi</label>
            <input type="text" id="no_resi" name="no_resi" disabled="true" value="($pengiriman->no_resi}}">
            <label>Status</label>
            <input type="text" id="is_status" name="is_status" disabled="true" value="{{$pengiriman->is_status}}">
            
                <a href="{{route('keranjang.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            
        </form>
    </div>
@endsection