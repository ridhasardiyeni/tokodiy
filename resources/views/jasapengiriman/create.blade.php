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
				<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				<h2>New Jasa Pengiriman</h2>
				<hr>
				<br>
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
	<form action="{{route('jasapengiriman.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<strong>Jenis Jasa</strong>
				<input class="w3-input w3-animate-input" type="text" name="jenis_jasa"  style="width:50%" placeholder="Jenis Jasa">
				<br>
			</div>
			<div class="col-md-12">
				<strong>Harga Jasa</strong>
				<input class="w3-input w3-animate-input" type="text" name="harga_jasa"  style="width:50%" placeholder="Harga Jasa">
				<br>
			</div>
			
			
			<div class="col-md-12">
				<br>
			
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
				<a href="{{route('jasapengiriman.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"></i> Back</a>
				
			</div>
		</div>
	</form>

</div>
@endsection