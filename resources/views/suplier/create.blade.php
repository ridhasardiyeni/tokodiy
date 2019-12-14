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
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color:white;
  resize: none;
}

</style>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
				<h2>New Supplier</h2>
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
	<form action="{{route('suplier.store')}}" method="post">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<strong>Nama Supplier</strong>
				<input class="w3-input w3-animate-input" type="text" name="nama_suplier"  style="width:50%" placeholder="Nama Supplier">
			</div>
			<div class="col-md-12">
				<strong>Alamat </strong>
				<textarea class="w3-input w3-animate-input" name="alamat_suplier" style="width:70%"placeholder="Alamat" rows ="5"></textarea>
			</div>
			<div class="col-md-12">
				<strong>No Telpon</strong>
				<input class="w3-input w3-animate-input" type="text" name="no_telp"  style="width:80%" placeholder="No Telpon">
			</div>
			
			<div class="col-md-12">
				<br>
			
				<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save</button>
				<a href="{{route('suplier.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"></i> Back</a>
				
			</div>
		</div>
	</form>

</div>
@endsection