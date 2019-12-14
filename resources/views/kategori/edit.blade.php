@extends('index')
@section('content')
	
<style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}
input[type=file] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid red;
}
</style>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Update Kategori</h3>
				<hr>
				<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		</div>
	</div>

	@if($errors->any())
		<div class="alert alert-danger">
			<strong>Whoops! </strong>  there where some problems with you input.<br>
			<ul> 
				@foreach($errors as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{route('kategori.update',$kategori->id_kategori)}}" method="post" enctype="multipart/form-data">
		@csrf
        @method('PUT')
		<div class="row">
			<div class="col-md-12">
				<strong>Kategori</strong>
				<input class="w3-input w3-animate-input" type="text" name="nama_kategori" style="width:50%"  value="{{$kategori->nama_kategori}}">
			</div>
			
			<div class="col-md-12">
				<strong>Gambar Kategori</strong>
				<br><img width="150px" height="100px" src="{{asset('img_kategori/'.$kategori->gbr_kategori.'')}}">
				<input class="w3-input w3-animate-input" type="file" name="gbr_kategori" style="width:70%"  value="{{$kategori->gbr_kategori}}">
			</div>
		
			
			<div class="col-md-12">
                <br>
                 <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save </button>
				<a href="{{route('kategori.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"> Back </i></a>
				
			</div>
		</div>
	</form>

</div>
@endsection