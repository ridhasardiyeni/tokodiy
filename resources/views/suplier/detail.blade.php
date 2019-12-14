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
                <h3>Detail Supplier</h3>
                <hr>
            </div>
        </div>
        <form>
                <label>Supplier</label>
                <input type="text" id="nama_suplier" name="nama_suplier" disabled="true" value="{{$suplier->nama_suplier}}">
                <label>Alamat</label>
                <textarea type="text" id="alamat_suplier" name="alamat_suplier" disabled="true">{{$suplier->alamat_suplier}}</textarea>
                <label>Telpon</label>
                <input type="text" id="no_telp" name="no_telp" disabled="true" value="{{$suplier->no_telp}}">
        </form>
       
            <div class="col-md-12">
                <a href="{{route('suplier.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    
@endsection