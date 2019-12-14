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
                <h3>Detail Kategori</h3>
                <hr>
            </div>
        </div>
        <form>
            <label>Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" disabled="true" value="{{$kategori->nama_kategori}}">
            <label>Gambar Kategori</label>
            <br><img width="150px" height="150px" src="{{asset('img_kategori/'.$kategori->gbr_kategori.'')}}" class="w3-border" alt="Norway" style="padding:4px;width:30%">

        </form>
           <br>
            <div class="col-md-12">
                <a href="{{route('kategori.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
                <br><br>
            </div>
        </div>
@endsection