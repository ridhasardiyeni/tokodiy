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
                <h3>Detail Keranjang</h3>
                <hr>
            </div>
        </div>
        <form>
            <label>Pembeli</label>
            <input type="text" id="id_user" name="id_user" disabled="true" value="{{$keranjang->user->name}}">
            <label>Penjual</label>
            <input type="text" id="id_penjual" name="id_penjual" disabled="true" value="{{$keranjang->penjual->name}}">
            <label>Produk</label>
            <input type="text" id="id_produk" name="id_produk" disabled="true" value="{{$keranjang->produk->nama_produk}}">
            <label>Gambar Produk</label>
            <br><img width="100px" height="100px" src="{{asset('img_produk/'.$keranjang->produk->file_produk.'')}}" class="w3-border" style="padding:4px;width:30%"><br>
            <label>Harga Beli</label>
            <input type="text" id="harga_beli" name="harga_beli" disabled="true" value="Rp.{{number_format($keranjang->harga_beli,0,'.','.')}}">
            <label>Jumlah Beli</label>
            <input type="text" id="jlh_beli" name="jlh_beli" disabled="true" value="{{$keranjang->jlh_beli}}">
            <label>Total Harga</label>
            <input type="text" id="total_harga" name="total_harga" disabled="true" value="Rp.{{number_format ($keranjang->total_harga ,0,'.','.')}}">
            <label>Status</label>
            <input type="text" id="is_status" name="is_status" disabled="true" value="{{$keranjang->is_status}}">
            
                <a href="{{route('keranjang.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            
        </form>
    </div>
@endsection