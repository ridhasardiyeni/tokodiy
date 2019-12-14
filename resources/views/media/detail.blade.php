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
                <h3>Detail Media</h3>
                <hr>
            </div>
        </div>
        <form>
            <label>Produk</label>
            <input type="text" id="id_produk" name="id_produk" disabled="true" value="{{$media->produk->nama_produk}}">
            
                <label>File Media</label>

                <div>
                    </strong><img width="250px" height="250px" src="{{asset('img_media/'.$media->file_media.'')}}">
                    <br>
                    <br>
                </div>
                
         
           
            <div class="col-md-12">
                <a href="{{route('media.index')}}" class="btn btn-sm btn-success"><i class="fa big-icon fa fa-arrow-left"></i> Back</a>
            </div>
        </form>
    </div>
@endsection