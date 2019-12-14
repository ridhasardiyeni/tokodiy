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
				<h3>Update Jasa Pengiriman</h3>
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
	<form action="{{route('jasapengiriman.update',$jasapengiriman->id_jasapengiriman)}}" method="post" enctype="multipart/form-data">
		@csrf
        @method('PUT')
		<div class="row">
			<div class="col-md-12">
				<strong>Jenis Jasa</strong>
				<input class="w3-input w3-animate-input" type="text" name="jenis_jasa" style="width:50%"  value="{{$jasapengiriman->jenis_jasa}}">
			</div>
			<div class="col-md-12">
				<strong>Harga Jasa</strong>
				<input class="w3-input w3-animate-input" type="text" name="harga_jasa" style="width:50%"  value="{{$jasapengiriman->harga_jasa}}">
			</div>
			
		
			
			<div class="col-md-12">
                <br>
                 <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save </button>
				<a href="{{route('jasapengiriman.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"> Back </i></a>
				
			</div>
		</div>
	</form>

</div>
@endsection