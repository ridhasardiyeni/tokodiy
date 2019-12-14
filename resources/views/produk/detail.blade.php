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
textarea {
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
                <h3>Detail Produk</h3>
                <hr>
            </div>
        </div>
        <form>
            <label>Penjual</label>
            <input type="text" id="id_user" name="id_user" disabled="true" value="{{$produk->user->name}}">
            <label>Kategori</label>
            <input type="text" id="id_user" name="id_kategori" disabled="true" value="{{$produk->kategori->nama_kategori}}">
             <label>Produk</label>
            <input type="text" id="id_produk" name="id_produk" disabled="true" value="{{$produk->nama_produk}}">
             <label>Merek</label>
            <input type="text" id="merk_produk" name="merk_produk" disabled="true" value="{{$produk->merk_produk}}">
             <label>Deskripsi</label>
            <textarea type="text" id="desc_produk" name="desc_produk" disabled="true">{{$produk->desc_produk}}</textarea>
             <label>Harga</label>
             <input type="text" id="harga_produk" name="harga_produk" disabled="true" value="Rp.{{number_format($produk->harga_produk,0,'.','.')}}">
              <label>Stok</label>
            <input type="text" id="stok_produk" name="stok_produk" disabled="true" value="{{$produk->stok_produk}}">
             <label>Kondisi</label>
            <input type="text" id="kondisi_produk" name="kondisi_produk" disabled="true" value="{{$produk->kondisi_produk}}">
             <label>Gambar Produk</label>
            <br><img width="150px" height="150px" src="{{asset('img_produk/'.$produk->file_produk.'')}}" class="w3-border" alt="Norway" style="padding:4px;width:30%">
             <br><label>Unit</label>
            <input type="text" id="id_unit" name="id_unit" disabled="true" value="{{$produk->unit->nama_unit}}">

        </form>

            <div class="col-md-12">
                <a href="{{route('produk.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
@endsection