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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Detail Jasa Pengiriman</h3>
                <hr>
            </div>
        </div>
        <form>
            <label>Jenis Jasa</label>
            <input type="text" id="jenis_jasa" name="jenis_jasa" disabled="true" value="{{$jasapengiriman->jenis_jasa}}">
            <label>Harga Jasa</label>
            <input type="text" id="harga_jasa" name="harga_jasa" disabled="true" value="Rp {{number_format ($jasapengiriman->harga_jasa ,0,'.','.')}}">

        </form>
           <br>
            <div class="col-md-12">
                <a href="{{route('jasapengiriman.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
                <br><br>
            </div>
        </div>
@endsection