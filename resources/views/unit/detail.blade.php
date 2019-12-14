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
                <h3>Detail Unit</h3>
                <hr>
            </div>
        </div>
            <form>
                <label>Unit</label>
                <input type="text" id="nama_unit" name="nama_unit" disabled="true" value="{{$unit->nama_unit}}">
                <label>Keterangan</label>
                <textarea type="text" id=keterangan" name="keterangan" disabled="true">{{$unit->keterangan}}</textarea>
            </form>
            <div class="col-md-12">
                <a href="{{route('unit.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
@endsection