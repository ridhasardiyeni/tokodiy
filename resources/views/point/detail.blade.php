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
                <h3>Detail Point</h3>
                <hr>
            </div>
        </div>
            <form>
                <label>Produk</label>
                <input type="text" id="id_produk" name="id_produk" disabled="true" value="{{$point->produk->nama_produk}}">
                <label>Jumlah Point</label>
                <input type="text" id="jlh_point" name="jlh_point" disabled="true" value="{{$point->jlh_point}}">
            </form>
            <div class="col-md-12">
                <a href="{{route('point.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
@endsection