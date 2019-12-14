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
</style>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Update Supplier</h3>
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
	<form action="{{route('suplier.update',$suplier->id_suplier)}}" method="post">
		@csrf
        @method('PUT')
		<div class="row">
			<div class="col-md-12">
				<strong>Nama Supplier</strong>
				<input class="w3-input w3-animate-input" type="text" name="nama_suplier" style="width:50%"  value="{{$suplier->nama_suplier}}">
			</div>
			
			<div class="col-md-12">
				<strong>Alamat </strong>
				<textarea class="w3-input w3-animate-input" name="alamat_suplier" rows="5" style="width:70%">{{$suplier->alamat_suplier}}</textarea>
			</div>
			<div class="col-md-12">
				<strong>No Telpon</strong>
				<input class="w3-input w3-animate-input" type="text" name="no_telp" style="width:80%"  value="{{$suplier->no_telp}}">
			</div>
		
			
			<div class="col-md-12">
                <br>
                 <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save </button>
				<a href="{{route('suplier.index')}}" class="btn btn-sm  btn-success"><i class="fa fa-arrow-left"> Back </i></a>
				
			</div>
		</div>
	</form>

</div>
@endsection